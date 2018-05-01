<?php
	require('connect.php');
	if (@$_SESSION['username']) {
?>
<center><a href="index.php">Discussion Forum</a> | <a href="account.php">My account</a> | <a href="members.php">Members</a>
| <a href="index.php?action=logout"> logout</a></center>
<?php
	}
	else {
		header("Location: login.php");
	}
?>