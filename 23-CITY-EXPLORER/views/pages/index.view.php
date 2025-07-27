<h1>List of Cities</h1>

<ul>
	<?php foreach ($cities as $city) : ?>
		<li><?= $city->city ?> (<?= $city->population ?>)</li>
	<?php endforeach; ?>
</ul>



