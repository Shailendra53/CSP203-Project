<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
?>
	
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
	<div class = "inner" style="text-align: center;">
<?php  
echo "<center>";
if (@$_GET['id']) {
	$check = mysqli_query($connect,"SELECT * FROM users WHERE id = '".$_GET['id']."'");
	$rows = mysqli_num_rows($check);
	if (mysqli_num_rows($check) != 0) {
		while ($row = mysqli_fetch_assoc($check)) {

			echo "<p>".$row['username']."</p><h5>".$row['name']."<img src='".$row['profile_pic']."' width ='50' height = '50'><br/>";
			echo "Date registered:".$row['date']."<br/>";
			echo "Email:".$row['email']."<br/></h5>";
		}
	}
	else{
		echo "user has not registered";
	}
}
else{
	header("Location: index.php");
}

echo "</center>";
?>
</div></section>
</body>
</html>

<?php	
	if (@$_GET['action'] == 'logout') {
		session_destroy();
		header("Location: login.php");
	}
	}
	else {
		header("Location: login.php");
	}
?> 