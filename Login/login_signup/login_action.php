<?php
	

	include('config.php');

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection,$_POST['username']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
      //echo "here";
      $sql = "SELECT * FROM users WHERE username = '$myusername'";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 && $row['password'] == $mypassword) {
         //echo $myusername;
         $_SESSION['username'] = $myusername;

         header("location:http://localhost/csp203_project/main/index.php");

      }else {
         
         if($count == 1){

            $error = "Your Password is invalid";
            $_SESSION['error'] = $error;
            echo $error;
            header('location:http://localhost/csp203_project/Login/index.php');
         }
         else{

            $error = "Username doesn't exists";
            $_SESSION['error'] = $error;
            echo $error;
            header('location:http://localhost/csp203_project/Login/index.php');
         }
         
      }
   }

?>