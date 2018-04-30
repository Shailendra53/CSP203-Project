<?php

    define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'ezdoc');
   $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $email = $pass = "";

    session_start();
   echo $_SESSION['username'];
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_SESSION['username'];
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
      //echo "here";

      if(($_POST['role']) == "user"){

         $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
         $result = mysqli_query($connection,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         
         $count = mysqli_num_rows($result);
         
         // If result matched $myusername and $mypassword, table row must be 1 row
         
         if($count == 1) {
            //echo $myusername;
            $newpass = $_POST['newpass'];
            $sqlupdate = "update users set password = '$newpass' where username = '$myusername' and password = '$mypassword'";

                if($connection->query($sqlupdate)){
                    echo "UPDATED user";
                    $_SESSION['message'] = "Password is updated.";
                    header('location:changepassword.php');
                }
                else{
                    echo "Problem";
                    $_SESSION['message'] = "Password is wrong.";
                    header('location:changepassword.php');
                }

         }else {
            

               echo "Problem";
                    $_SESSION['message'] = "Password is wrong.";
                    header('location:changepassword.php');
            
            
         }
      }
      else if(($_POST['role']) == "shopkeeper"){

         $sql = "SELECT * FROM shopkeepers WHERE username = '$myusername' and password = '$mypassword'";
         $result = mysqli_query($connection,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         
         $count = mysqli_num_rows($result);
         
         // If result matched $myusername and $mypassword, table row must be 1 row
         
         if($count == 1) {
            //echo $myusername;
            $newpass = $_POST['newpass'];
            $sqlupdate = "update shopkeepers set password = '$newpass' where username = '$myusername' and password = '$mypassword'";

                if($connection->query($sqlupdate)){
                    echo "UPDATED shop";
                    $_SESSION['message'] = "Password is updated.";
                    header('location:changepassword.php');
                }
                else{
                    echo "Problem";
                    $_SESSION['message'] = "Password is wrong.";
                    header('location:changepassword.php');
                }

         }else {
            

               echo "Problem";
                    $_SESSION['message'] = "Password is wrong.";
                    header('location:changepassword.php');
            
            
         }
      }
      
   }


?>
