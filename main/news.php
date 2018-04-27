<?php 

	session_start();
	$_SESSION['shopname'] = $_GET['shopname'];
	header('location:http://localhost/csp203_project/main/shophome.php'); 

?>