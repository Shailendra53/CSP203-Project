<!DOCTYPE html>
<html lang="en">
<head>
<title>Course - Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body bgcolor="red">

<div class="super_container">

  <!-- Header -->

  <header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
      <!-- Logo -->
      <div class="logo_container">
        <div class="logo">
          
          <span>EzDoc</span>
        </div>
      </div>

      <!-- Main Navigation -->
      <nav class="main_nav_container">
        <div class="main_nav">
          <ul class="main_nav_list">
            <li class="main_nav_item"><a href="index.php">home</a></li>
            <li class="main_nav_item"><a href="aboutus.php">about us</a></li>
            <li class="main_nav_item"><a href="index.php#search">Hospitals</a></li>
            <?php 
              session_start();
              
              if($_SESSION['role'] == "shopkeeper"){

                echo '<li class="main_nav_item"><a href="shopadd.php">Register shop</a></li>';
              }

              if($_SESSION['username'] != null){

                echo '<li class="main_nav_item"><a href="#">QnA Portal</a></li>';
              }
            ?>
            
            <li class="main_nav_item"><a href="contact.php">contact</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="header_side d-flex flex-row justify-content-center align-items-center">
      
      <span> 

        <?php 
          session_start();
          
          if($_SESSION['username'] != null){

            echo '<form method="post" action="logout.php">      
                    <input type="submit" name="logout" value="'.$_SESSION['username'].' [LOG OUT]" class="inp">
                  </form>';
          }
          else{

            echo '<i class="fas fa-user"></i>&#160&#160
                <a href="../Login/index.php">Login/Sign Up</a>';
          }
        ?>


      </span>

    </div>

    <!-- Hamburger -->
    <div class="hamburger_container">
      <i class="fas fa-bars trans_200"></i>
    </div>

  </header>
  
  <!-- Menu -->
  <div class="menu_container menu_mm">

    <!-- Menu Close Button -->
    <div class="menu_close_container">
      <div class="menu_close"></div>
    </div>

    <!-- Menu Items -->
    <div class="menu_inner menu_mm">
      <div class="menu menu_mm">
        <ul class="menu_list menu_mm">
          <li class="menu_item menu_mm"><a href="index.php">Home</a></li>
          <li class="menu_item menu_mm"><a href="aboutus.php">About us</a></li>
          <li class="menu_item menu_mm"><a href="index.php#search">Hospitals</a></li>
          <?php 
              session_start();
              
              if($_SESSION['role'] == "shopkeeper"){

                echo '<li class="menu_item menu_mm"><a href="shopadd.php">Register shop</a></li>';
              }

              if($_SESSION['username'] != null){

                echo '<li class="menu_item menu_mm"><a href="#">QnA Portal</a></li>';
              }
            ?>
          <li class="menu_item menu_mm"><a href="contact.php">Contact</a></li>
          <?php 
          session_start();
          
          if($_SESSION['username'] != null){

            echo '<li class="menu_item menu_mm"><form method="post" action="logout.php">      
                    <input type="submit" name="logout" value="'.$_SESSION['username'].'(LOG OUT)" class="check">
                  </form></li>';
          }
          else{

            echo '<li class="menu_item menu_mm">
                <a href="../Login/index.php">Login/Sign Up</a></li>';
          }
        ?>
        </ul>

        <!-- Menu Social -->
        
        <div class="menu_social_container menu_mm">
          <ul class="menu_social menu_mm">
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
          </ul>
        </div>

        <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
      </div>

    </div>

  </div>
  
  <!-- Home -->

  <div class="home">
    <div class="home_background_container prlx_parent">
      <div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
    </div>
    
    <div class="home_content">
      <h1>Your Shop</h1>
    </div>
  </div>

  <!-- Contact -->

  <div class="contact" style="background-color: #ECBBAD;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          
          <!-- Contact Form -->
          <div class="contact_form">
            
            <?php 

                if($_SESSION['role'] == "shopkeeper"){

                define('DB_SERVER', 'localhost');
                define('DB_category', 'root');
                define('DB_address', 'root');
                define('DB_DATABASE', 'ezdoc');
                $connection = mysqli_connect(DB_SERVER,DB_category,DB_address,DB_DATABASE);

                $sql = "select * from category";

                $answer = $connection->query($sql);

                echo '<div class="contact_title"><font color="#6F0219">Shop ID : </font>'.$_SESSION['shopid'].'</div>';
                echo '<div class="contact_title"><font color="#6F0219">Shop Name : </font>'.$_SESSION['shopname'].'</div>';
                echo '<div class="contact_title"><font color="#6F0219">Shop Address : </font>'.$_SESSION['address'].'</div><br><br>';

                if ($answer->num_rows > 0) {
                      
                      //$row = mysqli_fetch_assoc($answer);
                      
                      while ($row = mysqli_fetch_assoc($answer)) {
                        $count = $count + 1;
                        $check = $check." ".$row['shop_id']." ".$row['shop_name'];
                        echo '<button class="accordion" style="font-size: 120%;font-weight: bolder;color:black">'.$row['category_name'].'</button>';
                      

                $sql_med = "select * from category inner join medicine on category.category_id = medicine.category_id inner join shop_medicine on medicine.medicine_id = shop_medicine.medicine_id where category_name = '".$row['category_name']."';";

                $answer_med = $connection->query($sql_med);

                if ($answer_med->num_rows > 0) {
                      
                      //$row = mysqli_fetch_assoc($answer);
                      $count = 0;
                      echo '<div class="panel"><br>
                                <table class="table" style="color: black">';

                      echo '   <tr>
                                    <th>Sr No.</th>
                                    <th>Medicine Name</th>
                                    <th>Quantity</th>
                                  </tr>
                                ';

                      while ($row = mysqli_fetch_assoc($answer_med)) {
                        $count = $count + 1;
                        
                        
                        echo '   <tr>
                                    <td>'.$count.'</td>
                                    <td>'.$row['medicine_name'].'</td>
                                    <td>'.$row['quantity'].'</td>
                                  </tr>
                                ';
                      }
                      echo '  </table>
                            </div>';
                    }
                        
                   }
                  } 
                  
                
                  

                echo '<div class="contact_form_container">
                
                  <form action="medicineadd.php" method="post">
                      
                      <div class="button-container">
                        <button name="submit" class="contact_send_btn trans_200"><span>Update Medicines</span></button>
                      </div>

                    </form>
                </div>';


              }
              else{

                echo '<h1 style="color:#6F0219;">You Don\'t Have Authentication to this page</h1>';
              }

              
                 

            ?>


              <script>
                  var acc = document.getElementsByClassName("accordion");
                  var i;

                  for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                      this.classList.toggle("active");
                      var panel = this.nextElementSibling;
                      if (panel.style.maxHeight){
                        panel.style.maxHeight = null;
                      } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                      } 
                    });
                  }
              </script>
          </div>
            
        </div>

        <div class="col-lg-4">
          <div class="about">
            <div class="about_title">Get in Touch</div>
            

            <div class="contact_info">
              <ul>
                <li class="contact_info_item">
                  <div class="contact_info_icon">
                    <i class="fas fa-map-marker-alt" style="font-size: 170%; color: #C60F09"></i>
                  </div>
                  IIT Ropar
                </li>
                <li class="contact_info_item">
                  <div class="contact_info_icon">
                    <i class="fas fa-mobile-alt" style="font-size: 180%; color: #C60F09"></i>
                  </div>
                  +91 172 2233564
                </li>
                <li class="contact_info_item">
                  <div class="contact_info_icon">
                    <i class="fas fa-envelope" style="font-size: 140%; color: #C60F09"></i>
                  </div>hello@company.com
                </li>
              </ul>
            </div>

          </div>
        </div>

      </div>


    </div>
  </div>

  <!-- Footer -->


  <footer class="footer" id="footer">
    <div class="container">
      
      <!-- Newsletter -->

      
      <!-- Footer Content -->

      <div class="footer_content">
        <div class="row">

          <!-- Footer Column - About -->
          <div class="col-lg-5 footer_col">

            <div class="logo_container">
                    <div class="logo">
                      
                      <span>EzDoc</span>
                    </div>
                  </div>

                  <p class="footp">EzDoc is an open discussion portal where people with health issues can ask either personal queries to any doctor or can post their problems online so that others give suggestions regarding that problem. </p>

          </div>

          <div class="col-lg-2 footer_col"></div>

          <!-- Footer Column - Menu -->

          <div class="col-lg-2 footer_col">
            <div class="footer_column_title">Menu</div>
            <div class="footer_column_content">
              <ul>
                <li class="footer_list_item"><a href="index.php">Home</a></li>
                <li class="footer_list_item"><a href="aboutus.php">About Us</a></li>
                <li class="footer_list_item"><a href="#">QnA Portal</a></li>
                <li class="footer_list_item"><a href="contact.php">Contact</a></li>
                <?php 
                  session_start();
                  
                  if($_SESSION['username'] != null){

                    echo '<li class="footer_list_item"><form method="post" action="logout.php">     
                            <input type="submit" name="logout" value="'.$_SESSION['username'].' [LOG OUT]">
                          </form></li>';
                  }
                  else{

                    echo '<li class="footer_list_item"><a href="../Login/index.php">Login/Sign Up</a></li>';
                  }
                ?>
              </ul>
            </div>
          </div>

          <!-- Footer Column - Usefull Links -->

          <!-- <div class="col-lg-3 footer_col">
            <div class="footer_column_title">Usefull Links</div>
            <div class="footer_column_content">
              <ul>
                <li class="footer_list_item"><a href="#">Testimonials</a></li>
                <li class="footer_list_item"><a href="#">FAQ</a></li>
                <li class="footer_list_item"><a href="#">Community</a></li>
                <li class="footer_list_item"><a href="#">Campus Pictures</a></li>
                <li class="footer_list_item"><a href="#">Tuitions</a></li>
              </ul>
            </div>
          </div> -->

          <!-- Footer Column - Contact -->

          <div class="col-lg-3 footer_col">
            <div class="footer_column_title">Contact</div>
            <div class="footer_column_content">
              <ul>
                <li class="footer_contact_item">
                  <div class="footer_contact_icon">
                    <img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
                  </div>
                  IIT Ropar
                </li>
                <li class="footer_contact_item">
                  <div class="footer_contact_icon">
                    <img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
                  </div>
                  +91 172 2233564
                </li>
                <li class="footer_contact_item">
                  <div class="footer_contact_icon">
                    <img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
                  </div>helpservices@ezdoc.com
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>

      <!-- Footer Copyright -->

      <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
        <div class="footer_copyright">
          <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
        </div>
        <div class="footer_social ml-sm-auto">
          <ul class="menu_social">
            <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
          </ul>
        </div>
      </div>

    </div>
  </footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>











<!-- <!DOCTYPE html>
<html>
<head>
  <title>Check</title>
</head>
<body>
  
</body>
</html>
 -->