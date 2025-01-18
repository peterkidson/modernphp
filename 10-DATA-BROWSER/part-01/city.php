<?php

require_once __DIR__ . '/inc/functions.inc.php';

$cityGET = $_GET['city'] ?? null;

$filename = $cityInfo = null;
if (!empty($cityGET)) {
	$cities = json_decode(file_get_contents(__DIR__ . '/../data/index.json'), true);
	foreach ($cities as $ccity) {
		if ($ccity['city'] == $cityGET) {
			$filename = $ccity['filename'];
			$cityInfo = $ccity;
			break;
		}
	}
}

if (!empty($filename)) {
	$fp = 'compress.bzip2://' . __DIR__ . '/../data/' . $filename;
	$results = json_decode(file_get_contents($fp), true)['results'];

	$units	= ['pm25' => null, 'pm10' => null];
	foreach ($results as $result) {
		if (isset($units['pm25']) && isset($units['pm10'])) break;
		switch ($result['parameter']) {
			case 'pm25': $units['pm25'] = $result['unit']; break;
			case 'pm10': $units['pm10'] = $result['unit']; break;
		}
	}

	$stats 	= [];

	foreach ($results as $cityResult) {
		if (	!in_array($cityResult['parameter'], ['pm25','pm10'])
			||	$cityResult['value'] < 0										)  continue;

		$month = substr($cityResult['date']['local'], 0, 7);

		if (!isset($stats[$month])) {
			$stats[$month] = [ 'pm25' => [], 'pm10' => [] ];
		}

		$stats[$month][$cityResult['parameter']][] = $cityResult['value'];

//		echo "";
	}
}

echo "";
?>



<?php require_once __DIR__ . '/views/header.inc.php'; ?>


<ul>
	<?php foreach ($cities as $lcity): ?>
		<li>
			<a href="city.php?<?= http_build_query(['city' => $lcity['city']]) ?>">
				<?php echo e($lcity['city']) ?>,
				<?php echo e($lcity['country']) ?>,
				<?php echo e($lcity['flag']) ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>


<?php if (empty($filename)): ?>
	<p>City <?= $cityGET ?> could not be loaded</p>
<?php else: ?>
	<?php if (!empty($stats)): ?>
		<canvas id="aqi-chart" style="width: 300px; height: 200px;"></canvas>
		<script src="scripts/chart.umd.js"></script>

		<?php
			$months = array_keys($stats);
			sort($months);

			$Ypm25 = $Ypm10 = [];
			foreach ($months as $Xmonth) {
				$monthMeasurements = $stats[$Xmonth];
				$Ypm25[] = array_sum($monthMeasurements['pm25']) / count($monthMeasurements['pm25']);
				$Ypm10[] = array_sum($monthMeasurements['pm10']) / count($monthMeasurements['pm10']);
			}

		?>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const ctx = document.getElementById('aqi-chart');
				const chart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: <?= json_encode($months) ?>,
						datasets: [
							{
								label: <?= json_encode("AQI, PM2.5 in {$units['pm25']}") ?>,
								data: <?= json_encode($Ypm25) ?>,
								fill: false,
								borderColor: 'rgb(75, 192, 192)',
								tension: 0.1
							},
							{
								label: <?= json_encode("AQI, PM10 in {$units['pm10']}") ?>,
								data: <?= json_encode($Ypm10) ?>,
								fill: false,
								borderColor: 'rgb(255, 192, 192)',
								tension: 0.1
							}
						]
					},
				});
			});
		</script>

		<table>
			<thead>
				<tr>
					<th class="centre" colspan="3"><?= $cityInfo['city'] ?> <?= $cityInfo['flag'] ?></th>
				</tr>
				<tr>
					<th>Month</th>
					<th>PM 2.5</th>
					<th>PM 10</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($stats as $month => $monthMeasurements): ?>
					<tr>
						<th><?= e($month) ?></th>
						<td><?= e(round(array_sum($monthMeasurements['pm25']) / count($monthMeasurements['pm25']),2)) ?>
							<?= e($units['pm25']) ?></td>
						<td><?= e(round(array_sum($monthMeasurements['pm10']) / count($monthMeasurements['pm10']),2)) ?>
							<?= e($units['pm10']) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>

<?php require_once __DIR__ . '/views/footer.inc.php'; ?>
