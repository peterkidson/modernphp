<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="simple.css" />
	<title>Document</title>
</head>
<body>
	<pre>
		<?php
			var_dump($_GET);


			$x = null;
			function x($xx) {
				return $xx;
			}
		?>
	</pre>

<?php if (!empty($_GET['book'])) : ?>
	<h3><?= $_GET['book'] ?></h3>
<?php endif;?>

<!--<a href="50-GET-array.php?book=Rebel Code">Rebel Code</a>-->
<!--<a href="50-GET-array.php?--><?php //echo http_build_query(['book' => 'Beauty & the Beast']); ?><!--">Beauty & the Beast</a>-->
<!--<a href="50-GET-array.php?--><?php //= http_build_query(['book' => 'Beauty & the Beast']); ?><!--">Beauty & the Beast</a>-->

</body>
</html>


