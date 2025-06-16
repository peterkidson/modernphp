<?php

// Global funcs


function connectToDB(string $host, string $user, string $pw, string $database): PDO
{
   try {
      $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pw, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
   }
   catch (PDOException $e) {
      echo $e->getMessage();
      die();
   }
   return $pdo;
}



function e($value)
{
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
function nl($value = "\n")
{
	echo nl2br(e($value));
}

function deep_clone_array($array) {
	$clone = array();
	foreach ($array as $key => $value) {
		if (is_array($value)) {
			$clone[$key] = deep_clone_array($value);
		} else {
			$clone[$key] = $value;
		}
	}
	return $clone;
}

function deep_clone_array_map($array) {
	return array_map(function ($element) {
		if (is_array($element)) {
			return deep_clone_array_map($element);
		}
		return $element;
	}, $array);
}
