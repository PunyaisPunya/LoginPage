<?php
session_start();
if (isset($_POST['submit'])){

	include'mysql_connect_inc.php';

	$username = strtolower(mysqli_real_escape_string($dbc, $_POST['username']));
	$password = mysqli_real_escape_string($dbc, $_POST['password']);

	if (empty($username) || empty($password)){
		header("Location: ../index.php?login=empty");
		exit();
	}
	else {
		$sql = "SELECT * FROM signup_data WHERE username = '".$username."';";
		$result = mysqli_query($dbc, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=notexist");
			//echo $username;
			exit();
		}
		else {
			if ($row = mysqli_fetch_assoc($result)) {
				if ($password != $row['password']) {
					header("Location: ../index.php?login=notexist");
					exit();
				}
				else {
					$_SESSION['u_username'] = $row['username'];
					$_SESSION['u_email'] = $row['email'];
					//echo isset($_SESSION['u_username']);
					header("Location: ../index.php?login=successful");
				}
			}
		}
	}

}
else {
	echo "Something went wrong";
}
?>