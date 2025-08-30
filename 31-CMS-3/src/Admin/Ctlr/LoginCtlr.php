<?php

namespace App\Admin\Ctlr;

class LoginCtlr extends AbstractAdminCtlr
{
	public function login() {
		$this->render('login/login', []);
	}
}