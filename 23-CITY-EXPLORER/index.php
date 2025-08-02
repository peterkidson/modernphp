<?php

require __DIR__ . '/inc/all.inc.php';

$page = (int) ($_GET['page'] ?? 1);
$perPage = 10;


$db = new DbConnection();
$worldCityRepository = new WorldCityRepository($db->pdo());

$count = $worldCityRepository->count();
$cities = $worldCityRepository->paginate($page,$perPage);

render('index.view', [
	'cities' 	=> $cities,
	'count'		=> $count,
	'perPage'	=> $perPage,
	'page'		=> $page,
]);

