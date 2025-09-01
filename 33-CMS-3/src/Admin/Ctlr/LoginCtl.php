<?php

namespace App\Admin\Ctlr;

use App\Admin\Support\AuthSrv;

class LoginCtl extends AbstractAdminCtl
{
	public function __construct(private AuthSrv $authSrv) {}

	public function login() {
		if ($this->authSrv->isLoggedIn()) {
			header('Location: index.php?' . http_build_query(['route' => 'admin/pages']));
			return;
		}
		$error = true;
		if (!empty($_POST)) {
			$username = @(string) ($_POST['username']);
			$password = @(string) ($_POST['password']);
			if (!empty($username) && !empty($password)) {
				if ($this->authSrv->handleLogin($username, $password)) {
					$error = false;
					header('Location: index.php?route=admin/pages');
					return;
				}
			}
		}
		$this->render('login/login', ['loginError' => $error]);
	}
}