<?php 
session_start();
if (isset($_POST['register'])) {
	include 'mysql_connect_inc.php';
	//declare variables from forms
	$firstname = mysqli_real_escape_string($dbc, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($dbc, $_POST['lastname']);
	$username = strtolower(mysqli_real_escape_string($dbc, $_POST['username']));
	$email = strtolower(mysqli_real_escape_string($dbc, $_POST['email']));
	$password = mysqli_real_escape_string($dbc, $_POST['pwd']);
	$confirmpassword = mysqli_real_escape_string($dbc, $_POST['conpwd']);

	//control structures validating data
	if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($confirmpassword)) {
		echo $firstname;
		echo $lastname;
		echo $email;
		echo $username;
		echo $password;
		echo $confirmpassword;
		//header("Location:../index.php?registration=empty");
		exit();
	}

	else if ($password !== $confirmpassword) {
		header("Location:../index.php?registration=passwordnomatch");
		exit();
	}

	else {
		//checking if exits in member request database
		$usernamesql = "SELECT * FROM signup_data WHERE username = '$username'";
		$emailsql = "SELECT * FROM signup_data WHERE Email = '$email'";
		$usernameresult = mysqli_query($dbc, $usernamesql);
		$emailresult = mysqli_query($dbc, $emailsql);
		$usernamecheck = mysqli_num_rows($usernameresult);
		$emailcheck = mysqli_num_rows($emailresult);

		if ($usernamecheck > 0) {
			header("Location:../index.php?registration=usernametaken");
			exit();
		}
		if ($emailcheck > 0) {
			header("Location:../index.php?registration=emailregistered");
			exit();
		}

		else {
			$databaseenter = "INSERT INTO signup_data (firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password');";
			$databaseenterquery = mysqli_query($dbc, $databaseenter);
			//echo "<script>alert('registration succesful login');</script>";
			header("Location:../index.php?registration=succesful");
			exit();
		}
	}

}
else {
	echo "Wrong Entry, Be gone!!";
	exit();
}
?>