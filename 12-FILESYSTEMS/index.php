<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./styles/simple.css" />
	<title>Document</title>
</head>
<body>
<header><h1>Automatic Image List</h1></header>
<main><pre><?php
		$fe = file_exists(__DIR__ . '/images');
		$id = is_dir(__DIR__ . '/images');
		$fs = filesize(__DIR__ . '/images/IMG_0933.jpg');
		echo "";

		?></pre>


</main>
</body>
</html>