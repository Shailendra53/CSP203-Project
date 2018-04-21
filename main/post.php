<?php
	if(isset($_POST["submit"])){
		// Checking For Blank Fields..
		if($_POST["Name"]==""||$_POST["email"]==""||$_POST["message"]==""){
			echo "Fill All Fields..";
		}
		else{
		// Check if the "Sender's Email" input field is filled out
			$email=$_POST['email'];
			// Sanitize E-mail Address
			$email =filter_var($email, FILTER_SANITIZE_EMAIL);
			// Validate E-mail Address
			$email= filter_var($email, FILTER_VALIDATE_EMAIL);
			if (!$email){
			echo "Invalid Sender's Email";
			}
			else{
				$subject = "Feedback";
				$message = $_POST['message']."\r\n";
				echo $email;
				//$headers = 'From:'. $email . "\r\n"; // Sender's Email
				 $headers = 'From: '.$email."\r\n".
				 'Reply-To: '.$email."\r\n" .
				 'X-Mailer: PHP/' . phpversion();
				//$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender
				// Message lines should not exceed 70 characters (PHP rule), so wrap it
				//$message = wordwrap($message, 70);
				// Send Mail By PHP Mail Function
				if(mail('2016csb1059@iitrpr.ac.in', $subject, $message)){

					echo "Your mail has been sent successfuly ! Thank you for your feedback";
				}
				else{
					echo "mail not sent";
				}
				
			}
		}
	}
?>