<?php

require __DIR__ . '../../inc/functions.inc.php';

echo "<pre>";
//var_dump($_SERVER);
var_dump($_SERVER['REQUEST_URI']);

?>

<form method="post" action="<?= e($_SERVER['PHP_SELF']) ?>">
	<input type="text" name="username" />
	<input type="submit" value="Go" />
</form>
