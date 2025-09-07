<?php

namespace App\Support;

class CsrfHelper
{
	private const SESSION_KEY = 'csrfToken';

	public function handle() {
		$this->ensureSession();
		echo 'csrf handler';
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