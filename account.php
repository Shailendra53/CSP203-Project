<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
?>


<?php
	}
	else {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>

	<title>EzDoc-QnA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	
</head>
<body>



<header id="header">
				<div class="inner">
					<a class="logo">EzDoc-QnA</a>
					<nav id="nav">
						<a href="index.php">Discussion Forum</a>
						<a href="account.php">My account</a> 
						<a href="members.php">Members</a>
						<a href="register.php">Register</a>
						<a href="login.php">Login</a>
						<a href="index.php?action=logout"> logout</a></center>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
<section id="main">
				<div class="inner" style="text-align: center;">
<?php  

$check = mysqli_query($connect,"SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
	$rows = mysqli_num_rows($check);
	while ($row = mysqli_fetch_assoc($check)) {
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
</div></section>

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
				if ($query = mysqli_query($connect,"UPDATE users SET  profile_pic = '".$image_up."' WHERE username='".$_SESSION['username']."'")) {
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
		$check = mysqli_query($connect,"SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
		$rows = mysqli_num_rows($check);
		while ($row = mysqli_fetch_assoc($check)) {
			$get_pass = $row['password'];
		}
		if ($curr_pass == $get_pass) {
			if ($new_pass == $re_pass) {
				if ($query = mysqli_query($connect,"UPDATE users SET password='`.sha1($new_pass).`' WHERE username = '".$_SESSION['username']."'")) {
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

	

?>