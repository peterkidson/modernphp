<?php

namespace App\Admin\Ctlr;

class PagesAdminCtlr extends AbstractAdminCtlr
{
	public function index() {
		$this->render('pages/index',[]);
	}
}