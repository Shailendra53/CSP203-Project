<?php
$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
$db_select=mysqli_select_db($con,'chatbox');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($connection));
}
$result1 = mysqli_query($con,"SELECT * FROM logs ORDER by id DESC");

while($extract = mysqli_fetch_array($result1)){
	echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
}
?>