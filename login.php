<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Login to the discussion forum</title>
</head>
<body>
<form action="login.php" method="POST">
	Username<input type="text" name="username"><br/>
	Password<input type="password" name="password"><br/>
	
	<input type="submit" name="submit" value="Login">
	<button><a href = "index.php"> Register</a></button>
</form>
</body>
</html>

<?php
	session_start();
	require('connect.php');
	$username = @$_POST['username'];
	$password = @$_POST['password'];

	if (isset($_POST['submit'])) {
		$check = mysqli_query($connect,"SELECT * FROM users WHERE username='".$username."'");
		$rows = mysqli_num_rows($check);

		if (mysqli_num_rows($check) != 0) {
			while ($row = mysqli_fetch_assoc($check)) {
				$db_username = $row['username'];
				$db_password = $row['password'];
			}

			if ($username == $db_username && sha1($password) == $db_password) {
				@$_SESSION["username"] = $username;
				header("Location: index.php");
			}
			else{
				echo "Wrong password";
			}
		} 
		else{
			die("username not found");
		}
	}
	else{
		echo "please fill in all the details";
	}

?>