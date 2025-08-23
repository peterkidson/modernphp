<?php

namespace App\Admin\Ctlr;

use App\Repo\PagesRepo;

class AdminPagesCtlr extends AbstractAdminCtlr
{
	public function __construct(protected PagesRepo $pagesRepo) { }

	public function index() {
		$this->render('pages/index',[]);
	}
}