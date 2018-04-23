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
<a href="post.php">Post Topic</a>

<?php	
	if ($_GET['id']) {
		$topicid = $_GET['id'];

		$check = mysqli_query($connect,"SELECT * FROM topics WHERE topic_id='".$_GET['id']."'");
		if (mysqli_num_rows($check)) {
			while ($row = mysqli_fetch_assoc($check)) {
				$check_user = mysqli_query($connect,"SELECT * FROM users WHERE username='".$row['author']."'");
				while ($row_user = mysqli_fetch_assoc($check_user)) {
					$userid = $row_user['id'];
				}
			echo "<h1>".$row['topic_name']."</h1>";
			echo "<h5>By <a href='profile.php?id=$userid'>".$row['author']."</a><br/> Date:".$row['date']."</h5>";
			echo "<p>".$row['topic_content']."</p>";

			}
		}
		$checkc = mysqli_query($connect,"SELECT * FROM comments WHERE topic_id='".$topicid."'");
		echo "<h1>comments:</h1>";
		if (mysqli_num_rows($checkc)) {
			while ($rowc = mysqli_fetch_assoc($checkc)) {
				$check_userc = mysqli_query($connect,"SELECT * FROM users WHERE username='".$rowc['comment_author']."'");
				while ($row_userc = mysqli_fetch_assoc($check_userc)) {
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
<form action="comment.php" method="post">
<center>
	Topic ID: <br/> <input type="text" name="topic_id" style="width:400px;"><br/>
	Content: <br/> <textarea style="width: 400px; min-height: 300px;" name="content"></textarea><br/>
	<input type="submit" name="submit" value="post">
</center>
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


