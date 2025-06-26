<?php

require __DIR__ . '/inc/all.inc.php';

function fetchNamesOverview() : array
{
   global $pdo;

   $stmt = $pdo->prepare("select `name`, SUM(`count`) as sum 
                                from names.names n 
                                group by `name` 
                                order by sum desc 
                                limit 10");
   $stmt->execute();
   $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $rs;
}

$overview = fetchNamesOverview();

?>
<?php require __DIR__ . '/views/header.php'; ?>


<?php
//foreach ($overview as $name) {
//    echo $name['name']."<br>";
//}
?>
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

<?php require __DIR__ . '/views/footer.php'; ?>