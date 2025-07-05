<h2>Top Names</h2>
<ol>
	<?php foreach ($overview as $row): ?>
       <li>
           <a href="name.php?<?= e(http_build_query(['name' => $row['name']])); ?>">
				  <?= e($row['name']); ?>
           </a>
       </li>
	<?php endforeach; ?>
</ol>
