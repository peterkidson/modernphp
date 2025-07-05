<h3>Statistics for the name : <?= e($name) ?></h3>

<?php if (empty($entries)): ?>
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
		  <?php foreach ($entries as $entry) : ?>
            <tr>
                <td><?= e($entry['year']) ?></td>
                <td><?= e($entry['count']) ?></td>
            </tr>
		  <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>