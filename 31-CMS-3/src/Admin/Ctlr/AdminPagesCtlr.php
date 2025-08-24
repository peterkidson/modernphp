<?php

namespace App\Admin\Ctlr;

use App\Repo\PagesRepo;

class AdminPagesCtlr extends AbstractAdminCtlr
{
	public function __construct(protected PagesRepo $pagesRepo) { }

	public function index() {
		$pages = $this->pagesRepo->get();
		$this->render('pages/index',['pages' => $pages]);
	}
	public function create() {
		if (!empty($_POST)) {
			$title 	= @(string) ($_POST['title'] ?? '');
			$slug 	= @(string) strtolower($_POST['slug'] ?? '');
			$content = @(string) ($_POST['content'] ?? '');
			if (empty($title) || empty($slug) || empty($content)) {
				$this->render('pages/create', ['error' => 'Please fill in all fields']);
				return;
			}
			if ($this->pagesRepo->fetchBySlug($slug) === null) {
				$this->pagesRepo->create($title, $slug, $content);
			}
		}
		$this->render('pages/create');
	}
}