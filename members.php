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
				<div class="inner" style="text-align: center;">
<?php  
	
	$check1 = mysqli_query($connect,"SELECT * FROM users");
	$rows1 = mysqli_num_rows($check1);
	while ($row1 = mysqli_fetch_assoc($check1)) {
		$id = $row1['id'];
		echo "<a href='profile.php?id=$id'>".$row1['username']."</a><br/>";
	}
	
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
		echo "you have to be logged in";
	}
?>