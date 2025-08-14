<?php

namespace App\Frontend\Controller;

use App\Repo\PagesRepo;

class PagesCtl extends AbstractCtl {
	public function __construct(private PagesRepo $pagesRepo) {}
	public function showpage($pageSlug) {
		$page = $this->pagesRepo->fetchBySlug($pageSlug);
		$this->render('pages/showpage', ['page' => $page]);
	}
}