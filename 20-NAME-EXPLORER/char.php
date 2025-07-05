<?php

require __DIR__ . '/inc/all.inc.php';

$char = strtoupper((string)($_GET['char'] ?? ''));
if (strlen($char) > 1)
	$char = $char[0];
if (strlen($char) === 0) {
	header("location: index.php");
	die;
}


$namesByInitial = fetchNamesByInitial($char);

render('char.view', [
    'namesByInitial'    => $namesByInitial,
    'char'              => $char,
]);


