<?php
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
    $email = $_POST['email'];
    $mail->setFrom($email);
   // $mail->addAddress('prasad23kshirsagar@gmail.com');     // Add a recipient
   // $mail->addAddress('2016csb1124@iitrpr.ac.in');     // Add a recipient
    $mail->addAddress('abckbc321@gmail.com');     // Add a recipient
   // $mail->addAddress('2016csb1064@iitrpr.ac.in');     // Add a recipient
   // $mail->addAddress('2016csb1053@iitrpr.ac.in');     // Add a recipient
   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Feedback';
    $mail->Body    = nl2br("Name: ".$_POST['Name']."\rEmail: ".$_POST['email']."\nMessage: ".$_POST['message']);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    session_start();
    $_SESSION['mes'] = "Feedback Submitted!!!";
    header('location:http://localhost/csp203_project/main/contact.php');
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    header('location:http://localhost/csp203_project/main/contact.php');
}


?>







