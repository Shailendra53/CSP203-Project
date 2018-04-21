<?php

	include('config.php');
	if(isset($_POST['signup'])){
	$count=0;

	$usernameErr = $nameErr = $emailErr = $mobileErr = "";
	$username=$name = $email = $mobile = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["username"])) {
		$usernameErr = "Username is required\n";
	  } else {
		$username = test_input($_POST["username"]);
		// check if name only contains letters and whitespace and underscore
		if (!preg_match("/^[a-zA-Z0-9_ ]*$/",$username)) {
		  $usernameErr = "Only letters,underscore,numbers and white space allowed\n"; 
		}
		else{
			$count=$count+1;
		}
	  }

	  if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	  } else {
		$name = test_input($_POST["name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		  $nameErr = "Only letters and white space allowed\n"; 
		}
		else{
			$count=$count+1;
		}
	  }
	  
	  if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	  } else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format\n"; 
		}
		else{
			$count=$count+1;
		}
	  }
		
	  if (empty($_POST["mobile"])) {
		$mobileErr = "";
	  } else {
		$mobile = test_input($_POST["mobile"]);
		// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		if (!preg_match("/^[0-9]+$/",$mobile)) {
		  $mobileErr = "Invalid MOBILE no\n"; 
		}
		else{
			$count=$count+1;
		}
	  }
	}

if($count==4){


	if($_POST['role'] == "user"){


		$username = $_POST["username"];
		$name = $_POST["name"];
		$pass = $_POST["password"];
		$email = $_POST["email"];
		$mobile = $_POST["mobile"];
		
		$sql = "select * from users where username = '$username'";

		$answer = $connection->query($sql);

		if ($answer->num_rows > 0) {

			echo "Username : ".$username." is already taken<br>";
			session_start();
			$_SESSION['error']="Username : ".$username." is already taken<br>";
		    header('location:http://localhost/csp203_project/Login/index.php');
		} 
		else {
			$sqli = "insert into users(username,name,password,email,mobile) values('$username','$name','$pass','$email',$mobile);";
			if($connection->query($sqli)){
				echo "User $username inserted";
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['userid'] = $connection->insert_id;
				echo " Username : ".$row_data["username"]."<br>";
			    header('location:http://localhost/csp203_project/main/index.php');
			}
		   	else{
		   		session_start();
				$_SESSION['error']="Signup Failed: Try Again";
			    header('location:http://localhost/csp203_project/Login/index.php');
		   	}
		    
		    
			
		}
	}
	else if($_POST['role'] == "shopkeeper"){

		$username = $_POST["username"];
		$name = $_POST["name"];
		$pass = $_POST["password"];
		$email = $_POST["email"];
		$mobile = $_POST["mobile"];
		
		$sql = "select * from shopkeepers where username = '$username'";

		$answer = $connection->query($sql);

		if ($answer->num_rows > 0) {

			echo "Username : ".$username." is already taken<br>";
			session_start();
			$_SESSION['error']="Username : ".$username." is already taken<br>";
		    header('location:http://localhost/csp203_project/Login/index.php');
		} 
		else {
			$sqli = "insert into shopkeepers(username,name,password,email,mobile) values('$username','$name','$pass','$email',$mobile);";
			if($connection->query($sqli)){
				echo "User $username inserted";
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['userid'] = $connection->insert_id;
				echo " Username : ".$row_data["username"]."<br>";
			    header('location:http://localhost/csp203_project/main/index.php');
			}
		   	else{
		   		session_start();
				$_SESSION['error']="Signup Failed: Try Again";
			    header('location:http://localhost/csp203_project/Login/index.php');
		   	}
		    
		    
			
		}
	}

		
		
}

}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$connection->close();
?>