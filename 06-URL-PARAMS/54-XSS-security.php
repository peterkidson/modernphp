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
			function e($str) {
				return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
			}
			function eifnot($str) {
				if (!empty($str)) echo e($str);
			}
		?>
	</pre>

<p><?php eifnot($_POST['username']); ?></p>

<form action="53-POST-form.php"	 method="POST">
	<input type="text" name="username" value="<?php eifnot($_POST['username']); ?>"/>
	<input type="password" name="password" />
	<input type="submit" name="action" value="Draft">
	<input type="submit" name="action" value="Publish">
</form>

</body>
</html>


