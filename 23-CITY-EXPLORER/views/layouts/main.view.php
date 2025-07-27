<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css"/>
    <link rel="stylesheet" type="text/css" href="./styles/custom.css"/>
    <title>Cities explorer</title>
</head>
<body>
<header>
    <h1>Cities explorer</h1>
    <p>Explore and find cities</p>
    <nav>
<!--		 --><?php //foreach ($alphabet as $character): ?>
<!--           <a href="char.php?--><?php //= http_build_query(['char' => $character]); ?><!--"-->
<!--              --><?php //if (!empty($char) && $char === $character): ?>
<!--                  class="active"-->
<!--              --><?php //endif; ?>
<!--           >-->
<!--          --><?php //= e($character) ?>
<!--		 --><?php //endforeach; ?>
    </nav>
</header>
<main>
	<?= $contents; ?>
</main>
</body>
</html>
