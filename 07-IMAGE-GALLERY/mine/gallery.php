<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

// Part 2 (Design the Gallery Layout)

?>
<?php include './views/header.php'; ?>

<div class="gallery-container">
	<?php foreach( $imageTitles as $img => $title) : ?>
		<a href="image.php?<?php echo http_build_query(['image' => $img]); ?>" class="gallery-item">
			<h3><?php echo e($title); ?></h3>
			<img src="./images/<?php echo rawurlencode($img); ?>" alt="<?php echo e($title); ?>" />
		</a>
	<?php endforeach; ?>
</div>

<?php include './views/footer.php'; ?>
