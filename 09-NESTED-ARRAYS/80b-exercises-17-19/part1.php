<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../inc/simple.css" />
	<title>Document</title>
</head>
<body>

<pre><?php

	require_once __DIR__ . '../../inc/functions.inc.php';

	$campaigns = [
			'Spring Sale' => [
					'AdSet1' => [
							'name' => 'Discounted Gadgets'
					],
					'AdSet2' => [
							'name' => 'Outdoor Equipment'
					],
			],
			'Holiday Deals' => [
					'AdSet1' => [
							'name' => 'Winter Apparel'
					],
					'AdSet2' => [
							'name' => 'Electronics Special'
					],
			],
	];

	foreach ($campaigns as $campaignName => $adsets) {
		$adsetValues = [];
		foreach ($adsets as $asName => $asDetails) {
			foreach ($asDetails as $asKey => $asValue) {
				$adsetValues[] = "\"$asValue\"";
			}
		}
		$strAdsetValues = implode(", ", $adsetValues);
		echo "- $campaignName: $strAdsetValues\n";
	}

	?></pre>


</body>
</html>