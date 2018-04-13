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
	
	$check = mysql_query("SELECT * FROM users");
	$rows = mysql_num_rows($check);
	while ($row = mysql_fetch_assoc($check)) {
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