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
			var_dump($_POST);
		?>
	</pre>

<?php //if (!empty($_GET['book'])) : ?>
<!--	<h3>-->< ?php //= $_GET['book'] ? ><!--</h3>-->
<?php //endif;?>

<form action="53-POST-form.php"	 method="POST">
	<input type="text" name="username" value="<?php if (!empty($_POST['username'])) echo $_POST['username']; ?>"/>
	<input type="password" name="password" />
	<textarea id="qwerty" name="qwerty" >qwerty123</textarea>
	<input type="submit" name="action" value="Draft">
	<input type="submit" name="action" value="Publish">
</form>

</body>
</html>


