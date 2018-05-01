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

<form action="register.php" method="POST">
	Name<input type="text" name="name"><br/>
	Username<input type="text" name="username"><br/>
	Password<input type="password" name="password"><br/>
	Confirm Password<input type="password" name="repassword">
	<br/>
	Email<input type="text" name="email"><br/>
	
	<input type="submit" name="submit" value='Register'>
	<button><a href="login.php">Login</a></button>
</form>
</div></section>
</body>
</html>

<?php
	require('connect.php');
	$name = @$_POST['name'];
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	$email = @$_POST['email'];
	$repass = @$_POST['repassword'];
	$date = date("Y-m-d",time());
	$pass_en = sha1($password);

	if (isset($_POST['submit'])) {
		if ($username && $password ) {
			if (strlen($username) >= 5 && strlen($username) <=25 && strlen($password) > 7) {
				if ($repass == $password) {
					
				if($query = mysqli_query($connect,"INSERT INTO users (`id`,`name`,`username`,`password`,`email`) VALUES ('','".$name."','".$username."','".$pass_en."','".$email."')")) {
					echo "success";
				}
				else {
					echo "Failure";
				}
				
				
			}
			else {
				echo "password didn't match";
			}
		}
			elseif (strlen($username) <= 5 && strlen($username) >=25 ) {
				echo "Username should be of 5 to 25 characters";
			}
			elseif (strlen($password) > 7) {
				echo "Password should be atleast 8 characters";
			}
		}

		
	}
?>