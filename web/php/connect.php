<!--<?php
$servername = "localhost";
$username = "root";
$password = "abhinavjindal";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>-->

<?php
$servername = "localhost";
$username = "root";
$password = "abhinavjindal";
$dbname = "ezdoc";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>
