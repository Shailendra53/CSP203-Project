<?php 

	session_start();
	$_SESSION['shopname'] = $_GET['shopname'];
	$_SESSION['shopid'] = $_GET['shopid'];
	$_SESSION['address'] = $_GET['shopadd'];
	header('location:shophome.php'); 

?>