<?php

$pdo = null;

try {
	$pdo = new PDO('mysql:host=localhost;dbname=diary', 'root', '',
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
	echo $e->getMessage();
	die();
}
