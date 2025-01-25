<?php

require_once __DIR__ . '../../inc/functions.inc.php';

try {
	$pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '',
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
	echo $e->getMessage();
}
$id = $_GET['id'];

$query = $pdo->prepare('SELECT * FROM notes where id = :xid');
$query->bindValue(':xid', $id, PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

echo "";

?>

<ul>
	<?php foreach( $results as $note): ?>
		<li><?= e($note['title']) ?></li>
	<?php endforeach; ?>
</ul>
