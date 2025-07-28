<?php

require __DIR__ . '/inc/all.inc.php';

$db = new DbConnection();
$worldCityRepository = new WorldCityRepository($db->pdo());
$entries = $worldCityRepository->fetch();

render('index.view', [
    'entries' => $entries
]);