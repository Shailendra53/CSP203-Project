<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
?>

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