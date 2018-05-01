<!DOCTYPE html>
<html>
<head>

	<title>EzDoc-QnA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	
</head>
<body>



<header id="header">
				<div class="inner">
					<a class="logo">EzDoc-QnA</a>
					<nav id="nav">
						<a href="index.php">Discussion Forum</a>
						<a href="account.php">My account</a> 
						<a href="members.php">Members</a>
						<a href="register.php">Register</a>
						<a href="login.php">Login</a>
						<a href="index.php?action=logout"> logout</a></center>	
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
<section id="main">
				<div class="inner" style="text-align: center;">


<form action="login.php" method="POST">
	Username<input type="text" name="username"><br/>
	Password<input type="password" name="password"><br/>
	
	<input type="submit" name="submit" value="Login">
	<button><a href = "register.php"> Register</a></button>
</form>
</div></section>
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