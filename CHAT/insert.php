<?php
$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];

$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$db_select=mysqli_select_db($con,'chatbox');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($connection));
}

mysqli_query($con,"INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");
//$con = new PDO('mysql:host=localhost;dbname=chatbox;charset=utf8mb4', 'username', '');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//$stmt = $db->prepare("INSERT INTO logs(username,msg) VALUES(:uname,:msg,)");
//$stmt->execute(array(':uname' => $username, ':msg' => $msg));
//$affected_rows = $stmt->rowCount();

$result1 = mysqli_query($con,"SELECT * FROM logs ORDER by id DESC");
//$result = mysql_query("SELECT * FROM logs", $link) or die(mysql_error($link));

/*function getData($con) {
   $stmt = $con->query("SELECT * FROM table");
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 
//then much later
try {
   getData($con);
} catch(PDOException $ex) {
   //handle me.
}*/


while($extract = mysqli_fetch_array($result1)){
	echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['msg'] . "</span><br>";
}
?>