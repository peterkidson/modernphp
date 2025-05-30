<?php

global $pdo;

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

date_default_timezone_set('Africa/Juba');

$itemsPerPage	= 3;

$stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM entries");
$stmt->execute();
$count 	= $stmt->fetch(PDO::FETCH_ASSOC)['count'];
$numPages = ceil($count / $itemsPerPage);

$page 	= isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page 	= max($page, 1);
$page 	= min($page, $numPages);
$offset	= $itemsPerPage * ($page-1);

$stmt = $pdo->prepare("SELECT * FROM entries ORDER BY MDATE DESC, id ASC LIMIT :itemsPerPage OFFSET :offset");
$stmt->bindParam(':itemsPerPage',	$itemsPerPage,	PDO::PARAM_INT);
$stmt->bindParam(':offset',			$offset,			PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "";
?>

<?php require __DIR__ . '/views/header.view.php'; ?>

<h1 class="main-heading">Entries</h1>

<?php foreach ($results as $result) : ?>
	<div class="card">
		<?php if (!empty($result['image'])) : ?>
			<div class="card__image-container">
				<img class="card__image" src="uploads\<?= e($result['image']) ?>" alt="" />
			</div>
		<?php endif ?>
		<div class="card__desc-container">
			<?php
				$explodedDate = explode('-', $result['mdate']);	// yyyy-mm-dd
				$timestamp = mktime(12,0,0, $explodedDate[1], $explodedDate[2], $explodedDate[0]);
			?>
			<div class="card__desc-time"><?= e(date('d m Y', $timestamp)); ?></div>
			<h2 class="card__heading"><?= e($result['title']) ?></h2>
			<p class="card__paragraph">
				<?= nl2br(e($result['message'])) ?>
			</p>
		</div>
	</div>
<?php endforeach; ?>

<?php if ($numPages > 1) : ?>

<ul class="pagination">

	<?php if ($page > 1) : ?>
		<li class="pagination__li">
			<a class="pagination__link" href="index.php?<?= http_build_query(['page' => $page-1]); ?>"
			>◄</a>
		</li>
	<?php endif; ?>

	<?php for($p=1; $p <= $numPages; $p++) : ?>
		<li class="pagination__li">
			<a class="pagination__link  <?php if ($page === $p) : ?> pagination__link--active<?php endif; ?> "
				href="index.php?<?= http_build_query(['page' => $p]); ?>"
			><?= e($p) ?> </a>
		</li>
	<?php endfor; ?>

	<?php if ($page < $numPages) : ?>
		<li class="pagination__li">
			<a class="pagination__link" href="index.php?<?= http_build_query(['page' => $page+1]); ?>"
			>►</a>
		</li>
	<?php endif; ?>

	<ul>

		<?php endif; ?>

		<?php require __DIR__ . '/views/footer.view.php'; ?>

