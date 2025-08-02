<h1>List of cities:</h1>
<ul>
	<?php foreach ($cities as $city): ?>
		<li>
			<a href="city.php?<?= http_build_query(['id' => $city->id]); ?>)">
				<?= e($city->fullName()); ?> <?= e($city->population); ?>
			</a>
		</li>
	<?php endforeach; ?>
	<hr>
	<?php if($page > 1): ?>
		<a href="index.php? <?= http_build_query(['page' => $page-1]) ?>">Prev</a>
	<?php endif	?>
	<?php  if ($perPage * $page < $count): ?>
		<a href="index.php? <?= http_build_query(['page' => $page+1]) ?>">Next</a>
	<?php endif; ?>

</ul>