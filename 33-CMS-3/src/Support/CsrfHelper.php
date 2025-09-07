<?php

namespace App\Support;

class CsrfHelper
{
	private const CSRF_KEY = 'csrfToken';

	public function handle() {
		$this->ensureSession();

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (	!empty($_POST['_csrf'])
				&& !empty($_SESSION[self::CSRF_KEY])
				&& $_POST['_csrf'] === $_SESSION[self::CSRF_KEY]) {
				unset($_SESSION[self::CSRF_KEY]);
				return;
			}
			http_response_code(419);
			echo "Error: CSRF token mismatch";
			die();
		}
	}
	private function ensureSession() {
		if (session_id() === '') {
			session_start();
		}
	}
	public function generateToken(): string {
		if (empty($_SESSION[self::CSRF_KEY])) {
			$token = bin2hex(random_bytes(4));  // s/b 32
			$_SESSION[self::CSRF_KEY] = $token;
		}
		return $_SESSION[self::CSRF_KEY];
	}
}