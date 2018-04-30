<?php
	define('DB_SERVER', 'localhost');
   define('DB_category', 'root');
   define('DB_address', 'root');
   define('DB_DATABASE', 'ezdoc');
   $connection = mysqli_connect(DB_SERVER,DB_category,DB_address,DB_DATABASE);

	if(isset($_POST['addmedicine'])){
	$count=0;
	$shopidErr = $categoryErr = $medicineErr = $priceErr = $quantityErr = "";
	$shopid = $category=$medicine = $price = $quantity = $description = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["category"])) {
		$categoryErr = "category is required\n";
		echo "category";
	  } else {
		$category = test_input($_POST["category"]);
		// check if medicine only contains letters and whitespace and underscore
		
			$count=$count+1;
		
	  }

	  if (empty($_POST["medicine"])) {
		$medicineErr = "medicine is required";
		echo "medicine";
	  } else {
		$medicine = test_input($_POST["medicine"]);
		// check if medicine only contains letters and whitespace
		
			$count=$count+1;
		
	  }

	  if (empty($_POST["shopid"])) {
		$shopidErr = "shopid is required";
		echo "shopid";
	  } else {
		$shopid = test_input($_POST["shopid"]);
		// check if medicine only contains letters and whitespace
		
			$count=$count+1;
		
	  }

	  if (empty($_POST["price"])) {
		$medicineErr = "price is required";
		echo "add";
	  } else {
		$medicine = test_input($_POST["price"]);
		// check if medicine only contains letters and whitespace
		
			$count=$count+1;
		
	  }

	  
	 
		
	  if (empty($_POST["quantity"])) {
		$quantityErr = "";
		echo "mob";
	  } else {
		$quantity = test_input($_POST["quantity"]);
		// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		if (!preg_match("/^[0-9]+$/",$quantity)) {
		  $quantityErr = "Invalid quantity no\n"; 
		}
		else{
			$count=$count+1;
		}
	  }

	  $description = $_POST['description'];
	}

if($count==5){

		$category = $_POST["category"];
		$medicine = $_POST["medicine"];
		$price = $_POST["price"];
		$quantity = $_POST["quantity"];
		$shopid = $_POST["shopid"];
		$sql = "select * from category where category_name = '$category'";

		$answer = $connection->query($sql);
		$categoryid = "";
		if ($answer->num_rows > 0) {
				
				$row = mysqli_fetch_assoc($answer);
			
				$categoryid = $row['category_id'];
			/*echo "";
			session_start();
			$_SESSION['error']="category : ".$category." is already taken<br>";
		    header('location:http://localhost/csp203_project/Login/index.php');*/
		}
		else{

			$sqli = "insert into category(category_name) values('$category');";
			
			if($connection->query($sqli)){
				$categoryid = $connection->insert_id;

				
			}
		   	else{
		   		echo "problem in insertion1";
		   		
		   	}
		}

		$sql = "select * from medicine where medicine_name = '$medicine'";

		$answer = $connection->query($sql);
		$medicineid = 0;
		if ($answer->num_rows > 0) {
				
				$row = mysqli_fetch_assoc($answer);
			
				$medicineid = $row['medicine_id'];
			/*echo "";
			session_start();
			$_SESSION['error']="category : ".$category." is already taken<br>";
		    header('location:http://localhost/csp203_project/Login/index.php');*/
		}
		else{
			echo $categoryid;
			$sqli = "insert into medicine(medicine_name,category_id,price,description) values('$medicine',$categoryid,$price,'$description');";
			
			if($connection->query($sqli)){
				$medicineid = $connection->insert_id;
				
			}
		   	else{
		   		echo "problem in insertion2";
		   		
		   	}
		}

		$sql = "select * from shop_medicine where shop_id = '$shopid' and medicine_id = $medicineid";

		$answer = $connection->query($sql);

		if ($answer->num_rows > 0) {
				
				$row = mysqli_fetch_assoc($answer);
			
				$medicineid = $row['medicine_id'];
				$quan = $row['quantity'];
				$sqlcomm = "update shop_medicine set quantity = $quan + $quantity where shop_id = '$shopid' and medicine_id = $medicineid";

				if($connection->query($sqlcomm)){
					echo "UPDATED";
					session_start();
					$_SESSION['medicine']=$medicine;
					$_SESSION['message'] = "Medicine ".$medicine." is Updated in Shop Id: ".$shopid;
				    header('location:http://localhost/csp203_project/main/medicineadd.php');
				}
			   	else{
			   		echo "problem in Update";
			   		
			   	}
			// echo "";
			// session_start();
			// $_SESSION['error']="category : ".$category." is already taken<br>";
		 //    header('location:http://localhost/csp203_project/Login/index.php');
		}else
		{

			$sqli = "insert into shop_medicine(shop_id,medicine_id,quantity) values('$shopid',$medicineid,$quantity);";
			if($connection->query($sqli)){
				echo "INSERTED";
				session_start();
				$_SESSION['medicine']=$medicine;
				$_SESSION['message'] = "Medicine ".$medicine." is Updated in Shop Id: ".$shopid;
			    header('location:http://localhost/csp203_project/main/medicineadd.php');
			}
		   	else{
		   		echo "problem in insertion3";
		   		session_start();
				$_SESSION['medicine']=$medicine;
				$_SESSION['message'] = "Problem in Insertion: Wrong Shop Id.";
			    header('location:http://localhost/csp203_project/main/medicineadd.php');
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