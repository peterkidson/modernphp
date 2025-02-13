<?php
const FILENAME = "fnam";

if (!empty($_FILES) && !empty($_FILES[FILENAME])) {
	$usize = $_FILES[FILENAME]["size"];
	if (		$_FILES[FILENAME]["error"] === 0
			&& $usize > 0 && $usize < 10000000) {
		$nameNoExt = pathinfo($_FILES[FILENAME]["name"], PATHINFO_FILENAME);
		$uname = preg_replace('/[^A-Za-z0-9]/', '', $nameNoExt);
		move_uploaded_file( 	$_FILES[FILENAME]['tmp_name'],  __DIR__ . '/' . $uname . '-' . time() );
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./styles/normalize.css" />
	<link rel="stylesheet" type="text/css" href="styles/styles.css" />
	<title>PHP Diary2</title>
</head>
<body>

<form method="POST" action="index2.php" enctype="multipart/form-data">
	<input type="file" name=<?= FILENAME ?> />
	<input type="submit" value="Submit" />
</form>

