<?php

require_once __DIR__ . '../../inc/functions.inc.php';

function plist($pdo)
{
	$query = $pdo->prepare('SELECT * FROM notes ');
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_ASSOC);
	?>

	<ul>
		<?php foreach( $results as $note): ?>
			<li><?= e($note['title']) ?></li>
		<?php endforeach; ?>
	</ul>

	<?php
}

try {
	$pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '',
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
	echo $e->getMessage();
	die();
}

plist($pdo);

$id		= 3;
$title 	= 'u title';
$content	= 'u content';

$query = $pdo->prepare('UPDATE notes SET title = :ptitle, content = :pcontent WHERE id > :pid');
$query->bindValue(':ptitle', $title);
$query->bindValue(':pcontent', $content);
$query->bindValue(':pid', $id);
$query->execute();

plist($pdo);

$query = $pdo->prepare('INSERT INTO `notes` (title, content) VALUES ("hello", "world")');
$query->execute();

plist($pdo);

$query = $pdo->prepare('DELETE FROM notes WHERE title = :ptitle');
$query->bindValue(':ptitle', $title);
$query->execute();

plist($pdo);

echo "";