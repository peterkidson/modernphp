<h3>Manage Pages</h3>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Slug</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($pages as $page) : ?>
		<tr>
			<td><?php echo $page->id; ?></td>
			<td><?php echo $page->title; ?></td>
			<td><?php echo $page->slug; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>

</table>

