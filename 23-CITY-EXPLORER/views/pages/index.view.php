<h1>List of cities:</h1>
<ul>
    <?php foreach($entries AS $city): ?>
        <li>
			  	<a href="city.php?<?= http_build_query(['id' => $city->id]); ?>)">
            <?= e($city->fullName()); ?>)
				</a>
        </li>
    <?php endforeach; ?>
</ul>