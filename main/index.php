<!DOCTYPE html>
<html lang="en">
<head>
<title>EzDoc</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="styles/map.css">
</head>
<body>

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
						<li class="main_nav_item"><a href="#">home</a></li>
						<li class="main_nav_item"><a href="aboutus.php">about us</a></li>
						<li class="main_nav_item"><a href="#search">Hospitals</a></li>
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
      							<input type="submit" name="logout" value="'.$_SESSION['username'].' [LOG OUT]">
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
          <li class="menu_item menu_mm"><a href="#">Home</a></li>
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

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/background.jpg);"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"> We are here to HELP!</h1>
						</div>
					</div>
				</div>
				
				
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Your Health First!</h1>
						</div>
					</div>
				</div>

			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
		</div>

	</div>



	<?php 
		session_start();
		if($_SESSION['username'] != null){

			echo '<div class="hero_boxes">
					<div class="hero_boxes_inner">
						<div class="container">
							<div class="row">

								<div class="col-lg-2 hero_box_col">
									
								</div>

								<div class="col-lg-4 hero_box_col">
									<div class="hero_box d-flex flex-row align-items-center justify-content-start">
										
										<div class="hero_box_content">
											<h2 class="hero_box_title">Online medical store</h2>
										</div>
									</div>
								</div>

								<div class="col-lg-4 hero_box_col">
									<div class="hero_box d-flex flex-row align-items-center justify-content-start">
										
										<div class="hero_box_content">
											<h2 class="hero_box_title" style="padding-left:23%">Chat Portal</h2>
										</div>
									</div>
								</div>

								<div class="col-lg-2 hero_box_col">
									
								</div>

							</div>
						</div>
					</div>
				</div>';



		}
	?>
	

	<!-- Popular -->

	<div class="popular page_section" id="search">
		<div class="testimonials_background_container prlx_parent">
			<div class="prlx" style="background-image:url(images/back.jpg);-webkit-filter: brightness(0.87);
    filter: brightness(0.87); background-repeat: no-repeat;background-size: cover;background-position: center; "></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1 style="font-size: 450%; color: ">Search Hospital Nearby</h1>

					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Register -->
	

	<div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				

				<div class="col-lg-12 nopadding" style="height: 500px;">
					
					<!-- Search -->

					
						<input id="pac-input" class="controls" type="text" placeholder="Search Box" value="Hospital near " style="height: 30px;margin-top: 10px">
						<div id="map"></div>
					

				</div>
			</div>
		</div>
	</div>

	<script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAX7m7Rbjt-5zx8RYyONeHSghwxh689xiw &libraries=places&callback=initAutocomplete"
         async defer></script>

	

	<!-- Testimonials -->

	<div class="testimonials page_section" id="aboutus">
		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/medicine.jpg)"></div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Contributors</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					
					<div class="testimonials_slider_container">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">
							
							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/Mukesh_Saini.jpg" alt="">
										</div>
										<div class="testimonial_name">Dr. Mukesh Saini</div>
									</div>
									<p class="testimonials_text">Assistant Professor in CSE Department at IIT Ropar.</p>
									
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/s.jpg" alt="NO IMAGE">
										</div>
										<div class="testimonial_name">Shailendra Kumar Gupta</div>
									</div>
									<p class="testimonials_text">Student in CSE Department at IIT Ropar.</p>
									
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/a.jpg" alt="NO IMAGE">
										</div>
										<div class="testimonial_name">Abhinav Jindal</div>
									</div>
									<p class="testimonials_text">Student in CSE Department at IIT Ropar.</p>
									
								</div>
							</div>

							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/m.jpg" alt="NO IMAGE">
										</div>
										<div class="testimonial_name">Meghana Batchu</div>
									</div>
									<p class="testimonials_text">Student in CSE Department at IIT Ropar.</p>
									
								</div>
							</div>

							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/am.jpg" alt="NO IMAGE">
										</div>
										<div class="testimonial_name">Aluvala Mamatha</div>
									</div>
									<p class="testimonials_text">Student in CSE Department at IIT Ropar.</p>
									
								</div>
							</div>

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

			            <p>EzDoc is an open discussion portal where people with health issues can ask either personal queries to any doctor or can post their problems online so that others give suggestions regarding that problem. </p>

					</div>

					<div class="col-lg-2 footer_col"></div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-2 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Home</a></li>
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