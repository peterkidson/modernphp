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
	$courses = [
			[
					'title' => 'German for Beginners',
					'desc' => 'Learn basic German vocabulary, grammar, and everyday phrases.',
					'flag' => '🇩🇪'
			],
			[
					'title' => 'French for Beginners',
					'desc' => 'Master fundamental French skills including basic vocabulary and conversational techniques.',
					'flag' => '🇫🇷'
			],
			[
					'title' => 'Spanish for Beginners',
					'desc' => 'Acquire essential Spanish vocabulary and gain proficiency in daily conversations.',
					'flag' => '🇪🇸'
			]
	];
	var_dump($courses);
	nl();

	foreach ($courses AS $course) {
		var_dump($course['title']);
		var_dump($course['desc']);
		var_dump($course['flag']);
	}
	nl();

	foreach ($courses[2] AS $value) {
		var_dump($value);
	}

	?></pre>

<?php foreach ($courses AS $course): ?>
	<details>
		<summary><?php echo e($course['flag']); ?> <?php echo e($course['title']); ?></summary>
		<p><?php echo e($course['desc']); ?></p>
	</details>
<?php endforeach; ?>


</body>
</html>