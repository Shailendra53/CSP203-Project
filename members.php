<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
?>	
<!DOCTYPE html>
<html>
<head>

	<title>home page</title>
</head>
<body>
<?php 
include("header.php"); 
	
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