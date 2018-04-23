<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
?>
<center><a href="index.php">Discussion Forum</a> | <a href="account.php">My account</a> | <a href="members.php">Members</a>
| <a href="index.php?action=logout"> logout</a></center>	
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">

	<title>home page</title>
</head>
<body>
<?php  
	
	$check = mysqli_query($connect,"SELECT * FROM users");
	$rows = mysqli_num_rows($check);
	while ($row = mysqli_fetch_assoc($check)) {
		$id = $row['id'];
		echo "<a href='profile.php?id=$id'>".$row['username']."</a><br/>";
	}
	
?>
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