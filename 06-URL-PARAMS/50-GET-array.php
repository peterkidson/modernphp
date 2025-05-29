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

<?php if (!empty($_GET['ba'])) : ?>
	<h3><?= $_GET['ba'] ?></h3>
<?php endif;?>

</body>
</html>


