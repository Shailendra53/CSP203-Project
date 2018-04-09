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
<?php echo '<table style="border: 1px;">' ?>
	
	<tr>
		<td width="80px;" style="text-align: center;"><span>ID</span></td>
		<td width="80px;" style="text-align: center;">Name</td>
		
		<td width="80px;" style="text-align: center;">Author</td>
		<td width="80px;" style="text-align: center;">Date</td>
	</tr>
	


<?php	
	$check = mysqli_query($connect,"SELECT * FROM topics");
	if (mysqli_num_rows($check)!= 0) {
		while ($row = mysqli_fetch_assoc($check)) {
			$id = $row['topic_id'];
			echo "<tr>";
			echo '<td width="80px;" style="text-align: center;">'.$row["topic_id"].'</td>';
			echo '<td width="80px;" style="text-align: center;"><a href="topic.php?id='.$id.'">'.$row["topic_name"].'</a></td>';
			$check_user = mysqli_query($connect,"SELECT * FROM users WHERE username='".$row['author']."'");
			while ($row_user = mysqli_fetch_assoc($check_user)) {
				$userid = $row_user['id'];
			}
			echo '<td width="80px;" style="text-align: center;"> <a href="profile.php?id=$userid">'.$row["author"].'</a></td>';
			$get_date = $row['date'];
			echo '<td width="80px;" style="text-align: center;"><a href="index.php?id=$get_date">'.$row["date"].'</td>';
		}
	}
	else{
		echo "No topics found.";
	}
	echo "</table>";
	if (@$_GET['date']) {
		$check_date = mysqli_query($connect,"SELECT * FROM topics WHERE date ='".$_GET['date']."'");
	while ($row_date = mysqli_fetch_assoc($check_date)) {
						echo $row_date['topic_name'];
					}
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