<!DOCTYPE html>
<html lang="en">
<head>
<title>About Us</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body bgcolor="red">

<div class="super_container">

  <!-- Header -->

  <header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
      <!-- Logo -->
      <div class="logo_container">
        <div class="logo">
          
          <span>
          EzDoc</span>
        </div>
      </div>

      <!-- Main Navigation -->
      <nav class="main_nav_container">
        <div class="main_nav">
          <ul class="main_nav_list">
            <li class="main_nav_item"><a href="index.php">home</a></li>
            <li class="main_nav_item"><a href="#">about us</a></li>
            <li class="main_nav_item"><a href="index.php#search">Hospitals</a></li>
            <?php 
              session_start();
              
              if($_SESSION['role'] == "shopkeeper"){

                echo '<li class="main_nav_item"><a href="shopadd.php">Register shop</a></li>';
              }

              if($_SESSION['username'] != null){

                echo '<li class="main_nav_item"><a href="changepassword.php">Change Password</a></li>';
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
          <li class="menu_item menu_mm"><a href="#">About us</a></li>
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
      <h1>About Us</h1>
    </div>
  </div>

  <!-- Contact -->

  <div class="contact" style="background-color: #ECBBAD;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          
          <!-- Contact Form -->
          <div class="contact_form">
            <div class="contact_title">What is EzDoc?</div>

            
              <p>
                EzDoc is an open discussion portal where people with health issues can ask either personal queries to any doctor or can post their problems online so that others give suggestions regarding that problem. 
              </p>            
          </div>

          <div class="contact_title">Why EzDoc?</div>

            
              <p style="font-size: 150%;">
                Consulting doctors even for a cough or cold is very expensive now a days. Also no one likes to visit any medical store and stand in queue to get your medicines in time. So EzDoc is an open discussion portal made to overcome these problems in some way by providing people an online portal where they can discuss about their issues by saving their time as well as their money. This portal provides an online medicine store with home delivery services. Also a chat portal is maintained where users can personally live chat with online available doctors for personal issues. This portal also provides service of tracing nearby hospitals or medical stores around any given city.
              </p>
          </div>


          <!-- <div class="contact_title"></div>

            
              <p style="font-size: 150%;">
                Consulting doctors even for a cough or cold is very expensive now a days. Also no one likes to visit any medical store and stand in queue to get your medicines in time. So EzDoc is an open discussion portal made to overcome these problems in some way by providing people an online portal where they can discuss about their issues by saving their time as well as their money. This portal provides an online medicine store with home delivery services. Also a chat portal is maintained where users can personally live chat with online available doctors for personal issues.
              </p> -->
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
                <li class="footer_list_item"><a href="#">About Us</a></li>
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
