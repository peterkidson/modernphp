<?php

namespace App\Admin\Ctl;

use App\Admin\Support\AuthSrv;
use App\Repo\PagesRepo;

class AdminPagesCtl extends AbstractAdminCtl
{
	public function __construct(AuthSrv $authSrv, protected PagesRepo $pagesRepo) {
		parent::__construct($authSrv);
	}

	public function index() {
		$pages = $this->pagesRepo->get();
		$this->render('pages/index',['pages' => $pages]);
	}
	public function create() {
		$errors = [];
		if (!empty($_POST)) {
			$title 	= @(string) ($_POST['title'] ?? '');
			$slug 	= @(string) ($_POST['slug'] ?? '');
			$content = @(string) ($_POST['content'] ?? '');

			$slug = strtolower($slug);
			$slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
			$slug = trim($slug, '-');

			if (empty($title) || empty($slug) || empty($content)) {
				$errors[] = 'Please fill in all fields';
			}
			else if ($this->pagesRepo->fetchBySlug($slug) === null) {
				$this->pagesRepo->create($title, $slug, $content);
				header('Location: index.php?route=admin/pages');
				return;
			}
			else {
				$errors[] = 'Page with that slug already exists';
			}
		}
		$this->render('pages/create', ['errors' => $errors]);
	}

	public function delete() {
		if (!empty($id = @(int) ($_POST['id'] ?? 0))) {
			$this->pagesRepo->delete($id);
		}
		header('Location: index.php?route=admin/pages');
	}

	public function edit() {
		$errors = [];
		$id = @(int) ($_GET['id'] ?? 0);
		if (!empty($_POST)) {	// FORM SUBMITTED
			$title 	= @(string) ($_POST['title']		?? '');
			$content	= @(string) ($_POST['content']	?? '');

			if (!empty($title) && !empty($content)) {
				$this->pagesRepo->updateTitleAndContent($id, $title, $content);
				header('Location: index.php?route=admin/pages');
				return;
			}
			else {
				$errors[] = 'Please fill in all fields';
			}
		}
		$page = $this->pagesRepo->fetchById($id);
		$this->render('pages/edit', ['page' => $page, 'errors' => $errors]);
	}
}