<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="simple.css" />
	<title>Document</title>
</head>
<body>

	<pre><?php
		$cats = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 123];
		$cats2 = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 123);
		var_dump(in_array('one',  $cats));
		var_dump($cats[7] + 123);
		var_dump($cats2[7] + 123);

		?></pre>

</body>
</html>


