<?php

    echo "string";
   define('DB_SERVER', 'localhost');
   define('DB_category', 'root');
   define('DB_address', 'root');
   define('DB_DATABASE', 'ezdoc');
   $connection = mysqli_connect(DB_SERVER,DB_category,DB_address,DB_DATABASE);

    echo "string";

    session_start();

    $userid = $_SESSION['userid'];
    //echo $userid;
    $sql = "select * from shop where userid = $userid";

    $answer = $connection->query($sql);

    $check = "";

    if ($answer->num_rows > 0) {
        
        //$row = mysqli_fetch_assoc($answer);
      
        while ($row = mysqli_fetch_assoc($answer)) {
          printf ("%s (%s)\n", $row['shop_id'], $row['shop_name']);
          $check = $check." ".$row['shop_id']." ".$row['shop_name'];
      }

    }



  $connection->close();
?>