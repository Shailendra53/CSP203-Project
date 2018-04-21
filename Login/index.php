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
<div class="pen-title">
  LOGIN FORM
</div>

<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form action="http://localhost/csp203_project/Login/login_signup/login_action.php" method="post">
      <div class="input-container">
        <input type="text" name="username" required="required"/>
        <label for="#{label}">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button name="sub1"><span>Users Go</span></button>
      </div>
      <br>
      <div class="button-container">
        <button name="sub2"><span>Shopkeepers Go</span></button>
      </div>
      
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form action="http://localhost/csp203_project/Login/login_signup/signup.php" method="post">
      <div class="input-container">
        <input type="text" name="username" required="*">
        <label for="#{label}">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="name" required="*">
        <label for="#{label}">Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password" required="*">
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="email" required="*">
        <label for="#{label}">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="mobile" required="*">
        <label for="#{label}">Mobile</label>
        <div class="bar"></div>
      </div>
      <div class="container1 input-container" style="height: 0px;">
        <font style="font-weight: 100;font-size: 30px;color: white">
          <input type="radio" name="role" value="user" style="height: 10px;position: absolute;left: 10px;top: 5px" required="*">USER<br><br>
          <input type="radio" name="role" value="shopkeeper" style="height: 10px;position: absolute;left: 10px;top: 60px;" required="*">SHOPKEEPER
        </font>
      </div>
      <br><br><br><br>
      <div class="button-container">
        <button name="signup"><span>Next</span></button>
      </div>

    </form>
  </div>
</div>

 


<div>
    <h2 style="text-align: center;font-weight: bolder;font-family: cursive;font-size: 200%"><?php session_start(); echo $_SESSION['error']; session_destroy(); ?></h2>
</div> 
   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>


</body>

</html>
