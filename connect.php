<?php
	$connect = mysqli_connect("localhost","root","") or die("unable to connect to database");
	mysqli_select_db($connect,"forum") or die("unable to connect to database");
?>