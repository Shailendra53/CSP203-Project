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
				<div class="inner">


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
			echo "<h6>By <a href='profile.php?id=$userid'>".$row['author']."</a> Date:".$row['date']."</h6>";
			echo "<p>".$row['topic_content']."</p>";

			
			}
			date_default_timezone_set('UTC');
			$topic_name = @$_POST['topic_name'];
			$content = @$_POST['comment'];
			$date = date("Y-m-d",time());
			$like = 0;
	        $unlike =0;

			if (isset($_POST['submit'])) {

				if ($query = mysqli_query($connect,"INSERT INTO comments(`id`,`comment_content`,`topic_id`,`comment_author`,`date`,`likes`,`unlikes`) VALUES ('','".$content."','".$topicid."','".$_SESSION['username']."','".$date."','".$like."','".$unlike."')")) {
			echo "Posted successfully";
		}
				else{
					echo "unable to post";
				}
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
				$id=$rowc['id'];
			echo "<blockquote>".$rowc['comment_content']."</br></br><ul class='actions'>
								<li><a id='formoid$id' href='like.php?id=$id&topic=$topicid' class='button'>Like</a>" .$rowc['likes']. "</li>
								<li><a id='formoid$id' href='unlike.php?id=$id&topic=$topicid' class='button special'>Unlike</a>".$rowc['unlikes']."</li>
							</ul><h6>By <a href='profile.php?id=$userid' >".$rowc['comment_author']."</a>. Date:".$rowc['date']."</h6>
							</blockquote>";?>
							<script type='text/javascript'>
							$(<?php echo "'formoid#$id'"?>).on('click', function(event) {
								console.log($(<?php echo "'formoid#$id'"?>).val())
							  event.preventDefault();
							  var $form = $( this ),
								url = $form.attr( 'href' );
							  $.ajax({
							  	url: url,
							  	type: "POST",
							  	data: { "quantity" : $(<?php echo "'#medicineId$a'"?>).val()},
							  	success: function(data){
							  			//alert('added to cart');
							  			location.reload();
							  			console.log(data)
							  		},
							  	error: function(error){
							  		alert('failed');
							  		console.log(error)
							  	}
							  });
							  
							});
						</script><?php

			}
			
		}
		echo '<form action="topic.php?id='.$topicid.'" method="post">';
			echo " Answer: <br/> <textarea style='width: 1200px; min-height: 300px;' name='comment'></textarea><br/>
			<input type='submit' name='submit' value='post'>";
			echo "</form>";


	}
	else{
		echo "No topic on this.";
	}
?>
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