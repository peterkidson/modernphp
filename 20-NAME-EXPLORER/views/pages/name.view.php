<h3>Statistics for the name : <?= e($colname) ?></h3>

<?php if (empty($citiesRepo)): ?>
    <p>No entries</p>
<?php else: ?>
    <table>
        <thead>
        <tr>
            <th>Year</th>
            <th>Births</th>
        </tr>
        </thead>
        <tbody>
		  <?php foreach ($citiesRepo as $entry) : ?>
            <tr>
                <td><?= e($entry['year']) ?></td>
                <td><?= e($entry['count']) ?></td>
            </tr>
		  <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>