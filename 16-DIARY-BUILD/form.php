<?php

global $pdo;

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

const FILENAME = "image";

if (!empty($_POST))
{
	$title		= (string) ($_POST['title']	?? '');
	$date			= (string) ($_POST['date']		?? '');
	$message		= (string) ($_POST['message']	?? '');
	$imageName	= null;

	if (!empty($_FILES) && !empty($_FILES[FILENAME]))
	{
		$usize = $_FILES[FILENAME]["size"];

		if (	$_FILES[FILENAME]["error"] === 0
				&& $usize > 0 && $usize < 10000000) {
			$nameNoExt = pathinfo($_FILES[FILENAME]["name"], PATHINFO_FILENAME);
			$name = preg_replace('/[^A-Za-z0-9]/', '', $nameNoExt);

			$srcImage = $_FILES[FILENAME]['tmp_name'];
			$imageName = $name . '-' . time() . '.jpg';//$name . "." . $_FILES[FILENAME]["type"];
			$dstImage = __DIR__ . '/uploads/' . $imageName;

			if (!empty($imageSize = getimagesize($srcImage)))
			{
				[$width, $height] = $imageSize;

				$maxdim = 400;
				$scalefactor = $maxdim / max($width, $height);
				$newwidth  = $width  * $scalefactor;
				$newheight = $height * $scalefactor;

				if (!empty($im = imagecreatefromjpeg($srcImage)))
				{
					$newimg = imagecreatetruecolor($newwidth, $newheight);

					imagecopyresampled($newimg, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

					//			header('Content-Type: image/jpeg');
					//			imagejpeg($newimg);
					imagejpeg($newimg, $dstImage);

					echo "";
				}
			}
		}
	}

	$stmt = $pdo->prepare('INSERT INTO entries (title, mdate, message, image) VALUES(:title, :date, :message, :image)');
	$stmt->bindParam(':title', 	$title);
	$stmt->bindParam(':date', 	$date);
	$stmt->bindParam(':message', $message);
	$stmt->bindParam(':image', 	$imageName);
	$stmt->execute();
}

echo "";
?>

<?php require __DIR__ . '/views/header.view.php'; ?>

<h1 class="main-heading">New Entry</h1>

<form method="POST" action="form.php"  enctype="multipart/form-data">

	<div class="form-group">
		<label class="form-group__label" for="title">Title</label>
		<input class="form-group__input" type="text" id="title" name="title" required/>
	</div>
	<div class="form-group">
		<label class="form-group__label" for="date">Date</label>
		<input class="form-group__input" type="date" id="date" name="date" required/>
	</div>
	<div class="form-group">
		<label class="form-group__label" for="image">Image</label>
		<input class="form-group__input" type="file" id=<?= FILENAME ?> name=<?= FILENAME ?> />
	</div>
	<div class="form-group">
		<label class="form-group__label" for="message">Message</label>
		<textarea class="form-group__input" id="message" name="message" rows="6" required></textarea>
	</div>
	<div class="form-submit">
		<button class="button">
			 <svg class="button__icon" viewBox="0 0 34.7163912799 33.4350009649">
				  <g style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2px;">
						<polygon points="20.6844359446 32.4350009649 33.7163912799 1 1 10.3610302393 15.1899978903 17.5208901631 20.6844359446 32.4350009649"/>
						<line x1="33.7163912799" y1="1" x2="15.1899978903" y2="17.5208901631"/>
				  </g>
			 </svg>

			 Save
		</button>
	</div>

</form>

<?php require __DIR__ . '/views/footer.view.php'; ?>
