<ul>
	<?php foreach ($namesByInitial as $name) : ?>
		<li>
			<a href="name.php?<?= http_build_query(['name' => $name]) ?>">
				<?php echo e($name); ?>
			</a>
		</li>
	<?php endforeach; ?>

</ul>

<?php for($charpage = 1; $charpage < ($pagination['count'] / $pagination['pagesize'] + 1); $charpage++): ?>
    <a xclass="button" href="char.php?<?php echo http_build_query(['char' => $char, 'page' => $charpage]); ?>">
		 <?php if ($charpage === $pagination['page']): ?>
           <strong><u><?php echo e($charpage); ?></u></strong>
		 <?php else: ?>
			 <?php echo e($charpage); ?>
		 <?php endif; ?>
    </a>
<?php endfor; ?>