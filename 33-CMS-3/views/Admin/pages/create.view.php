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
	<input type="text" name="title" id="title" value="<?= epost('title') ?>" />

	<label for="slug">Slug</label>
	<input type="text" name="slug" id="slug" value="<?= epost('slug') ?>" />

	<label for="content">Content</label>
	<textarea type="text" name="content" id="content"><?= epost('content') ?></textarea>

	<input type="submit" value="Create" />
</form>

