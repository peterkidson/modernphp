<?php

namespace App\Admin\Support;

use PDO;

class AuthSrv
{
	private const SESSION_KEY = 'adminUserId';

	public function __construct(private PDO $pdo) {}

	public function logout(): void {
		$this->ensureSession();
		unset($_SESSION[self::SESSION_KEY]);
		session_regenerate_id();
	}

	public function handleLogin(string $username, string $password) : bool {
		if (empty($username) || empty($password)) return false;
		$stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE username = :username");
		$stmt->bindValue(':username', $username);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if (empty($user)) {
			return false;
		}

		//	$adminhash = password_hash('admin', PASSWORD_DEFAULT);
		// $2y$10$kUqeSY3zJ/oREMpc6robkO/Iv1XgXJow8D2jcc885Y9eOaX/peY.i

		if (!password_verify($password, $user['password'])) {
			return false;
		}

		$this->ensureSession();
		$_SESSION[self::SESSION_KEY] = $user['id'];
		session_regenerate_id();

		return true;
	}

	private function ensureSession(): void {
		if (session_id() === '') {
			session_start();
		}
	}

	public function isLoggedIn() : bool {
		$this->ensureSession();
		return !empty($_SESSION[self::SESSION_KEY]);
	}

	public function ensureLoggedIn() : void {
		$isLoggedIn = $this->isLoggedIn();
		if (empty($isLoggedIn)) {
			header('Location: index.php?' . http_build_query(['route' => 'admin/login']));
			die();
		}
	}


}