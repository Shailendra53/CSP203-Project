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
echo "<center>";
if (@$_GET['id']) {
	$check = mysql_query("SELECT * FROM users WHERE id = '".$_GET['id']."'");
	$rows = mysql_num_rows($check);
	if (mysql_num_rows($check) != 0) {
		while ($row = mysql_fetch_assoc($check)) {

			echo "<h3>".$row['username']."</h3><h5>".$row['name']."<img src='".$row['profile_pic']."' width ='50' height = '50'><br/>";
			echo "Date registered:".$row['date']."<br/>";
			echo "Email:".$row['email']."<br/>";
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