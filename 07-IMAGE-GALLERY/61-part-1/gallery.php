<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

// Part 1 (Display the Images in a Gallery View)

?>
<?php include './views/header.php'; ?>

<?php foreach( $imageTitles as $img => $title) : ?>
	<a href="image.php?<?php echo http_build_query(['image' => $img]); ?>">
		<h3><?php echo e($title); ?></h3>
		<img src="./images/<?php echo rawurlencode($img); ?>" alt="<?php echo e($title); ?>" />
	</a>
<?php endforeach; ?>

<?php include './views/footer.php'; ?>
