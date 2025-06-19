<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'root', '', [
//    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'names', 'names', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    echo 'A problem occured with the database connection...' . $e->getMessage();
    die();
}

//$stmt = $pdo->prepare('SELECT * FROM `names`');
//$stmt->execute();
//var_dump($stmt->fetch(PDO::FETCH_ASSOC));