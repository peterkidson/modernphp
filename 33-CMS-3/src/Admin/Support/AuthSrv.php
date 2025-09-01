<?php

namespace App\Admin\Support;

use PDO;

class AuthSrv
{
	public function __construct(private PDO $pdo) {}

	private function ensureSession(): void {
		if (session_id() === '') {
			session_start();
//			$x = session_id();
//			echo $x;
		}
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
		$_SESSION['adminUserId'] = $user['id'];
		session_regenerate_id();

		return true;
	}

	public function isLoggedIn() : bool {
		$this->ensureSession();
		return !empty($_SESSION['adminUserId']);
	}
	public function logout() {
		session_destroy();
	}
	public function ensureLoggedIn() : void {
		$isLoggedIn = $this->isLoggedIn();
		if (empty($isLoggedIn)) {
			header('Location: index.php?' . http_build_query(['route' => 'admin/login']));
			die();
		}
	}


}