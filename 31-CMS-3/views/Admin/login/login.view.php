<!--<form METHOD="post"	ACTION="index.php?< ? = http_build_query(['route' => 'admin/login']) ?>" >-->
<form METHOD="post"	action="" >
	<label for="username">Username</label>
	<input type="text" name="username" id="username" value="<?= epost('username') ?>" />

	<label for="password">Password</label>
	<input type="password" name="password" id="login-password" value="" />

	<br>
	<input type="submit" name="submit" value="Login" />

</form>

