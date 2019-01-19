<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Log In Page</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<?php

	function create_ad() {
		echo '<div class="alert-info role="alert" align="center"><p> This is an annoying ad!!This is an annoying ad!!This is an annoying ad!!This is an annoying ad!!This is an annoying ad!! </p></div>';
	};

	?>
</head>
<body>
	<?php create_ad() ?>
	<form method="post" action="login.php" class="container text-center">
		<fieldset>
			<legend> Log In Information Here </legend>
			<p>
				<label>Username: <input type="text" name="name" size="20" maxlength="40"></label>
			</p>
			<p>
				<label>Password: <input type="password" name="password" size="20" maxlength="40"></label>
			</p>
			<input type="submit" name="submit" value="Log in">
		</fieldset>
	</form>

	<?php create_ad() ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>