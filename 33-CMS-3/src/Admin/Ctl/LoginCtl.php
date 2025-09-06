<?php

namespace App\Admin\Ctl;

use App\Admin\Support\AuthSrv;

class LoginCtl extends AbstractAdminCtl
{
	public function __construct(private AuthSrv $authSrv) {}

	public function login() {
		if ($this->authSrv->isLoggedIn()) {
			header('Location: index.php?' . http_build_query(['route' => 'admin/pages']));
			return;
		}
		$loginError = '';
		if (!empty($_POST)) {
			$username = @(string) ($_POST['username']);
			$password = @(string) ($_POST['password']);
			if (!empty($username) && !empty($password)) {
				if ($this->authSrv->handleLogin($username, $password)) {
					header('Location: index.php?' . http_build_query(['route' => 'admin/pages']));
					return;
				}
				else {
					$loginError = 'Invalid creds';
				}
			}
			else {
				$loginError = 'Need both fields';
			}

		}

		$this->render('login/login', ['loginError' => $loginError]);
	}
}