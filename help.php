<html>
<head>
<title>help</title>
</head>
<body>
<?php
session_start();
$value = $_SESSION['username'];
echo "sdfsdf".$value;
?>

<form>
	<input type="submit" name="logout" value="LOG OUT">
</form>
</body>
</html>
