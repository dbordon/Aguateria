
<?php

require_once "config/database.php";

$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password'])))));

if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
}
else {

	$query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE USUCOD='$username' AND UsuPasswd='$password' AND UsuEst='A'")
									or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['USUCOD']   = $data['USUCOD'];
		$_SESSION['USUNOM']  = $data['USUNOM'];

		header("Location: main.php?module=start");
	}


	else {
		header("Location: index.php?alert=1");
	}
}
?>