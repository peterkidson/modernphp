<?php

namespace App\Frontend\Ctlr;

use App\Repo\PagesRepo;

class PagesCtlr extends AbstractCtlr {
	public function __construct(PagesRepo $pagesRepo) {
		parent::__construct($pagesRepo);
	}
	public function showpage($pageSlug) {
		$page = $this->pagesRepo->fetchBySlug($pageSlug);
		if (empty($page)) {
			$this->error404();
			return;
		}
		$this->render('pages/showpage', ['page' => $page]);
	}
}