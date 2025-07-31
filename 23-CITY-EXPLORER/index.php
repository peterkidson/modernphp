<?php

require __DIR__ . '/inc/all.inc.php';


$cc = getFlag('us');
echo "$cc  ";
$cc = getFlag('th');
echo "$cc  ";

die();
$db = new DbConnection();
$worldCityRepository = new WorldCityRepository($db->pdo());
$entries = $worldCityRepository->fetchAll();

render('index.view', [
    'entries' => $entries
]);

function getFlag(string $iso2): string {
	$mb_a = 127462;
	$ord_a = ord('a');
	$iso2 = strtolower($iso2);
	if (strlen($iso2) !== 2) {
		echo "iso2 must be a two-letter ISO code";
		die;
	}
	$ch1 = mb_chr($mb_a + ord($iso2[0]) - $ord_a);
	$ch2 = mb_chr($mb_a + ord($iso2[1]) - $ord_a);
	return $ch1 . $ch2;
}