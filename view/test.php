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
			<legend> Pull 1 Card from Gacha </legend>
			<p> 1 Pull Costs 200 Credits </p>
			<p> Credit Balance: 
				<?php 

				require("../mysqli_connect.php");

				$name = 'admin';//SESSION NAME HERE

				$q = "SELECT * FROM `user` WHERE `name` = '$name'";

				$r = @mysqli_query($dbc, $q);

				$row = @mysqli_fetch_assoc($r);

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					switch ($_POST['submit']){
					
					case "Pull Rare":
					$new_amount = $row['credit'] - 600;
					$rarity = 'rare';
					break; 

					default:
					$new_amount = $row['credit'] - 200;
					$rarity = 'common';

				}

				if ($new_amount >= 0) {

					$update_balance = "UPDATE `user` SET `credit` = '$new_amount' WHERE `name` = '$name' " ;

					$update_balance = @mysqli_query($dbc, $update_balance);

					$user_id = "SELECT * FROM `user` WHERE `name` = '$name'";
					$user_id = @mysqli_query($dbc, $user_id);
					$user_id = @mysqli_fetch_assoc($user_id);
					$user_id = $user_id['id'];

					$total_cards = "SELECT * FROM `card_data` WHERE `rarity` = '$rarity' ORDER BY `card_id` DESC LIMIT 1"; //COMMON RARITY ONLY
					$total_cards = @mysqli_query($dbc, $total_cards);
					$total_cards = @mysqli_fetch_assoc($total_cards);
					$total_cards = $total_cards['card_id'];
					$card_id = rand(1, $total_cards);

					$card_bonus = rand(1, 10);

					$add_card = "INSERT INTO `user_card` (`unique_id`, `user_id`, `card_id`, `card_bonus`) VALUES (NULL, '$user_id', '$card_id', '$card_bonus') " ;

					$add_card = @mysqli_query($dbc, $add_card);

					$new_balance = "SELECT * FROM `user` WHERE `name` = '$name'";
					$new_balance = @mysqli_query($dbc, $new_balance);
					$new_balance = @mysqli_fetch_assoc($new_balance);
					$new_balance = $new_balance['credit'];

					echo('<strong>'.$new_balance.'</strong>');

					$card_name = "SELECT * FROM `card_data` WHERE `card_id` = '$card_id'";
					$card_name = @mysqli_query($dbc, $card_name);
					$card_name = @mysqli_fetch_assoc($card_name);
					$card_name = $card_name['card_name'];

					echo('<p> You got an '.$card_name.'</p>');

					}

					else {

					echo('<strong>'.$row['credit'].'</strong>');

					if (isset($new_amount) && $new_amount < 0) {

						echo('<p>You have insufficient credits to claim</p>');

					}


				}

			}

			else {
				echo '<strong>'.$row['credit'].'</strong>';
			}

			mysqli_close($dbc);

			?>
			</p>
			<input type="submit" name="submit" value="Pull Common">
			<input type="submit" name="submit" value="Pull Rare">
		</fieldset>
	</form>

	<?php create_ad() ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>