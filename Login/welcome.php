<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
	   	
      <h1>Welcome <?php session_start(); echo $_SESSION['username']; ?></h1> 
      <h2>
      	<form method="post" action="logout.php">
      		<input type="submit" name="logout" value="LOG OUT">
      	</form>
      </h2>
   </body>
   
</html>