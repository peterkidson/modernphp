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

	$emailTemplate = "Dear [NAME],\n\nWe're excited to share with you this week's featured article:\n\n[ARTICLE]\n\n" .
							"Upcoming Events:\n[EVENTS]\n\nBest regards,\nYour Friendly Team";

	$recipient = ['name' => 'Alice', 'segment' => 'Tech Enthusiast', 'email' => 'alice@example.com'];

	$segmentContent = [
			'Tech Enthusiast' => "The Latest in Tech: Top Gadgets",
			'Health Guru' => "Transform Your Lifestyle: The Best of Health and Fitness",
	];

	$events = [
			"Webinar on Future Tech Trends",
			"Photography Workshop",
			"Health and Wellness Retreat"
	];

	for($i=0; $i<sizeof($events); ++$i) {
		$events2[] = "- $events[$i]" . ($i < sizeof($events) - 1 ? "\n" : "");
	}

	$personalizedEmail = str_replace("[NAME]", 		$recipient['name'], $emailTemplate);
	$personalizedEmail = str_replace("[ARTICLE]",	$segmentContent[$recipient['segment']], $personalizedEmail);
	$personalizedEmail = str_replace("[EVENTS]", 	implode($events2), $personalizedEmail);


	echo 	$personalizedEmail;

	?></pre>

<p>
</p>

</body>
</html>