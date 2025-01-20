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
		$x = pathinfo('index.php',PATHINFO_EXTENSION);
		$handle = opendir(__DIR__ . '/images');
		$images = [];
		while (($currentFile = readdir($handle)) !== false) {
			if ($currentFile === '.' || $currentFile === '..') {
				continue;
			}
			var_dump($currentFile);
			$images[] = $currentFile;
		}

	foreach($images AS $image) {
		$ext = pathinfo($image,PATHINFO_EXTENSION);

		$src = "images/" . rawurlencode($image);
		echo "";
	}


		closedir($handle);
		?></pre>

	<?php foreach($images AS $image): ?>
		<img src="images/<?= rawurlencode($image); ?>" alt="ohoh" />
	<?php endforeach; ?>

</main>
</body>
</html>