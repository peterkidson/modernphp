<?php
const FILENAME = "fnam";

if (!empty($_FILES) && !empty($_FILES[FILENAME])) {
	$usize = $_FILES[FILENAME]["size"];
	if (		$_FILES[FILENAME]["error"] === 0
			&& $usize > 0 && $usize < 10000000) {
		$nameNoExt = pathinfo($_FILES[FILENAME]["name"], PATHINFO_FILENAME);
		$uname = preg_replace('/[^A-Za-z0-9]/', '', $nameNoExt);

		$srcImage = $_FILES[FILENAME]['tmp_name'];
		$dstImage = __DIR__ . '/' . $uname . '-' . time() . '.jpg';

		[$width, $height] = getimagesize($srcImage);

		$maxdim = 400;
		$scalefactor = $maxdim / max($width, $height);
		$newwidth = $width * $scalefactor;
		$newheight = $height * $scalefactor;

		$img = imagecreatefromjpeg($srcImage);

		$newimg = imagecreatetruecolor($newwidth, $newheight);

		imagecopyresampled($newimg, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		header('Content-Type: image/jpeg');
		imagejpeg($newimg);
		imagejpeg($newimg, $dstImage);

		echo "";
	}
	echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./styles/normalize.css" />
	<link rel="stylesheet" type="text/css" href="styles/styles.css" />
	<title>PHP Diary 157</title>
</head>
<body>
	<br>
	<form method="POST" action="index157.php" enctype="multipart/form-data">
		<input type="file" name=<?= FILENAME ?> />
		<input type="submit" value="Submit" />
	</form>
</body>
