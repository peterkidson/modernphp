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
//			var_dump($_GET);
//			var_dump($_POST);
			function e($str) {
				return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
			}
			function eifnot($str) {
				if (!empty($str)) echo e($str);
			}
			function selected($value) {
				if (!empty($_GET['page'] && $_GET['page'] == $value)) echo 'selected';
			}
		?>
	</pre>


<form action="55-include.php"	 method="GET">
	<select name="page">
		<option value="">Select a recipe</option>
		<option value="citrus_salmon"       <?php selected('citrus_salmon');				?> >Citrus Symphony Salmon</option>
		<option value="mediterranian_pasta" <?php selected('mediterranian_pasta');		?> >Mediterranian Marvel Pasta</option>
		<option value="sunset_risotto"      <?php selected('sunset_risotto');      	?> >Sunset Risotto</option>
		<option value="tropical_tacos"      <?php selected('tropical_tacos');      	?> >Tropical Tango Tacos</option>
	</select>
	<input type="submit" value="Submit" />
</form>

	<?php
	$page = "pages/{$_GET['page']}.html";
//	include $page;
	echo file_get_contents($page);
	?>

</body>
</html>


