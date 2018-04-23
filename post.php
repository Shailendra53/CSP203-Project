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
<form action="post.php" method="post">
<center>
	Topic name: <br/> <input type="text" name="topic_name" style="width:400px;"><br/>
	Content: <br/> <textarea style="width: 400px; min-height: 300px;" name="content"></textarea><br/>
	<input type="submit" name="submit" value="post">
</center>
</form>
</body>
</html>

<?php	
	date_default_timezone_set('UTC');
	$topic_name = @$_POST['topic_name'];
	$content = @$_POST['content'];
	$date = date("Y-m-d",time());

	if (isset($_POST['submit'])) {
		if ($query = mysqli_query($connect,"INSERT INTO topics(`topic_id`,`topic_name`,`topic_content`,`author`,`date`) VALUES ('','".$topic_name."','".$content."','".$_SESSION['username']."','".$date."')")) {
			echo "Posted successfully";
		}
		else{
			echo "unable to post";
		}

	}
	if (@$_GET['action'] == 'logout') {
		session_destroy();
		header("Location: login.php");
	}
	}
	else {
		header("Location: login.php");
	}
?>