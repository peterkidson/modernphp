<form method="POST" action="edit.php?<?= http_build_query(['id' => $city->id]) ?> ">
	<label for="city">City:</label>
	<input type="text" name="city" id="city" value="<?= e($city->city) ?>" required />

	<label for="country">Country:</label>
	<input type="text" name="country" id="country" value="<?= e($city->country) ?>" required />

	<label for="iso2">ISO-2:</label>
	<input type="text" name="iso2" id="iso2" value="<?= e($city->iso2) ?>" required />

	<label for="population">Population:</label>
	<input type="number" name="population" id="population" value="<?= e($city->population) ?>" required />

	<br>
	<input type="submit" value="Save" />
</form>


