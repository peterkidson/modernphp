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

//0	Dear,
//1  (empty)
//2  Best wishes

//0  Dear Alex,
//1  (empty)
//2  This is the beginning of our email content, which continues to elaborate on various points.
//3  (empty)
//4  Best wishes

//0  Dear NewPerson,
//1  (empty)
//2  This email content has been designed to include
//3  additional line breaks for testing purposes.
//4  (empty)
//5  Let's see how it impacts the overall character count.
//6  (empty)
//7  Best wishes

	require_once __DIR__ . '/inc/functions.inc.php';

	$emailContent = "Dear alex  ,\n\nWe hope this message finds you well.\n\nThis month, we are focusing on personal growth and innovation. Don't miss out on our exclusive insights!\n\nBest wishes,\nYour Discovery Network Team\nP.S. Check out our latest blog post!";
	$emailContent = "Dear Alex,\n\nThis is the beginning of our email content, which continues to elaborate on various points.\n\nBest wishes";
	$emailContent = "Dear NewPerson,\n\nThis email content has been designed to include\nadditional line breaks for testing purposes.\n\nLet's see how it impacts the overall character count.";
	$emailContent = "Dear alex  ,\n\nThis is the email body content.\n\nBest wishes";

	$splits = explode("\n", $emailContent);
	$nsplits = sizeof($splits);
	for ($i=0; $i < $nsplits; ++$i) {
		$line = $splits[$i];
		$llen = strlen($line)+1;
		echo "$i  $line($llen)\n";
	}
	echo ">$emailContent<\n";

	$charCount = 0;
	$emailBody = $emailPreview = '';
	for ($i=2; $i < $nsplits; ++$i) {
		$line = $splits[$i];
		if (substr($line,0,4) == "Best")	break;
		$charCount += strlen($line)+1;
		$emailBody .= $line;
		$emailPreview = substr($emailBody,0,30) . "...";
	}
	echo "charCount $charCount\n";
	$token = strtok($splits[0], ", ");
	while ($token) {
		$tokenstok[] = $token;
		$token = strtok(", ");
	}
//	$tokenspreg = preg_split("/[ ,]/", $splits[0]);
	$name = ucfirst(strtolower($tokenstok[1] ?? ''));
	$updatedSplits = $splits;
	$updatedSplits[0] = "Dear $name,";
	$updatedEmailContent = implode("\n", $updatedSplits);
	echo $updatedEmailContent;


?></pre>

</body>
</html>