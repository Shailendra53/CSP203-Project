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
$check = mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
	$rows = mysql_num_rows($check);
	while ($row = mysql_fetch_assoc($check)) {
		$username = $row['username'];
		$id = $row['id'];
		$email = $row['email'];
		$date = $row['date'];
		$replies = $row['replies'];
		$topics = $row['topics'];
		$profile_pic = $row['profile_pic'];
	}
	echo "<img src='$profile_pic' width = '100' height = '100' />";
	?><br/>
	Username: <?php echo $username; ?> <br/>
	ID: <?php echo $id; ?> <br/>
	Email: <?php echo $email; ?> <br/>
	Date Registered: <?php echo $date; ?> <br/>
	<a href="account.php?action=chanp">Change password</a><br/>
	<a href="account.php?action=chanpic">Change profile picture</a>

</body>
</html>

<?php	
	if (@$_GET['action'] == 'logout') {
		session_destroy();
		header("Location: login.php");
	}

	if (@$_GET['action'] == 'chanpic') {
		echo '<form action="account.php?action=chanpic" method="POST" enctype ="multipart/form-data">
			<center><br/>
			Available file extension: <b> .png .jpg .jpeg </b><br/><br/>
			<input type="file" name="image"><br/>
<input type="submit" name="change_pic" value="change"><br/>';
		if (isset($_POST['change_pic'])) {
			$errors = array();
			$allowed_ext = array('png','jpg','jpeg');
			$file_name = $_FILES['image']['name'];
			$file_ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
			$file_size = $_FILES['image']['size'];
			$file_tmp = $_FILES['image']['tmp_name'];

			if (in_array($file_ext,$allowed_ext) == false) {
				$errors[] = 'This file is not allowed.';
			}

			if ($file_size > 3333333) {
				$errors[] = 'File must be less than 3mb';
			}

			if (empty($errors)) {
				move_uploaded_file($file_tmp, 'images/'.$file_name);
				$image_up = 'images/'.$file_name;
				if ($query = mysql_query("UPDATE users SET  profile_pic = '".$image_up."' WHERE username='".$_SESSION['username']."'")) {
					echo "updated successfully";
				}
			}
			else{
				foreach ($errors as $error) {
					echo $error,'<br/>';
				}
			}

		}
		echo '</form>';
	}

	if (@$_GET['action'] == 'chanp') {
		echo '<form action="account.php?action=chanp" method="POST"></form>
Current password: <input type="text" name="curr_pass"><br/>
New password: <input type="text" name="new_pass"><br/>
Re-type password: <input type="text" name="re_pass"><br/>
<input type="submit" name="change_pass" value="Change password">';
	
	$curr_pass = @$_POST['curr_pass'];
	$new_pass = @$_POST['new_pass'];
	$re_pass = @$_POST['re_pass'];
	
	if (isset($_POST['change_pass'])) {
		$check = mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
		$rows = mysql_num_rows($check);
		while ($row = mysql_fetch_assoc($check)) {
			$get_pass = $row['password'];
		}
		if ($curr_pass == $get_pass) {
			if ($new_pass == $re_pass) {
				if ($query = mysql_query("UPDATE users SET password='`.sha1($new_pass).`' WHERE username = '".$_SESSION['username']."'")) {
					echo "password changed successfully.";
				}
			}
			else{
				echo "passwords didn't match";
			}
		}
		else{
			echo "Type in the correct password.";
		}
	}

	}

	
}
?>