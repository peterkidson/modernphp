<?php

require __DIR__ . '/inc/all.inc.php';

const PAGESIZE = 10;

$char = strtoupper((string)($_GET['char'] ?? ''));
if (strlen($char) > 1) {
	$char = $char[0];
}
$chars = strtoupper($char);
$alphabet = gen_alphabet();

if (  strlen($char) === 0
	OR !in_array($char, $alphabet)) {
	header("location: index1.php");
	die;
}

$page = (int)($_GET['page'] ?? 1);

$namesByInitial   = fetchNamesByInitial($char, $page);
$count            = countNamesByInitial($char);

crender('char.view', [
	'namesByInitial'  => $namesByInitial,
	'char'            => $char,
	'pagination'      => [
		'page'      => $page,
		'count'     => $count,
		'pagesize'  => PAGESIZE,
	]
]);


