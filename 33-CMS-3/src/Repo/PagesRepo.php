<?php

namespace App\Repo;

use App\Model\PageModel;
use PDO;

class PagesRepo {
	public function __construct(private PDO $pdo) {}
	public function fetchForNavigation() {
		return $this->get();
	}
	public function get(): array {
		$stmt = $this->pdo->prepare("SELECT * FROM `pages` ORDER BY `id` ASC");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);
	}
	public function fetchBySlug(string $slug): ?PageModel  {
		$stmt = $this->pdo->prepare("SELECT * FROM pages WHERE slug = :slug");
		$stmt->bindValue(':slug', $slug);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
		$page = $stmt->fetch();
		return !empty($page) ? $page : null;
	}
	public function fetchById(int $id): ?PageModel  {
		$stmt = $this->pdo->prepare("SELECT * FROM pages WHERE id = :id");
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
		$page = $stmt->fetch();
		return !empty($page) ? $page : null;
	}
	public function create(string $title, string $slug, string $content): bool {
		$stmt = $this->pdo->prepare("INSERT INTO `pages` (`title`, `slug`, `content`) VALUES (:title, :slug, :content)");
		$stmt->bindValue(':title', $title);
		$stmt->bindValue(':slug', $slug);
		$stmt->bindValue(':content', $content);
		return $stmt->execute();
	}
	public function delete(int $id): bool {
		$stmt = $this->pdo->prepare("DELETE FROM `pages` WHERE `id` = :id");
		$stmt->bindValue(':id', $id);
		return $stmt->execute();
	}
	public function updateTitleAndContent(int $id, string $title, string $content): bool {
		$stmt = $this->pdo->prepare("UPDATE `pages` SET `title` = :title, `content` = :content WHERE `id` = :id");
		$stmt->bindValue(':id', 		$id);
		$stmt->bindValue(':title', 	$title);
		$stmt->bindValue(':content', $content);
		return $stmt->execute();
	}
}