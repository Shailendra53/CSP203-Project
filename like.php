<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
?>

<?php	
	
	$comm_id = $_GET['id'];
	$topic= $_GET['topic'];
	$like = 5;
	$unlike =0;

		if ($query = mysqli_query($connect,"UPDATE  comments set likes = likes+1 where  id = ".$comm_id." "))  {
			echo "Posted successfully";
		}
		else{
			echo "unable to post";
		}
		header("Location: topic.php?id=$topic");

	}
	else {
		header("Location: login.php");
	}
?>