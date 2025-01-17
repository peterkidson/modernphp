<?php

require_once __DIR__ . '/inc/functions.inc.php';

$cityGET = $_GET['city'] ?? null;

$cityBz2Filename = $cityData = null;
if (!empty($cityGET)) {
	$cities = json_decode(file_get_contents(__DIR__ . '/../data/index.json'), true);
	foreach ($cities as $city) {
		if ($city['city'] == $cityGET) {
			$cityBz2Filename = $city['filename'];
			break;
		}
	}
}
if (!empty($cityBz2Filename)) {
	$fp = 'compress.bzip2://' . __DIR__ . '/../data/' . $cityBz2Filename;
	$cityData = json_decode(file_get_contents($fp), true)['results'];
}

echo "";
?>


<?php require_once __DIR__ . '/views/header.inc.php'; ?>

<?php if (empty($cityBz2Filename)): ?>
	<p>City <?= $cityGET ?> could not be loaded</p>
<?php else: ?>

<?php endif; ?>


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

<?php require_once __DIR__ . '/views/footer.inc.php'; ?>
