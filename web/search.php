<?php include 'php/connect.php';?>
<!DOCTYPE html>
<html>
<head>
<!--php include-->
<title>EzDoc</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<!--<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!--shailendra-->
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 >
					<a href="index.php"><b>T<br>H<br>E</b>EzDoc<span>The Best Online Medical Store</span></a>
				</h1>
			</div>
				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>					

					</div> 
					</nav>
					 <div class="cart" >
						<a href="cart.php"><img src="images/cart.png" width=30% height=30%></a>
						<!--span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span-->
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>



  <!---->
  <!--search form-->
  <div class="search-form">
		<form style="background-color:black" action="search.php" method="post">
			<input type="text" placeholder="Search..." name="Search">
			<input type="submit" value=" " >
		</form>
</div>	

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <center><img class="first-slide" src="images/co1.jpg" alt="First slide" height=400px></center>
        </div>
        <div class="item">
         <center> <img class="second-slide " src="images/co2.jpg" alt="Second slide" height=400px></center>         
        </div>
        <div class="item">
          <center><img class="third-slide " src="images/co3.jpg" alt="Third slide" height=400px></center>
        </div>
      </div>
    
    </div><!-- /.carousel -->


<?php
if(isset($_POST['Search']) || isset($_SESSION['searchtext'])){
	if(isset($_POST['Search'])){
	$searchText=$_POST['Search'];
	}
	else if(isset($_SESSION['searchtext'])){
		$searchText=$_SESSION['searchtext'];
	}
	$result=mysqli_query($conn,"SELECT * FROM medicine where medicine_name LIKE '%$searchText%';");
	$_SESSION['searchtext']=$searchText;
	$n=mysqli_num_rows($result);
		echo"<div class='product'>
		<div class='container'>
			<div class='spec '>
				<h3>Products</h3>
				<div class='ser-t'>
					<b></b>
					<span><i></i></span>
					<b class='line'></b>
				</div>
			</div>
				<div class=' con-w3l agileinf'>";
				for($a=0;$a<$n;$a++){
					$row = mysqli_fetch_assoc($result);
					$medicineName=$row["medicine_name"];
					$medicineId=$row["medicine_id"];
					$price=$row["price"];
					$actualprice=1.1*$price;
						echo"<form id='formoid".$a."' method='post' action='php/cartAction.php?categoryID=$categoryID&action=add&medicineId=$medicineId'>
							<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='#myModal1' class='offer-img'>
										<img src='images/tablets.jpg' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>$medicineName</h6>							
										</div>
										<div class='mid-2'>
											<p ><label>$actualprice</label><em class='item_price'>$price</em></p>
											  <div class='block'>
												<!--div class='starbox small ghosting'> </div-->
											</div>
											<div class='clearfix'></div>
										</div>
											<div><input id='medicineId$a' type='text' name='quantity' value='1' size='2' /><input type='submit' value='Add to cart' class='btnAddAction' /></div></form>
											<div class='add'>
										   <!--button class='btn btn-danger my-cart-btn my-cart-b' data-id='$medicineId' data-name=$medicineName data-summary='summary 24' data-price='$price' data-quantity='1' data-image='images/tablets.jpg'>Add to Cart</button-->
										</div>
									</div>
								</div>
							</div>";?>
							
							<script type='text/javascript'>
							$(<?php echo "'#formoid$a'"?>).submit(function(event) {
								console.log($(<?php echo "'#medicineId$a'"?>).val())
							  event.preventDefault();
							  var $form = $( this ),
								url = $form.attr( 'action' );
							  $.ajax({
							  	url: url,
							  	type: "POST",
							  	data: { "quantity" : $(<?php echo "'#medicineId$a'"?>).val()},
							  	success: function(data){
							  			alert('added to cart');
							  			console.log(data)
							  		},
							  	error: function(error){
							  		alert('failed');
							  		console.log(error)
							  	}
							  });

							  
							});
						</script>
							<?php
							}
							
					echo"<div class='clearfix'></div>
						 </div>
		</div>
	</div>";

}

?>

<!-- category names-->
<?php
$result=mysqli_query($conn,'SELECT * FROM category;');
echo "<div class='kic-top '>
			<div class='container '>
				<div class='kic '>
					<h3>All Categories</h3>
				</div>";
$n=mysqli_num_rows($result);
for($a=0;$a<$n;$a=$a+1){ 
	$row = mysqli_fetch_assoc($result);
	$category=$row["category_name"];
	$categoryID=$row["category_id"];
	echo"<div class='col-md-4 kic-top1'>
			<a href='kitchen.php?categoryID=$categoryID'>
				<!--img src='images/spray.jpg' class='img-responsive' alt=''-->
				<h6>$category</h6>
			</a>
		</div>";
		}
			echo"</div>
	</div>";
?>

<br/><br/><br/>


<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
<?php
if(isset($_POST['Search']) || isset($_SESSION['searchtext'])){
	if(isset($_POST['Search'])){
	$searchText=$_POST['Search'];
	}
	else if(isset($_SESSION['searchtext'])){
		$searchText=$_SESSION['searchtext'];
	}
	$result=mysqli_query($conn,"SELECT * FROM medicine where medicine_name LIKE '%$searchText%';");
	$_SESSION['searchtext']=$searchText;
	$n=mysqli_num_rows($result);
for($a=0;$a<$n;$a++){
	$row = mysqli_fetch_assoc($result);
	$medicineName=$row["medicine_name"];
	$medicineId=$row["medicine_id"];
	$price=$row["price"];
	$desc=$row["description"];
	$actualprice=1.1*$price;
	$model="myModal".$a;
			echo"<div class='modal fade' id='$model' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='images/tablets.jpg' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>$medicineName</h3>
									<div class='price_single'>
									  <span class='reducedfrom '><del>$actualprice</del> $price</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'>$desc</p>
									 <div class='add-to'>
										   <!--button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='$medicineId' data-name='$medicineName' data-summary='summary 24' data-price='$price' data-quantity='1' data-image='images/tablets.jpg'>Add to Cart</button-->
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
}

}

?>


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
								<li class="footer_list_item"><a href="../main/index.php">Home</a></li>
								<li class="footer_list_item"><a href="../main/aboutus.php">About Us</a></li>
								<li class="footer_list_item"><a href="#">QnA Portal</a></li>
								<li class="footer_list_item"><a href="../main/contact.php">Contact</a></li>
								<?php 
									session_start();
									
									if($_SESSION['username'] != null){

										echo '<li class="footer_list_item"><form method="post" action="../main/logout.php">			
				      							<input type="submit" name="logout" value="'.$_SESSION['username'].' [LOG OUT]">
				      						</form></li>';
									}
									else{

										echo '<li class="footer_list_item"><a href="http://localhost/csp203_project/Login/index.php">Login/Sign Up</a></li>';
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

		</div>
	</footer>
				
</body>
</html>
