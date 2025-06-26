<?php

try {
//    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'names', 'names', [
    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'p2', 'p2', [
//    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    echo 'A problem occured with the database connection...' . $e->getMessage();
    die();
}
echo "";
//$stmt = $pdo->prepare('SELECT * FROM `names`');
//$stmt->execute();
//var_dump($stmt->fetch(PDO::FETCH_ASSOC));