<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cities;charset=utf8mb4', 'peter', 'peter', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    echo 'A problem occured with the database connection...' . $e->getMessage();
    die();
}
//$stmt = $pdo->prepare('SELECT * FROM `worldcities`');
//$stmt->execute();
//$rs = $stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($rs);