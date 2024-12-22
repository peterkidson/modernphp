<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>
<body>
<pre>
<?php
var_dump($_GET);
$p = $_GET['name'] ?? '';
if (is_array($p)) $pv = $p[0];
else              $pv = $p;
echo $pv;
?>
	<a href="types.php?<?php echo http_build_query(['name' => ['qwerty', 'xxx']]); ?>">simple</a>
</pre>
</body>
</html>