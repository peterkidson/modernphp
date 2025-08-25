<h3>Manage Pages</h3>

<table style="width: 100%;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Action</th>
			<th>Slug</th>
			<th>Content ...</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($pages as $page) : ?>
		<tr>
			<td><?= e($page->id) 	?></td>
			<td><?= e($page->title) ?></td>
			<td>
<!--				<a href="">View</a>-->
				<a href="">Edit</a>
				<form style="display: inline" method="POST" action="index.php?<?= http_build_query(['route' => 'admin/pages/delete']); ?>" >
					<input type="hidden" name="id" value="<?= e($page->id) ?>">
					<input type="submit" value="Delete" class="btn-link" />
				</form>
			</td>
			<td><?= e($page->slug) 	?></td>
			<td><?= e(substr($page->content,0, 20)) ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>

</table>

<a href="index.php?route=admin/pages/create">Create Page</a>