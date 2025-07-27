<?php
declare(strict_types=1);

function fetchNamesByInitial(string $char, int $page = 1, int $pagesize = 10): array
{
	global $pdo;
	$page = max(1, $page);

	if (strlen($char) > 1) $char = $char[0];
	$char = strtoupper($char);

	$stmt = $pdo->prepare('SELECT DISTINCT name FROM names WHERE name LIKE :expr ORDER BY name ASC LIMIT :limit OFFSET :offset');
	$stmt->bindValue(':expr',     "{$char}%");
	$stmt->bindValue(':limit',     $pagesize, PDO::PARAM_INT);
	$stmt->bindValue(':offset', ($page - 1) * $pagesize, PDO::PARAM_INT);
	$stmt->execute();
	$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rs as $r) $names[] = $r['name'];
	return $names;
}

function countNamesByInitial(string $char): int
{
	global $pdo;

	$stmt = $pdo->prepare('SELECT COUNT(DISTINCT NAME) AS count FROM names WHERE name LIKE :expr');
	$stmt->bindValue(':expr',     "{$char}%");
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}

function fetchNameEntries(string $name): array
{
	global $pdo;

	$stmt = $pdo->prepare('SELECT * FROM `names` WHERE `name` = :name ORDER BY `year` ASC');
	$stmt->bindValue(':name', $name);
	$stmt->execute();

	$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rs;
}

function fetchNamesOverview(): array
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

