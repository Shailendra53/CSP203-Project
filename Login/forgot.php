<?php

    include('login_signup/config.php');

    $email = $pass = "";

    session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection,$_POST['username']); 
      //echo "here";

      if(($_POST['role']) == "user"){

         $sql = "SELECT * FROM users WHERE username = '$myusername'";
         $result = mysqli_query($connection,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         
         $count = mysqli_num_rows($result);
         
         // If result matched $myusername and $mypassword, table row must be 1 row
         
         if($count == 1) {
            //echo $myusername;
            $email = $row['email'];

            $pass = rand_string(10);

            $sqlupdate = "update users set password = '$pass' where username = '$myusername'";

                if($connection->query($sqlupdate)){
                    echo "UPDATED";
                    
                    header('location:index.php');
                }
                else{
                    echo "problem in Update";
                    
                }

         }else {
            

               $error = "Username doesn't exists";
               $_SESSION['error'] = $error;
               echo $error;
               header('location:index.php');
            
            
         }
      }
      else if(($_POST['role']) == "shopkeeper"){

         $sql = "SELECT * FROM shopkeepers WHERE username = '$myusername'";
         $result = mysqli_query($connection,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         
         $count = mysqli_num_rows($result);
         
         // If result matched $myusername and $mypassword, table row must be 1 row
         
         if($count == 1) {
            //echo $myusername;
            $email = $row['email'];

            $pass = rand_string(10);

            $sqlupdate = "update shopkeepers set password = '$pass' where username = '$myusername'";

                if($connection->query($sqlupdate)){
                    echo "UPDATED";
                    
                    header('location:index.php');
                }
                else{
                    echo "problem in Update";
                    
                }

         }else {
            

               $error = "Username doesn't exists";
               $_SESSION['error'] = $error;
               echo $error;
               header('location:index.php');
            
            
         }
      }
      
   }




function rand_string( $length ) {

       $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  

       $size = strlen( $chars );

       for( $i = 0; $i < $length; $i++ ) {

              $str= $chars[ rand( 0, $size - 1 ) ];

              $pass = $pass.$str;
              echo $pass;

       }
       return $pass;
}
 //echo rand_string( 10 );






    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'abckbc321@gmail.com';                 // SMTP username
        $mail->Password = 'abckbc@123';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;  
        $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );                                  // TCP port to connect to

        //echo nl2br("Name: ".$_POST['Name']."\rEmail: ".$_POST['email']."\nMessage: ".$_POST['message']);
        //Recipients
        echo $email;
        $mail->setFrom($email);
       // $mail->addAddress('prasad23kshirsagar@gmail.com');     // Add a recipient
       // $mail->addAddress('2016csb1124@iitrpr.ac.in');     // Add a recipient
        $mail->addAddress($email);     // Add a recipient
       // $mail->addAddress('2016csb1064@iitrpr.ac.in');     // Add a recipient
       // $mail->addAddress('2016csb1053@iitrpr.ac.in');     // Add a recipient
       
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'EzDoc Notification';
        $mail->Body    = nl2br("Some body has asked for password change from your account if it is not you please change your password by logging into your account. Here is the new password for the you.\r\n\r\nYour New Password: $pass");
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        session_start();
        $_SESSION['error'] = "New password is mailed to you.";
        //header('location:index.php');
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        //header('location:index.php');
    }


?>







