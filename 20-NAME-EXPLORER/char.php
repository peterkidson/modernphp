<?php

require __DIR__ . '/inc/all.inc.php';

$char = strtoupper((string) ($_GET['char'] ?? ''));
if (strlen($char) > 1)
    $char = $char[0];
if (strlen($char) === 0) {
    header("location: index.php");
    die;
}



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