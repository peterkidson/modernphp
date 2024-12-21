<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';

global $imageDescriptions, $imageTitles;
$imageName 	= $_GET['imageName'];
if (!empty($imageName) && !empty($imageTitles[$imageName])) {
	$imageTitle = $imageTitles[$imageName];
	$imageDesc 	= $imageDescriptions[$imageName];
}


?>
<?php include './views/header.php'; ?>

<?php if (!empty($imageTitle)): ?>
	<h3><?php echo e($imageTitle); ?></h3>
	<img src="./images/<?php echo rawurlencode($imageName); ?>" />
	<p><?php echo e($imageDesc); ?></p>
<?php else: ?>
   No image <?php echo e($imageName); ?> found.
<?php endif; ?>

<a href="gallery.php">Back to gallery</a>
<?php include './views/footer.php'; ?>
