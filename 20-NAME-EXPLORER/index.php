<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');

$namesByInitial = fetchNamesByInitial($char);

?>
<?php require __DIR__ . '/views/header.php'; ?>

<ul>
   <?php foreach ($namesByInitial as $name) : ?>
      <li>
         <a href="name.php?<?= http_build_query(['name' => $name]) ?>">
            <?php echo e($name); ?>
         </a>
      </li>
   <?php endforeach; ?>

</ul>

<?php require __DIR__ . '/views/footer.php'; ?>