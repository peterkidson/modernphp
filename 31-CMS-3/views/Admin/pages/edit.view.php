<h3>Edit Page</h3>

<?php if(!empty($errors)): ?>
	<ul>
		<?php foreach($errors as $error): ?>
			<li><?= $error ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<form method="post" action="index.php?<?= http_build_query(['route' => 'admin/pages/edit', 'id' => $page->id]); ?>">
	<label for="title">Title</label>
	<input type="text" name="title" id="title" value="<?= epost('title')!=='' ? epost('title') : $page->title ?>" />

	<label for="content">Content</label>
	<textarea type="text" name="content" id="content"><?= epost('content')!=='' ? epost('content') : $page->content ?></textarea>

	<input type="submit" value="Save" />
</form>

