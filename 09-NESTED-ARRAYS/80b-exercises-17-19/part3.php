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
require_once __DIR__ . '../../inc/part3.inc.php';

global $campaigns;
$specifiedAudience = 'Young Adults';

$hiCampaignCtrVal = -1; $highestCTR			= [];
$hiAdsetCtrVal		= -1;
$uniqueTargetAudiences = [];
$adWithHighestCTRForAudience	= [
		'targetAudience'	=> '',
		'highestCTRAdSet' => '',
		'highestCTR' 		=> 0
];


foreach ($campaigns as $campaignKey => $adsets)
{
	$campaignClicks = $campaignImpressions = 0;
	foreach ($adsets as $adsetKey => $adsetValues)
	{
		$adsetClicks 		= $adsetValues['clicks']		?? 0;
		$adsetImpressions	= $adsetValues['impressions']	?? 1;

		$campaignClicks 		+= $adsetClicks;
		$campaignImpressions	+= $adsetImpressions;

		$targeted = in_array($specifiedAudience, $adsetValues['targetAudience']);
		if ($targeted) {
			$adsetCtr = round(($adsetClicks / $adsetImpressions) * 100, 2);
			if ( $adsetCtr > $hiAdsetCtrVal) {
				$hiAdsetCtrVal = $adsetCtr;
				$highestAdsetCTR[$adsetKey] = $adsetCtr;
				$adWithHighestCTRForAudience = [
						'targetAudience'	=> $specifiedAudience,
						'highestCTRAdSet' => $adsetValues['name'],
						'highestCTR' 		=> $adsetCtr
				];
			}
		}

		foreach ($adsetValues['targetAudience'] as $targetAudience) {
			if (!in_array($targetAudience, $uniqueTargetAudiences)) {
				$uniqueTargetAudiences[] = $targetAudience;
			}
		}
	}

	$campaignCtr = round(($campaignClicks / $campaignImpressions) * 100, 2);
	if ($campaignCtr > $hiCampaignCtrVal) {
		$hiCampaignCtrVal = $campaignCtr;
		$highestCTR = [];
		$highestCTR[$campaignKey] = $campaignCtr;
	}
}

echo '';


?>
</pre>

</body>
</html>