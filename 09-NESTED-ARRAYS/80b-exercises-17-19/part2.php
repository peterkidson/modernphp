<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../10-DATA-BROWSER/part-01/inc/simple.css" />
	<title>Document</title>
</head>
<body>

<pre>
<?php

	require_once __DIR__ . '../../inc/functions.inc.php';
	require_once __DIR__ . '../../inc/part2.inc.php';

	global $campaigns;

	$totalClicks = $totalImps = $totalAdsets = 0;
	$totalCampaignClicks = $totalCampaignImpressions = [];
	foreach ($campaigns as $campaign => $adsets) {
		$totalCampaignClicks[$campaign] = $totalCampaignImpressions[$campaign] = 0;
		foreach ($adsets as $adset => $adsetDetails) {
			++ $totalAdsets;
			if (isset($adsetDetails['clicks']))			$totalCampaignClicks[$campaign]			+= $adsetDetails['clicks'];
			if (isset($adsetDetails['impressions'])) 	$totalCampaignImpressions	[$campaign]	+= $adsetDetails['impressions'];
		}
		$totalClicks	+= $totalCampaignClicks			[$campaign];
		$totalImps		+= $totalCampaignImpressions	[$campaign];
	}
	$averageClicks	= $totalAdsets > 0 ? round($totalClicks	/ $totalAdsets, 0) : 0;
	$averageImps	= $totalAdsets > 0 ? round($totalImps 	/ $totalAdsets, 0) : 0;

?>
Average clicks per ad set: <?= $averageClicks ?>, Average impressions per ad set: <?= $averageImps ?>.

</pre>



</body>
</html>