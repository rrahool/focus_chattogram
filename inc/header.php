<?php

	require_once 'database/db.php';
	//echo display_menu();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<?php require 'page_title.php'; ?>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="css/stuck.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/touchTouch.css">
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/topbar.css">
		<link rel="stylesheet" href="css/dropdown.css">
		<link rel="stylesheet" href="css/newsletter.css">
		<link rel="stylesheet" href="css/contact_form.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.1.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/tmStickUp.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/touchTouch.jquery.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/sForm.js"></script>
		<script src="js/camera.js"></script>
		

		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->
		<script>
		$(document).ready(function(){
			jQuery('#camera_wrap').camera({
				loader: false,
				pagination: false ,
				minHeight: '200',
				thumbnails: false,
				height: '39,0625%',
				caption: true,
				navigation: true,
				fx: 'mosaic'
			});
			var owl = $("#owl");
			owl.owlCarousel({
				items : 7, //10 items above 1000px browser width
				itemsDesktop : [995,5], //5 items between 1000px and 901px
				itemsDesktopSmall : [767, 3], // betweem 900px and 601px
				itemsTablet: [700, 3], //2 items between 600 and 0
				itemsMobile : [479, 2], // itemsMobile disabled - inherit from itemsTablet option
				navigation : true,
			});
			$().UItoTop({ easingType: 'easeOutQuart' });
			$('#stuck_container').tmStickUp({});
			$('.gallery a.gal_item').touchTouch();
		});
		</script>
		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->
	</head>

	<body class="page1" id="top">

	<!--==============================topbar=================================-->	
	<div class="topnav">
		<div class="date-container">
			<?php
				include('bnTime.php');
				//include('hjTime.php');
				$time = time();
				$Bdate = BDdate($time);
				//$Hdate = HJdate($time);

				echo '<i class="fas fa-calendar-alt"></i> ';

				echo date(" D - M d, Y ");

				// echo $Bdate." বঙ্গাব্দ";

				//echo $Hdate." হিজরি";

			?>
		</div>

			<div class="font-container">
				<a href="https:/facebook.com">
					<img src="images/social_logo/fb_round.png" alt="fb" width="35" height="35">				
				</a>

				<a href="https:/twitter.com">
					<img src="images/social_logo/twitter_round.png" alt="twitter" width="35" height="35">
				</a>

				<a href="https:/instagram.com">
					<img src="images/social_logo/instagram_round.png" alt="instagram" width="35" height="35">
				</a>

				<a href="https:/gplus.com">
					<img src="images/social_logo/gplus_round.png" alt="google-plus" width="35" height="35">
				</a>

				<a href="https:/youtube.com">
					<img src="images/social_logo/youtube_round.png" alt="youtube" width="35" height="35">
				</a>

			</div>
	</div>


	<!--<div class="topnav">
			<div class="time-container">
					<a class="active" href="#home">Home</a>
					<a href="#about">About</a>
					<a href="#contact">Contact</a>
			</div>
			<div class="font-container">-->

					<!--<img src="images/fb_round.png" alt="fb" height="10px" width="10px">-->

					<!--<i class="fab fa-facebook fa-lg circle-icon" style="background: #3B5998;"></i>
					<i class="fab fa-twitter fa-lg circle-icon" style="background: #55ACEE;"></i>
	</div>-->
	
<!--==============================header=================================-->
	
		<header>
			<div id="stuck_container">
				<div class="container">
					<div class="row">
						<div class="grid_12">
							<h1>
								<a href="index.html">
									<!--<img src="images/logo.png" alt="Your Happy Family">-->
								</a>
							</h1>
							<div class="menu_block">
								<nav class="horizontal-nav full-width horizontalNav-notprocessed">
									<ul class="sf-menu">
										<li><a href="index.php">Home</a></li>
										<li>
											<div class="dropdown">
												<a href="#">
													Images
													<div class="dropdown-content">
														<a href="/category/cat_1.php">পর্যটন</a>
														<a href="/category/cat_2.php">ফটো ফিচার</a>
														<a href="/category/cat_3.php">ব্যবসা বানিজ্য</a>
														<a href="/category/cat_4.php">ঐতিহ্য</a>
														<a href="/category/cat_5.php">শিল্প ও সংস্কৃতি</a>
														<a href="/category/cat_6.php">সাম্প্রতিক ছবি</a>
													</div>
												</a>
											</div>
										</li>
										<li><a href="blog_image.php">Photographers</a></li>
										<li><a href="contact_us.php">Contact Us</a></li>
									</ul>
								</nav>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>