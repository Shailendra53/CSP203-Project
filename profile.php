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
	$check = mysqli_query($connect,"SELECT * FROM users WHERE id = '".$_GET['id']."'");
	$rows = mysqli_num_rows($check);
	if (mysqli_num_rows($check) != 0) {
		while ($row = mysqli_fetch_assoc($check)) {

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