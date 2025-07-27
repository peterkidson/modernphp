<?php

require __DIR__ . '/inc/all.inc.php';

$name = (string)($_GET['name'] ?? '');
if (empty($name)) {
	header("Location: Index.php");
	die();
}

$entries = fetchNameEntries($name);

render('name.view', [
	'name'      => $name,
	'char'      => $name[0],
	'entries'   => $entries,
]);


