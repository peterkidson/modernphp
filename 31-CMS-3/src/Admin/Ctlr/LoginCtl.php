<?php

namespace App\Admin\Ctlr;

use App\Admin\Support\AuthSrv;

class LoginCtl extends AbstractAdminCtl
{
	public function __construct(private AuthSrv $authServ) {}

	public function login() {
		$error = true;
		if (!empty($_POST)) {
			$username = @(string) ($_POST['username']);
			$password = @(string) ($_POST['password']);
			if (!empty($username) && !empty($password)) {
				if ($this->authServ->handleLogin($username, $password)) {
					$error = false;
					header('Location: index.php?route=admin/pages');
					return;
				}
			}
		}
		$this->render('login/login', ['loginError' => $error]);
	}
}