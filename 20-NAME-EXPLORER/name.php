<?php

require __DIR__ . '/inc/all.inc.php';

$name =(string) ($_GET['name'] ?? '');
if (empty($name)) {
    header("Location: Index.php");
    die();
}

$entries = fetchNameEntries($name);

?>
<?php require __DIR__ . '/views/header.php'; ?>

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
                    <td><?= e($entry['year'])  ?></td>
                    <td><?= e($entry['count']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>