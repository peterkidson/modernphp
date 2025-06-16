<?php

require_once __DIR__ . '../../inc/functions.inc.php';

$pdo = connectToDB('localhost', 'root', '', 'names');    // Can't get other users to work :-(

$stmt = $pdo->prepare("SELECT * from names");
$stmt->execute();
var_dump($stmt->fetch(PDO::FETCH_ASSOC));

?>

<!DOCTYPE html>
<?php //require_once __DIR__ . 'views/header.php'; ?>
<!---->
<!---->
<?php //require_once __DIR__ . 'views/footer.php'; ?>


