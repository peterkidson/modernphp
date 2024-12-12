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

<a href="51-url-params.php?param1=hello world">over here</a>
<a href="51-url-params.php?location=New York&amenity=Bed & Breakfast&deal=Special & Offers">no no no</a>
<a href="51-url-params.php?<?php echo http_build_query(['param1' => 'hello & world','param2' => 'goodbye cruel world']);?>">over & here</a>



</body>
</html>


