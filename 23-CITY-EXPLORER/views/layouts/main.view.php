<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <link rel="stylesheet" type="text/css" href="./styles/custom.css" />
    <title>Cities Explorer</title>
</head>
<body>
    <header>
        <h1>
            <a href="index.php">Cities Explorer</a>
        </h1>
        <p>Explore and Find cities</p>
    </header>
    <main>
        <?php echo $contents; ?>
    </main>
    <footer>
        <p>
            Source of data: <a target="_blank" href="https://simplemaps.com/data/world-cities">https://simplemaps.com/data/world-cities</a>, <br />
            License: <a target="_blank" href="https://creativecommons.org/licenses/by/4.0/">CC BY 4.0 DEED, Attribution 4.0 International</a>.
        </p>
    </footer>
</body>
</html>