<?php
declare(strict_types=1);

class WorldCityRepository
{
	public function __construct(private PDO $pdo) { }

	public function fetchById(int $id): ?WorldCityModel
	{
		$stmt = $this->pdo->prepare("SELECT * FROM worldcities WHERE id = :id");
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		$entry = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($entry)) {
			return null;
		}
		return WorldCityModel::constructor2($entry);
	}

	public function fetchAll(): array
	{
		$stmt = $this->pdo->prepare('SELECT * FROM worldcities ORDER BY population DESC LIMIT 10');
		$stmt->execute();

		$models = [];
		$entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($entries as $entry) {
			$models[] = WorldCityModel::constructor2($entry);
		}

		return $models;
	}
}

