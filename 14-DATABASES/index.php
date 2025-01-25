<?php

require_once __DIR__ . '../../inc/functions.inc.php';

try {
	$pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '',
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
	echo $e->getMessage();
}
$title = 'x title';
$content = 'x content';


$query = $pdo->prepare('INSERT INTO `notes` (title, content) VALUES (:ptitle, :pcontent)');
$query->bindValue(':ptitle', $title);
$query->bindValue(':pcontent', $content);
$query->execute();


$query = $pdo->prepare('SELECT * FROM notes ');
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

echo "";

?>

<ul>
	<?php foreach( $results as $note): ?>
		<li><?= e($note['title']) ?></li>
	<?php endforeach; ?>
</ul>
