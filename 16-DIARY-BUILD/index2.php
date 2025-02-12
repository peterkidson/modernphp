<?php
if (!empty($_FILES) && !empty($_FILES["upfilename"])) {
	if (		$_FILES["upfilename"]["error"] === 0
			&& $_FILES["upfilename"]["size"]  >   0) {
		move_uploaded_file( $_FILES["upfilename"]['tmp_name'], __DIR__ . '/' . $_FILES["upfilename"]['name'] );
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
	<input type="file" name="upfilename" />
	<input type="submit" value="Submit" />
</form>

