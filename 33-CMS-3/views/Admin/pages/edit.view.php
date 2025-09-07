<h3>Edit Page</h3>

<?php if(!empty($errors)): ?>
	<ul>
		<?php foreach($errors as $error): ?>
			<li><?= $error ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<form method="post" action="index.php?<?= http_build_query(['route' => 'admin/pages/edit', 'id' => $page->id]); ?>">

	<input type="hidden" name="_csrf" value="<?= csrfToken() ?>" />

	<label for="title">Title</label>
	<input type="text" name="title" id="title" value="<?= isset($_POST['title']) ? $_POST['title']: $page->title ?>" />

	<label for="content">Content</label>
	<textarea type="text" name="content" id="content"><?= isset($_POST['content']) ? $_POST['content']: $page->title ?></textarea>

	<input type="submit" value="Save" />
</form>

