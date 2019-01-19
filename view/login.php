<html>
<body>
<?php

$page_title = 'Log in';

require "../mysqli_connect.php" ;

$name = $_POST['name'];
$password = $_POST['password'];

$q = "SELECT * FROM user WHERE `name` = '$name'";

$r = @mysqli_query($dbc, $q);

$num = mysqli_num_rows($r);

$q2 = "SELECT * FROM user WHERE `password` = SHA2('$password', 512)";

$r2 = @mysqli_query($dbc, $q2);

$num2 = mysqli_num_rows($r2);

if ($num > 0 && $num2 > 0) {

	header('Location: '.'main.php');

}

else {

	header('Location:'.$_SERVER['HTTP_REFERER']);

};

mysqli_close($dbc);

?>
</body>
</html>