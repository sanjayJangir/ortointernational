<?php
session_start();
// error_reporting(0);
//  include('header.php');
//  include('inc/con.php');
include('./includes/dbsmain.inc.php');
include('./includes/config.inc.php');


?>



<html lang="en">






<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="Jthemes" />
	<meta name="description" content="" />
	<meta name="keywords" content="Responsive, Jthemes, One Page, Landing, Business, Coaching, Consulting, Creative, Immigration, Visa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- SITE TITLE -->
	<?php
	$admin = db_query("select * from  tbl_admin  where admin_id='1'");

	while ($row3 = mysqli_fetch_array($admin)) { ?>

		<title><?php echo $row3['admin_company_name']; ?></title>

		<!-- FAVICON AND TOUCH ICONS  -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="apple-touch-icon.html" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900&amp;display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- FONT ICONS -->
		<link href="../../../../../use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet" crossorigin="anonymous">
		<link href="css/flaticon.css" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="css/menu.css" rel="stylesheet">
		<link id="effect" href="css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
		<link href="css/tweenmax.css" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">
		<link href="css/owl.carousel.min.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css" rel="stylesheet">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


		<!-- TEMPLATE CSS -->
		<link href="css/red.css" rel="stylesheet">

		<!-- STYLE SWITCHER CSS -->
		<link href="css/aqua.css" rel="alternate stylesheet" title="aqua-theme">
		<link href="css/blue.css" rel="alternate stylesheet" title="blue-theme">
		<link href="css/darkred.css" rel="alternate stylesheet" title="darkred-theme">
		<link href="css/green.css" rel="alternate stylesheet" title="green-theme">
		<link href="css/olive.css" rel="alternate stylesheet" title="olive-theme">
		<link href="css/orange.css" rel="alternate stylesheet" title="orange-theme">
		<link href="css/salmon.css" rel="alternate stylesheet" title="salmon-theme">
		<link href="css/teal.css" rel="alternate stylesheet" title="teal-theme">
		<link href="css/yellow.css" rel="alternate stylesheet" title="yellow-theme">

		<!-- RESPONSIVE CSS -->
		<link href="css/responsive.css" rel="stylesheet">

</head>




<body>




	<!-- PRELOADER SPINNER
		============================================= -->
	<div id="loader-wrapper">
		<div id="loader">
			<div class="cssload-box-loading"></div>
		</div>
	</div>




	<!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">




		<!-- HEADER
			============================================= -->
		<header id="header-2" class="header white-menu">
			<div class="header-wrapper">
				<?php
				$logo = db_query("select header_logo from tbl_header where header_status='Active'");
				while ($row2 = mysqli_fetch_array($logo)) {
				?>

					<!-- MOBILE HEADER -->
					<div class="wsmobileheader clearfix">
						<a hre="index.php" id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
						<span class="smllogo">
							<a hre="index.php"></a> <img src="header_files/<?php echo $row2['header_logo'] ?>" alt="<?php echo $row2['header_image_title'] ?>" class="img-fluid" style="height:60px; width:60px;"></a>
						</span>

						<a href="index.php" class="callusbtn"><i class="fas fa-phone"></i></a>
					</div>


					<!-- HEADER STRIP -->
					<div class="headtoppart bg-white clearfix">
						<div class="headerwp clearfix">

							<!-- Infotmation -->
							<div class="headertopleft">
								<div class="header-info clearfix">
									<span class="txt-400"><i class="fas fa-map-marker-alt"></i><?php echo $row3['admin_address']; ?></span>
								</div>
							</div>

							<!-- Contacts -->
							<div class="headertopright header-contacts">
								<a href="tel:123456789" class="callusbtn txt-400"><i class="fas fa-phone"></i><?php echo $row3['admin_mobile']; ?></a>
								<a href="tel:123456789" class="callusbtn b-right txt-400">&#8194;<?php echo $row3['admin_phone']; ?></a>
								<a href="mailto:<?php echo $row3['admin_email']; ?>" class="txt-400"><i class="far fa-envelope-open"></i><?php echo $row3['admin_email']; ?></a>

							</div>

						</div>
					</div> <!-- END HEADER STRIP -->


					<!-- NAVIGATION MENU -->
					<div class="wsmainfull menu clearfix">
						<div class="wsmainwp clearfix">


							<!-- LOGO IMAGE -->
							<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 90 pixels) -->
							<div class="desktoplogo"><a href="index.php" class="logo-black"> <img src="header_files/<?php echo $row2['header_logo'] ?>" alt="<?php echo $row2['header_image_title'] ?>" class="img-fluid" height="40px;" width="70px;"></a></div>
							<div class="desktoplogo"><a href="index.php" class="logo-white"> <img src="header_files/<?php echo $row2['header_logo'] ?>" alt="<?php echo $row2['header_image_title'] ?>" class="img-fluid" height="40px;" width="70px;"></a></div>

					<?php }
			} ?>
					<!-- MAIN MENU -->
					<nav class="wsmenu clearfix blue-header" style="margin-left:-10px;">
						<ul class="wsmenu-list">


							<!-- DROPDOWN MENU -->
							<!-- END DROPDOWN MENU -->


							<!-- PAGES -->
							<li aria-haspopup="true"><a href="index.php">home</a>
							<li aria-haspopup="true"><a href="about.php">About <span class="wsarrow"></span></a>
								<ul class="sub-menu">
									<li><a href="ourteam.php">Our Team</a></li>
									<li><a href="communityevents.php">Community Events</a></li>
								</ul>
							</li>

							<li aria-haspopup="true"><a href="review.php">review</a>

							</li>
							<!-- MEGAMENU -->
							<li aria-haspopup="true"><a href="services.php">SERVICES<span class="wsarrow"></span></a>
								<ul class="sub-menu">

									<li><a href="business.php">Business</a></li>

									<li><a href="StartUpVisa.php">Start Up Visa</a></li>
									<li><a href="OwnerOperator.php">Owner Operator LMIA</a></li>

									<li><a href="pnb.php">Provincial Nominee Program (PNP)</a></li>
									<li><a href="Visit.php">Visit</a></li>
									<li><a href="Work.php">Work</a></li>
									<li><a href="FamilySponsorship.php">Family Sponsorship</a></li>
									<li><a href="Study.php">Study</a></li>
									<li><a href="Immigrate.php">Immigrate</a></li>
									<li><a href="Settlement-Services.php">Settlement Services</a></li>
								</ul>
							</li> <!-- END MEGAMENU -->


							<!-- SIMPLE NAVIGATION LINK -->
							<li class="nl-simple" aria-haspopup="true"><a href="#">Employers<span class="wsarrow"></span>
								</a>
								<ul class="sub-menu">
									<li><a href="Commitment.php">Commitment</a></li>
									<li><a href="employers-settlement-service.php">Settlement Service</a></li>
									<li><a href="recruitment.php">Recruitment</a></li>
									<li><a href="Immigration.php">Immigration</a></li>
								</ul>
							</li>
							<li aria-haspopup="true"><a href="blog-listing.php">Blog</a>
							<li aria-haspopup="true"><a href="contact.php">Contact
									<!-- LAST NAVIGATION LINK -->
							<li class="nl-simple" aria-haspopup="true">
								<a href="book-appointment.php" style="margin-top:-15px; margin-left:40px;" class="header-btn btn-primary tra-black-hover last-link">Book Appointment</a>
							</li>


						</ul>
					</nav> <!-- END MAIN MENU -->

						</div>
					</div> <!-- END NAVIGATION MENU -->


			</div> <!-- End header-wrapper -->
		</header> <!-- END HEADER -->