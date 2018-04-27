<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      <form method="post" action="#">
         <button name="x">CLICK</button>
      </form>
      
      <?php

      
      if(isset($_POST['x'])){
         $to = "abckbc321@gmail.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:abckbc321@gmail.com \r\n";
         $header .= "Cc:hello.shailu07@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      }
         
      ?>
      
   </body>
</html>