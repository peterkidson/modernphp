<?php

require __DIR__ . '/inc/all.inc.php';


//$cc = countryFlag('us');
//echo "$cc  ";
//$cc = countryFlag('th');
//echo "$cc  ";
//die();

$db = new DbConnection();
$worldCityRepository = new WorldCityRepository($db->pdo());
$entries = $worldCityRepository->fetchAll();

render('index.view', [
    'entries' => $entries
]);

