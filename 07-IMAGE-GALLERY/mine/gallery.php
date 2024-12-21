<?php
global $imageTitles;
include './inc/functions.inc.php';
include './inc/images.inc.php';

// Part 3 (Implement the Image Page Contents)

?>
<?php include './views/header.php'; ?>

<div class="gallery-set">
	<?php foreach($imageTitles as $imageName => $imageTitle) : ?>
		<a href="image.php?<?php echo http_build_query(['imageName' => $imageName]); ?>" class="gallery-element">
			<h3><?php echo e($imageTitle); ?></h3>
			<img src="./images/<?php echo rawurlencode($imageName); ?>" alt="<?php echo e($imageTitle); ?>" />
		</a>
	<?php endforeach; ?>
</div>

<?php include './views/footer.php'; ?>
