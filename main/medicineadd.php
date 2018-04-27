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
            <li class="main_nav_item"><a href="http://localhost/csp203_project/main/index.php#search">Hospitals</a></li>
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
                    <input type="submit" name="logout" value="'.$_SESSION['username'].'(LOG OUT)">
                  </form>';
          }
          else{

            echo '<img src="https://image.flaticon.com/icons/svg/51/51256.svg" alt="">
                <a href="http://localhost/csp203_project/Login/index.php">Login/Sign Up</a>';
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
          <li class="menu_item menu_mm"><a href="index.html">Home</a></li>
          <li class="menu_item menu_mm"><a href="#">About us</a></li>
          <li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
          <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
          <li class="menu_item menu_mm"><a href="news.html">News</a></li>
          <li class="menu_item menu_mm"><a href="#">Contact</a></li>
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
      <h1>Add Medicines to your Store</h1>
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
                session_start();
                echo '<div class="contact_title" style="color: #6F0219;">'.$_SESSION['message'].'</div>';
            ?>
            
            <div class="contact_title">Add your shop to this site</div>

            <?php 

                if($_SESSION['role'] == "shopkeeper"){

                echo '<div class="contact_form_container">
                  <form action="http://localhost/csp203_project/main/medicine.php" method="post">
                      <div class="input-container">
                        <input type="text" name="category" required="*" class="input_field contact_form_name" placeholder="Category">
                        <!-- <label for="#{label}">shopid</label> -->
                        <div class="bar"></div>
                      </div>
                      <div class="input-container">
                        <input type="text" name="medicine" required="*" class="input_field contact_form_name" placeholder="Medicine Name">
                        <!-- <label for="#{label}">shopname</label> -->
                        <div class="bar"></div>
                      </div>
                      <div class="input-container">
                        <input type="text" name="price" required="*" class="input_field contact_form_name" placeholder="Price">
                        <!-- <label for="#{label}">address</label> -->
                        <div class="bar"></div>
                      </div>
                      <div class="input-container">
                        <input type="text" name="quantity" required="*" class="input_field contact_form_name" placeholder="Quantity">
                        <!-- <label for="#{label}">userid</label> -->
                        <div class="bar"></div>
                      </div>
                      <div class="input-container">
                        <input type="text" name="shopid" required="*" class="input_field contact_form_name" placeholder="Shop Id">
                        <!-- <label for="#{label}">Mobile</label> -->
                        <div class="bar"></div>
                      </div>
                      <div class="button-container">
                        <button name="addmedicine" class="contact_send_btn trans_200"><span>Next</span></button>
                      </div>

                    </form>
                </div>';
              }
              else{

                echo '<h1 style="color:#6F0219;">You Don\'t Have Authentication to this page</h1>';
              }
            ?>
            
          </div>
            
        </div>

        <div class="col-lg-4">
          <div class="about">
            <div class="about_title">Get in Touch</div>
            

            <div class="contact_info">
              <ul>
                <li class="contact_info_item">
                  <div class="contact_info_icon">
                    <img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
                  </div>
                  Blvd Libertad, 34 m05200 Arévalo
                </li>
                <li class="contact_info_item">
                  <div class="contact_info_icon">
                    <img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
                  </div>
                  0034 37483 2445 322
                </li>
                <li class="contact_info_item">
                  <div class="contact_info_icon">
                    <img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
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
          <div class="col-lg-3 footer_col">

            <!-- Logo -->
            <div class="logo_container">
              <div class="logo">
                
                <span>EzDoc</span>
              </div>
            </div>

            <p style="color: #a5a5a5;font-size: 110%">An open health discussion portal for all. HEll kjhdfsdhfgdjhfgshdgfshjfjhfhjsdgjhgsdjf jhkshf sfjhsdkjfsd fjsdh kj ks dhs kjsh fsjhfsdkhfkdsjhf kjdsh fksd s hkhf sdkjf h</p>

          </div>

          <!-- Footer Column - Menu -->

          <div class="col-lg-3 footer_col">
            <div class="footer_column_title">Menu</div>
            <div class="footer_column_content">
              <ul>
                <li class="footer_list_item"><a href="#">Home</a></li>
                <li class="footer_list_item"><a href="#">About Us</a></li>
                <li class="footer_list_item"><a href="courses.html">Courses</a></li>
                <li class="footer_list_item"><a href="news.html">News</a></li>
                <li class="footer_list_item"><a href="contact.html">Contact</a></li>
              </ul>
            </div>
          </div>

          <!-- Footer Column - Usefull Links -->

          <div class="col-lg-3 footer_col">
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
          </div>

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