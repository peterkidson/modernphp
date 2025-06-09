<?php

require __DIR__ . '../../inc/functions.inc.php';

$termsError = false;

echo $_SERVER['REQUEST_METHOD'];
echo $_SERVER['PHP_SELF'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['terms'])) {
//		header('Location: ' . urldecode($_POST['terms']));
		header('Location: thankyou.php');
		die();
	} else {
		$termsError = true;
	}
}
else {
   $termsError = true;
}



?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="simple.css" />
	<title>Document 167</title>
</head>
<body>
<header><h1>Sign up for the newsletter</h1></header>
<form method="POST" action=<?= $_SERVER['PHP_SELF'] ?> >
	<label for="input_name">Your name:</label>
	<input type="text" name="name" id="input_name" value="<?php if (!empty($_POST['name'])) echo e($_POST['name']); ?>" />

	<label for="input_email">Your email:</label>
	<input type="text" name="email" id="input_email" value="<?php if (!empty($_POST['email'])) echo e($_POST['email']); ?>" />
	<br />

	<?php if (!empty($termsError)): ?>
		<p style="color: darkred;">You need to accept the terms</p>
	<?php endif; ?>

	<input type="checkbox" name="terms" value="1" id="input_terms">
	<label for="input_terms">I have read the terms and want to receive emails</label>

	<br />

	<input type="submit" value="Submit" />
</form>
</body>
</html>
