<?php

require __DIR__ . '/inc/all.inc.php';

$id = (int) ($_GET['id'] ?? 0);

$db = new DbConnection();
$worldCityRepository = new WorldCityRepository($db->pdo());

$city = $worldCityRepository->fetchById($id);

if (empty($city)) {
	header('Location: index.php');
	die();
}

const COLS	 = [ 'city' => 'txt', 'country' => 'txt', 'iso2' => 'txt', 'population' => 'int' ];

if (!empty($_POST)) {
	foreach(COLS as $colname => $coltype) {
		if (empty($city->$colname = ($coltype=='txt') ? ($_POST[$colname] ?? '') : ((int) $_POST[$colname] ?? 0))) {
			header('Location: index.php');
			die();
		}
	}

	$worldCityRepository->update($city,COLS);
}

render('edit.view', [
    'city' => $city
]);
