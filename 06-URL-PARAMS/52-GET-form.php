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
		?>
	</pre>

<?php if (!empty($_GET['book'])) : ?>
	<h3><?= $_GET['book'] ?></h3>
<?php endif;?>

<form action="52-GET-form.php"	 method="GET">
	<input type="text" name="book" value="<?php if (!empty($_GET['book'])) echo $_GET['book']; ?>"/>
	<input type="submit" value="click me">
</form>

</body>
</html>


