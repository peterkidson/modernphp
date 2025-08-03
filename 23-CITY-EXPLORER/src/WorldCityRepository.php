<?php
declare(strict_types=1);

class WorldCityRepository
{
	public function __construct(private PDO $pdo) { }

	private int $count = 0;

	public function fetchById(int $id): ?WorldCityModel
	{
		$stmt = $this->pdo->prepare("SELECT * FROM worldcities WHERE id = :id");
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->execute();
		$entry = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($entry)) {
			return null;
		}
		return WorldCityModel::pseudoConstructor($entry);
	}

	public function fetchAll(): array
	{
		$stmt = $this->pdo->prepare('SELECT * FROM worldcities ORDER BY population DESC LIMIT 10');
		$stmt->execute();

		$models = [];
		$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($cities as $city) {
			$models[] = WorldCityModel::pseudoConstructor($city);
		}

		$this->count = $this->count();

		return $models;
	}

	public function paginate(int $page, int $perpage=15): array
	{
		$page = max(1,$page);

		$stmt = $this->pdo->prepare('SELECT * FROM worldcities ORDER BY population DESC ' .
													'LIMIT :limit OFFSET :offset');
		$stmt->bindValue(':limit', $perpage, PDO::PARAM_INT);
		$stmt->bindValue(':offset', ($page-1)*$perpage, PDO::PARAM_INT);
		$stmt->execute();

		$models = [];
		$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($cities as $city) {
			$models[] = WorldCityModel::pseudoConstructor($city);
		}

		$this->count = $this->count();

		return $models;
	}

	public function count(): int
	{
		$stmt = $this->pdo->prepare('SELECT COUNT(*) FROM worldcities');
		$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_NUM);
		return $rs[0];
	}

	public function update(WorldCityModel $city, array $cols): void
	{
		$set = '';
		foreach($cols as $colname => $coltype) {
			$set .= (empty($set) ? '' : ', ') . $colname . ' = :' . $colname ;
		}

		$stmt = $this->pdo->prepare('UPDATE worldcities SET ' . $set . ' WHERE id = :id');

		$stmt->bindValue(":id", $city->id, PDO::PARAM_INT);
		foreach ($cols as $colname => $coltype) {
			$stmt->bindValue(":" . $colname, $city->$colname, $coltype=='txt' ? PDO::PARAM_STR : PDO::PARAM_INT);
		}

		$stmt->execute();
	}
}

