<?php

	//if($_SERVER["REQUEST_METHOD"] == "POST"){
		$con = mysqli_connect("localhost","root","root","newsy") or die(mysqli_error($con));
		session_start();
		session_unset();
		session_destroy();
		header("Location: http://localhost/csp203_project/main/index.php");
?>