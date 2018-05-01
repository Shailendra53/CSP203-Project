<?php
	session_start();
	require('connect.php');
	if (@$_SESSION["username"]) {
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
					<a href="index.html" class="logo">EzDoc-QnA</a>
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
	<section>
				<div class="inner">
					<div class="table-wrapper">
<?php echo '<table >' ?>
	<thead>
	<tr>
		<!--<td width="80px;" style="text-align: center;"><span>ID</span></td>-->
		<th style="text-align: center;" >Question</th>
		<th >Author</th>
		<th>Date</th>
	</tr>
	</thead>
	<tbody>


<?php	


date_default_timezone_set('UTC');
	$topic_name = @$_POST['topic_name'];
	$content = @$_POST['content'];
	$date = date("Y-m-d",time());

	if (isset($_POST['submit'])) {
		if ($query = mysqli_query($connect,"INSERT INTO topics(`topic_id`,`topic_name`,`topic_content`,`author`,`date`) VALUES ('','".$topic_name."','".$content."','".$_SESSION['username']."','".$date."')")) {
			#echo "Posted successfully";
		}
		else{
			echo "unable to post";
		}

	}

	$check = mysqli_query($connect,"SELECT * FROM topics");
	if (mysqli_num_rows($check)!= 0) {
		while ($row = mysqli_fetch_assoc($check)) {
			$id = $row['topic_id'];
			$author = $row['author'];
			echo "<tr>";
			#echo '<td width="80px;" style="text-align: center;">'.$row["topic_id"].'</td>';
			echo '<td style="text-align: center;"><a href="topic.php?id='.$id.'">'.$row["topic_name"].'</a></td>';
			$check_user = mysqli_query($connect,"SELECT * FROM users WHERE username='".$row['author']."'");
			while ($row_user = mysqli_fetch_assoc($check_user)) {
				$userid = $row_user['id'];
			}
			echo '<td > <a href="members.php">'.$row["author"].'</a></td>';
			$get_date = $row['date'];
			echo '<td ><a href="index.php?id=$get_date">'.$row["date"].'</td>';
		}
	}
	else{
		echo "No topics found.";
	}
	echo " </tbody><tfoot>
										<tr>
											<td colspan='2'></td>
										</tr>
									</tfoot></table></div></section>";
	if (@$_GET['date']) {
		$check_date = mysqli_query($connect,"SELECT * FROM topics WHERE date ='".$_GET['date']."'");
	while ($row_date = mysqli_fetch_assoc($check_date)) {
						echo $row_date['topic_name'];
					}
	}



?>

<form action="index.php" method="post">
<center>
	Topic name: <br/> <input type="text" name="topic_name" style="width:400px;"><br/>
	Content: <br/> <textarea style="width: 400px; min-height: 300px;" name="content"></textarea><br/>
	<input type="submit" name="submit" value="post">
</center>
</form>
</div>
</section>
<section id="footer">
				<div class="inner">
					<header>
						<h2>Get in Touch</h2>
					</header>
					<form method="post" action="#">
						<div class="field half first">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6"></textarea>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="alt" /></li>
						</ul>
					</form>
					
				</div>
			</section>
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