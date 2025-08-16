<?php

namespace App\Frontend\Controller;

use App\Repo\PagesRepo;

class PagesCtlr extends AbstractCtlr {
	public function __construct(private PagesRepo $pagesRepo) {}
	public function showpage($pageSlug) {
		$page = $this->pagesRepo->fetchBySlug($pageSlug);
		if (empty($page)) {
			$this->error404();
			return;
		}
		$this->render('pages/showpage', ['page' => $page]);
	}
}