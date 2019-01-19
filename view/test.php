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
	<form method="post" action="test.php" class="container text-center">
		<fieldset>
			<legend> Claim from Faucet </legend>
			<p> Claim 20 credits every 15 minutes </p>
			<p> Credit Balance: 
				<?php 

				require("../mysqli_connect.php");

				date_default_timezone_set('Asia/Singapore');
				$name = 'admin';//SESSION NAME HERE
				$time = date('Y-m-d H:i:s');

				$q = "SELECT * FROM `user` WHERE `name` = '$name'";

				$r = @mysqli_query($dbc, $q);

				$row = @mysqli_fetch_assoc($r);

				$time_now = $row['last_claim_date_time'];

				$time_claim = date('Y-m-d H:i:s', strtotime('+15 minutes', strtotime($time_now)));

				if ($_SERVER['REQUEST_METHOD'] == 'POST' && $time > $time_claim) {

					$new_amount = $row['credit'] + 20;

					mysqli_free_result($r);

					$q = "UPDATE `user` SET `credit` = '$new_amount', `last_claim_date_time` = NOW() WHERE `name` = '$name' " ;

					$r = @mysqli_query($dbc, $q);

					$q = "SELECT * FROM `user` WHERE `name` = '$name'";

					$r = @mysqli_query($dbc, $q);

					$row = @mysqli_fetch_assoc($r);

					echo('<strong>'.$row['credit'].'</strong>');

				} else {

					echo('<strong>'.$row['credit'].'</strong>');

					if ($time < $time_claim) {

						echo('<p>You have claimed within the past 15 minutes</p>');

					}
				
				}

				echo('<p> Last Claim Time: '.$time_now.'</p>
					<p> Next Claim Valid Time: '.$time_claim.'</p>');

				mysqli_close($dbc);

				?>
			</p>
			<input type="submit" name="submit" value="Claim">
		</fieldset>
	</form>

	<?php create_ad() ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>