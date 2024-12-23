<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>
<body>

<pre><?php
//		$name = @(string) ($_GET['name'] ?? 'qwerty');
//		var_dump($name);
//		$int = '123';
//		$isint = (string) is_integer($int);
//		$isnum = (string) is_numeric($int);
//		echo "int $isint  numeric $isnum";
//		$num = '123.456';
//		$isnum = (string) is_numeric($num);
//		$isfloat = (string) is_float($num);
//		echo "numeric $isnum  float $isfloat";

		$ta = ['hello', 'world'];
		foreach ($ta as $key => $value) {
			echo "$key $value" . "\n";
		}

		$suffix = '_file';
		$input = '';//['text1','text2'];//['text','_file'];//'text';
		if (is_string($input)) {
			$result = $input . $suffix;
		}
		else if (is_array($input)) {
			foreach ($input as $key => $value) {
				$input[$key] = $value . $suffix;
			}
			$result = $input;
		}

?></pre>

<a href="types.php?<?php echo http_build_query(['name' => ['hello', 'world']]); ?>">simple</a>
</body>
</html>