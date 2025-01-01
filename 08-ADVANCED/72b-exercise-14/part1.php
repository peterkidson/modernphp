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

	require_once __DIR__ . '/inc/functions.inc.php';

	$emailContent = "Subject: Unlock Your Potential with Us!\n\nDear Alex,\n\nWe hope this message finds you well.\n\nQuote of the Month:\n\nDr. Albert Szent-Györgyi: 'Innovation is seeing what everybody has seen and thinking what nobody has thought.'\n\nBest wishes,\nYour Discovery Network Team\nP.S. Don't miss our special announcement next month!";

	$splits = explode("\n", $emailContent);
	$nsplits = sizeof($splits);

	echo "content $nsplits >$emailContent<";
	echo "\n";
	for ($i=0; $i < sizeof($splits); ++$i)
		echo "$i >$splits[$i]<\n";

	/***/
	$splits = explode("\n", $emailContent);

	$qotm 		= "Quote of the Month:";
	$modifiedSplits = $splits;

	foreach ($splits as $key => $value) {
		if ($value == $qotm) {
			$authorPlusQuote = $splits[$key+2];
			$apq = explode(':', $authorPlusQuote);
			$author  = trim($apq[0]);
			$quote   = trim($apq[1]);
			$modifiedSplits[$key+2] = "$quote - $author";
			break;
		}
	}

	$modifiedEmailContent = implode("\n", $modifiedSplits);
	//var_dump($modifiedEmailContent);
	/***/

?></pre>

</body>
</html>