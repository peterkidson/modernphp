<?php

namespace App\Admin\Support;

use PDO;

class AuthServ
{
	public function __construct(private PDO $pdo) {}

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

		return (password_verify($password, $user['password']));
	}

}