<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>



<!-- Mixins-->
<!-- Pen Title-->
<br><br>
<div class="pen-title">
  FORGOT PASSWORD FORM
</div>

<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Enter Username</h1>
    <form action="forgot.php" method="post">
      <div class="input-container">
        <input type="text" name="username" required="required"/>
        <label for="#{label}">Username</label>
        <div class="bar"></div>
      </div>
      <div class="container1 input-container" style="height: 0px;">
        <font style="font-weight: 100;font-size: 30px;">
          <input type="radio" name="role" value="user" style="height: 10px;position: absolute;left: 50px;top: 5px" required="*">USER<br><br>
          <input type="radio" name="role" value="shopkeeper" style="height: 10px;position: absolute;left: 50px;top: 60px;" required="*">SHOPKEEPER
        </font>
      </div>
      <br><br><br><br><br>
      <div class="button-container">
        <button name="sub2" value="shopkeeper"><span>Go</span></button>
      </div>
    </form>
    <br>
  </div>
</div>

 



   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>


</body>

</html>
