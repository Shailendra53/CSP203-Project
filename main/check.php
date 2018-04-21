<?php

	define('DB_SERVER', 'localhost');
   define('DB_shopid', 'root');
   define('DB_address', 'root');
   define('DB_DATABASE', 'ezdoc');
   $connection = mysqli_connect(DB_SERVER,DB_shopid,DB_address,DB_DATABASE);
	if(isset($_POST['addshop'])){
	$count=0;
	$shopidErr = $nameErr = $useridErr = $mobileErr = "";
	$shopid=$name = $userid = $mobile = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["shopid"])) {
		$shopidErr = "shopid is required\n";
		echo "shopid";
	  } else {
		$shopid = test_input($_POST["shopid"]);
		// check if name only contains letters and whitespace and underscore
		
			$count=$count+1;
		
	  }

	  if (empty($_POST["name"])) {
		$nameErr = "Name is required";
		echo "name";
	  } else {
		$name = test_input($_POST["name"]);
		// check if name only contains letters and whitespace
		
			$count=$count+1;
		
	  }

	  if (empty($_POST["address"])) {
		$nameErr = "address is required";
		echo "add";
	  } else {
		$name = test_input($_POST["address"]);
		// check if name only contains letters and whitespace
		
			$count=$count+1;
		
	  }

	  if (empty($_POST["city"])) {
		$nameErr = "city is required";
		echo "city";
	  } else {
		$name = test_input($_POST["city"]);
		// check if name only contains letters and whitespace
		
			$count=$count+1;
		
	  }
	  
	 
		
	  if (empty($_POST["mobile"])) {
		$mobileErr = "";
		echo "mob";
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

if($count==5){


		session_start();
		$shopid = $_POST["shopid"];
		$shopname = $_POST["name"];
		$address = $_POST["address"];
		$userid = $_SESSION["userid"];
		$mobile = $_POST["mobile"];
		$city = $_POST["city"];
		$sql = "select * from shop where shop_id = '$shopid'";

		$answer = $connection->query($sql);

		if ($answer->num_rows > 0) {

			echo "shopid : ".$shopid." is already taken<br>";
			echo "";
			session_start();
			$_SESSION['message']="Shopid : ".$shopid." is already taken<br>";
		    header('location:http://localhost/csp203_project/main/shopadd.php');
		} 
		else {
			
			$sqli = "select city_id from city where city_name = '$city'";

			$answer = $connection -> query($sqli);

			if ($answer->num_rows > 0) {

				$row = mysqli_fetch_assoc($answer);
			
				$cityid = $row['city_id'];
			
		}else{
			$sqli = "insert into city(city_name) values('$city');";
			
			if($connection->query($sqli)){
				$cityid = $connection->insert_id;
				
			}
		   	else{
		   		echo "problem in insertion";
		   		
		   	}
		} 

			//mysql_insert_id()
			$sqli = "insert into shop(shop_id,shop_name,address,city_id,mobile,userid) values('$shopid','$shopname','$address',$cityid,$mobile,$userid);";
			if($connection->query($sqli)){
				echo "User $shopid inserted";
				session_start();
				$_SESSION['shopid']=$shopid;
				$_SESSION['message'] = "Shop with Shopid = ".$shopid." is Registered and will be verified soon.";
				echo " shopid : ".$row_data["shopid"]."<br>";
			    header('location:http://localhost/csp203_project/main/shopadd.php');
			}
		   	else{
		   		echo "problem in inserfgghdftion";
		   		session_start();
				$_SESSION['error']="Registration failed";
			    header('location:http://localhost/csp203_project/main/shopadd.php');
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