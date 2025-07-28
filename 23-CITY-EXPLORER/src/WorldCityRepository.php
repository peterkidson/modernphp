<?php

class WorldCityRepository
{

	public function __construct(private PDO $pdo)
	{
	}

	public function fetch(): array
	{
//		$stmt = $this->pdo->prepare('SELECT
//            `id`, `city`, `lat`, `lng`, `country`,
//            `iso2`, `iso3`, `capital`, `population`
//            FROM `worldcities`
//            ORDER BY `population`
//            DESC LIMIT 10');
		$stmt = $this->pdo->prepare('SELECT * FROM worldcities ORDER BY population DESC LIMIT 10');
		$stmt->execute();
		$entries = $stmt->fetchAll(PDO::FETCH_CLASS, 'WorldCityModel');
//		var_dump($entries[0]->city);

		return $entries;
	}
}

