<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../04-ARRAYS/simple.css" />
	<title>Document</title>
</head>
<body>

	<pre><?php

		$arr1 = [ "bkey" => "x bcontents", "ckey" => "y ccontents", "hello", 00 => "world", "0" => "naught overwrite", "hello2", "akey" => "z acontents", ];

		$s1 = isset($arr1["bkey"]);
		$s2 = empty($arr1["bkey"]);
		$s3 = isset($arr1["zkey"]);
		$s4 = empty($arr1["zkey"]);


		$x = sort($arr1);
		echo 'the end';


		function b(bool $b)
		{
			return $b ? 'true' : 'false';
		}
		?></pre>

</body>
</html>


