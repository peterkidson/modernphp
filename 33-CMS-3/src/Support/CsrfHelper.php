<?php

namespace App\Support;

class CsrfHelper
{
	private const SESSION_KEY = 'csrfToken';

	public function handle() {
		$this->ensureSession();

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (	!empty($_POST['_csrf'])
				&& !empty($_SESSION[self::SESSION_KEY])
				&& $_POST['_csrf'] === $_SESSION[self::SESSION_KEY]) {
				return;
			}
			http_response_code(419);
			echo "Error: CSRF token mismatch";
			var_dump($_POST);
			var_dump($_SESSION);
			die();
		}
	}
	private function ensureSession() {
		if (session_id() === '') {
			session_start();
		}
	}
	public function generateToken(): string {
		$token = bin2hex(random_bytes(4));  // s/b 32
		$_SESSION[self::SESSION_KEY] = $token;
		return $token;
	}
}