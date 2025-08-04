<?php

include "src\User.php";

use src\User as X;

$u = new X();

var_dump($u::class);




$mess = function(string $message) { echo $message; };

$mess("hw");

spl_autoload_register(function(string $class) {
	$filepath = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .
		str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
	if (file_exists($filepath)) {
		require $filepath;
	}
});