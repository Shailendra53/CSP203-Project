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
<a href="post.php">Post Topic</a>

<?php	
	if ($_GET['id']) {
		$topicid = $_GET['id'];

		$check = mysql_query("SELECT * FROM topics WHERE topic_id='".$_GET['id']."'");
		if (mysql_num_rows($check)) {
			while ($row = mysql_fetch_assoc($check)) {
				$check_user = mysql_query("SELECT * FROM users WHERE username='".$row['author']."'");
				while ($row_user = mysql_fetch_assoc($check_user)) {
					$userid = $row_user['id'];
				}
			echo "<h1>".$row['topic_name']."</h1>";
			echo "<h5>By <a href='profile.php?id=$userid'>".$row['author']."</a><br/> Date:".$row['date']."</h5>";
			echo "<p>".$row['topic_content']."</p>";

			}
		}
		$checkc = mysql_query("SELECT * FROM comments WHERE topic_id='".$topicid."'");
		echo "<h1>comments:</h1>";
		if (mysql_num_rows($checkc)) {
			while ($rowc = mysql_fetch_assoc($checkc)) {
				$check_userc = mysql_query("SELECT * FROM users WHERE username='".$rowc['comment_author']."'");
				while ($row_userc = mysql_fetch_assoc($check_userc)) {
					$userid = $row_userc['id'];
				}
			echo "<h5>By <a href='profile.php?id=$userid'>".$rowc['comment_author']."</a><br/> Date:".$rowc['date']."</h5>";
			echo "<p>".$rowc['comment_content']."</p>";

			}
		}
		echo "<a href='comment.php?id=".$topicid."'>Add comment </a>";
	}
	else{
		echo "No topic on this.";
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
		header("Location: login.php");
	}
?>