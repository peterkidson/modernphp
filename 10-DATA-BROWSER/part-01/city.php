<?php

require_once __DIR__ . '/inc/functions.inc.php';

$cityGET = $_GET['city'] ?? null;

$cityBz2Filename = null;
if (!empty($cityGET)) {
	$cities = json_decode(file_get_contents(__DIR__ . '/../data/index.json'), true);
	foreach ($cities as $city) {
		if ($city['city'] == $cityGET) {
			$cityBz2Filename = $city['filename'];
			break;
		}
	}
}

$stats = [];
if (!empty($cityBz2Filename)) {
	$fp = 'compress.bzip2://' . __DIR__ . '/../data/' . $cityBz2Filename;
	$cityResults = json_decode(file_get_contents($fp), true)['results'];

	foreach ($cityResults as $result) {
		if (	!in_array($result['parameter'], ['pm25','pm10'])
			||	$result['value'] < 0				)  continue;

		$month = substr($result['date']['local'], 0, 7);

		if (!isset($stats[$month])) {
			$stats[$month] = [ 'pm25' => [], 'pm10' => [] ];
		}

		$stats[$month][$result['parameter']][] = $result['value'];

//		echo "";
	}
}

echo "";
?>


<?php require_once __DIR__ . '/views/header.inc.php'; ?>


<ul>
	<?php foreach ($cities as $city): ?>
		<li>
			<a href="city.php?<?= http_build_query(['city' => $city['city']]) ?>">
				<?php echo e($city['city']) ?>,
				<?php echo e($city['country']) ?>,
				<?php echo e($city['flag']) ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>


<?php if (empty($cityBz2Filename)): ?>
	<p>City <?= $cityGET ?> could not be loaded</p>
<?php else: ?>
	<?php if (!empty($stats)): ?>
		<table>
			<thead>
				<tr>
					<th>Month</th>
					<th>PM 2.5</th>
					<th>PM 10</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($stats as $month => $measurements): ?>
					<tr>
						<th><?= e($month) ?></th>
						<td><?= e(array_sum($measurements['pm25']) / count($measurements['pm25'])) ?></td>
						<td><?= e(array_sum($measurements['pm10']) / count($measurements['pm10'])) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>

<?php require_once __DIR__ . '/views/footer.inc.php'; ?>
