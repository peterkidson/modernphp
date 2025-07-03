<?php
require __DIR__ . '../../inc/functions.inc.php';

if ( ($id = $_GET['id'] ?? -1) > 5) {
    require './status/notfound.php';
    die();
}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="simplt.css" />
  <title>Title</title>
</head>
<body>
<header>
    <main>
        The id is <?= e($id) ?>
    </main>
</header>
</body>
</html>
