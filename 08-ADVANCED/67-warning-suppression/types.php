<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>
<body>

<pre><?php
	if (isset($_GET['name'])) {
		$name = @(string) $_GET['name'];
		var_dump($name);
	}
?></pre>

<a href="types.php?<?php echo http_build_query(['name' => [123,'hello']]); ?>">simple</a>
</body>
</html>