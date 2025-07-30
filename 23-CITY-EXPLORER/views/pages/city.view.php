<h1>City: <?= e($city->city)?>, <?= e($city->country)?></h1>

<table>
	<tbody>
	<tr>
		<th>Name</th>
		<td><?= e($city->city)?></td>
	</tr>
	<tr>
		<th>Country</th>
		<td><?= e($city->country)?></td>
	</tr>
	<tr>
		<th>ISO2</th>
		<td><?= e($city->iso2)?></td>
	</tr>
	<tr>
		<th>Population</th>
		<td><?= e($city->population)?></td>
	</tr>
	</tbody>
</table>