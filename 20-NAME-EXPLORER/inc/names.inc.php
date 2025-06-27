<?php
declare(strict_types=1);

function fetchNamesByInitial(string $char) : array
{
   global $pdo;

   if (strlen($char) > 1) $char = $char[0];
   $char = strtoupper($char);

   $stmt = $pdo->prepare('SELECT DISTINCT name FROM names WHERE name LIKE :expr ORDER BY name ASC');
   $stmt->bindValue(':expr', $char . '%');
   $stmt->execute();
   $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
   foreach ($rs as $r) $names[] = $r['name'];
   return $names;
}

function fetchNameEntries(string $name) : array
{
   global $pdo;

   $stmt = $pdo->prepare('SELECT * FROM `names` WHERE `name` = :name ORDER BY `year` ASC');
   $stmt->bindValue(':name',  $name );
   $stmt->execute();

   $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $rs;
}

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

