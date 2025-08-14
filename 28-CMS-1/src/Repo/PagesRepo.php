<?php

namespace App\Repo;

use App\Model\PageModel;
use PDO;

class PagesRepo {
	public function __construct(private PDO $pdo) {}

	public function fetchBySlug(string $slug): ?PageModel  {
		$stmt = $this->pdo->prepare("SELECT * FROM pages WHERE slug = :slug");
		$stmt->bindValue(':slug', $slug);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
		$page = $stmt->fetch();
		return $page;
	}
}