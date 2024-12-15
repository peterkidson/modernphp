<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="simple.css" />
	<title>Document</title>
</head>
<body>
	<?php
		function e($str) {
			return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
		}
		function eifnot($str) {
			if (!empty($str)) echo e($str);
		}
		function selected($value) {
			if (!empty($_GET['page'] && $_GET['page'] == $value)) echo 'selected';
		}

		$pages = [
			''								=> 'Select a recipe',
			'citrus_salmon'			=> 'Citrus Symphony Salmon',
			'mediterranian_pasta'	=> 'Mediterranian Marvel Pasta',
			'sunset_risotto'			=> 'Sunset Risotto',
			'tropical_tacos'			=> 'Tropical Tango Tacos',
		] ;
	?>

<div> </div>
<form action="56-include.php"	 method="GET">
	<select name="page">
		<?php foreach ($pages as $key => $title): ?>
			<option value="<?php echo e($key); ?>" <?= selected($key) ?> > <?php echo e($title) ?></option>
		<?php endforeach; ?>
	</select>
	<input type="submit" value="Submit" />
</form>

<?php
if (!empty($_GET['page'])) {
	$page = $_GET['page'];
	if (!empty($pages[$page])) {
		$htmlpage = "pages/{$_GET['page']}.html";
		echo file_get_contents($htmlpage);
	}
}
?>

</body>
</html>


