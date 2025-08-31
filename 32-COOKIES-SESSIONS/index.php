<?php

if (isset($_GET['AllowCookies'])) {
	setcookie('YesCookies', 1, time() + 3600);
	header('Location: index.php');
	die();
}
if (!empty($_COOKIE['YesCookies'])) {
	$counter = (int) ($_COOKIE['YesCookies']) ?? 0;
	setcookie('YesCookies', $counter + 1, time() + 3600);
} else {
	echo "Allow cookies? : <a href=index.php?AllowCookies=1>Yes</a>";
}


/***********************
header('Content-Type: text/plain');


//setcookie('captain', 'cookie', time() + 3600);

session_start();
session_regenerate_id();

//$_SESSION['count'] = $_SESSION['count'] + 1;
//$_SESSION['helloworld'] = "worldhello";

var_dump($_SESSION);

//phpinfo();
***/




