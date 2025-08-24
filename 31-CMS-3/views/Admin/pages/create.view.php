<h3>New Page</h3>

<?php if(!empty($errors)): ?>
	<ul>
		<?php foreach($errors as $error): ?>
			<li><?= $error ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<form method="post" action="index.php?route=admin/pages/create">
	<label for="title">Title</label>
	<input type="text" name="title" id="title" value="<?= ep('title') ?>" />

	<label for="slug">Slug</label>
	<input type="text" name="slug" id="slug" value="<?= ep('slug') ?>" />

	<label for="content">Content</label>
	<textarea type="text" name="content" id="content"><?= ep('content') ?></textarea>

	<input type="submit" value="Create" />
</form>

