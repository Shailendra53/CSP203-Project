<?php
	require('connect.php');
	if (@$_SESSION['username']) {
?>
<center><a href="index.php">Discussion Forum</a> | <a href="account.php">My account</a> | <a href="members.php">Members</a> | 
<?php 
$check = mysqli_query($connect,"SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
	$rows = mysqli_num_rows($check);
	while ($row = mysqli_fetch_assoc($check)) {
		$id = $row['id'];
	}
echo "<a href='profile.php?id=$id'>".@$_SESSION["username"]; 
?></a>
| <a href="index.php?action=logout"> logout</a></center>
<?php
	}
	else {
		header("Location: login.php");
	}
?>