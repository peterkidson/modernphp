<?php

global $pdo;
require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');
if (strlen($char) > 1) $char = $char[0];
$char = strtoupper($char);

function fetchNames(string $char)
{
   global $pdo;

   $stmt = $pdo->prepare('SELECT DISTINCT name FROM names WHERE name LIKE :expr ORDER BY name ASC');
   $stmt->bindValue(':expr', $char . '%');
   $stmt->execute();
   $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
   //$names = [];
   foreach ($rs as $r) $names[] = $r['name'];
   return $names;
}

$names = fetchNames($char);

?>
<?php require __DIR__ . '/views/header.php'; ?>

<ul>
   <?php foreach ($names as $name) : ?>
      <li>
         <a href="name.php?<?= http_build_query(['name' => $name]) ?>])">
            <?php echo e($name); ?>
         </a>
      </li>
   <?php endforeach; ?>

</ul>

<?php require __DIR__ . '/views/footer.php'; ?>