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
<?php include("header.php"); ?>
<form action="comment.php" method="post">
<center>
	Topic ID: <br/> <input type="text" name="topic_id" style="width:400px;"><br/>
	Content: <br/> <textarea style="width: 400px; min-height: 300px;" name="content"></textarea><br/>
	<input type="submit" name="submit" value="post">
</center>
</form>
</body>
</html>

<?php	
	$topicid = @$_POST['topic_id'];
	$topic_name = @$_POST['topic_name'];
	$content = @$_POST['content'];
	$t = time();
	$date = date("Y-m-d",$t);

	if (isset($_POST['submit'])) {

		if ($query = mysqli_query($connect,"INSERT INTO comments(`id`,`comment_content`,`topic_id`,`comment_author`,`date`) VALUES ('','".$content."','".$topicid."','".$_SESSION['username']."','".$date."')")) {
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