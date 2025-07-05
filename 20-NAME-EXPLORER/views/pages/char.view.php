<ul>
	<?php foreach ($namesByInitial as $name) : ?>
		<li>
			<a href="name.php?<?= http_build_query(['name' => $name]) ?>">
				<?php echo e($name); ?>
			</a>
		</li>
	<?php endforeach; ?>

</ul>
