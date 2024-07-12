<?php include("inc/header.php"); ?>



<!-- INNER PAGE WRAPPER
			============================================= -->
<div class="inner-page-wrapper">


	<?php
	$id = $_GET['id'];
	$blog = db_query("select * from  tbl_blogs where blog_id=$id and blog_status='Active' ");

	while ($row = mysqli_fetch_array($blog)) {
		$desc = strip_tags($row['blog_description']);
		$desc = (strlen($desc) > 105) ? substr($desc, 0, 105) . '..' : $desc; ?>


		<!-- BREADCRUMB
				============================================= -->
		<div id="breadcrumb" class="bg-darkblue division mt-15">
			<div class="container">
				<div class="row">
					<div class="col">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb white-color">
								<li class="breadcrumb-item"><a href="index.php">&#91; Home &#93;</a></li>
								<li class="breadcrumb-item"><a href="blog-listing.php">All Posts</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $row['blog_title'] ?></li>
							</ol>
						</nav>
					</div>
				</div> <!-- End row -->
			</div> <!-- End container -->
		</div> <!-- END BREADCRUMB -->




		<!-- SINGLE POST
				============================================= -->
		<section id="single-post" class="wide-80 blog-page-section division">
			<div class="container">
				<div class="row">


					<!-- POST CONTENT -->
					<div class="col-lg-8">
						<div class="single-blog-post pr-15">

							<!-- BLOG POST IMAGE -->
							<div class="blog-post-img mb-30">
								<img class="img-fluid" src="blog/<?php echo $row['blog_image_name']; ?>" alt="blog-post-image" />
							</div>

							<!-- Post Data -->
							<p class="post-meta"> <?php echo $row['blog_add_date'];
													echo $row['blog_add_time'] ?> <span>by-admin</span></p>

							<!-- Title -->
							<h4 class="h4-lg deepblue-color mb-30"><?php echo $row['blog_title']; ?></h4>

							<!-- POST TEXT -->
							<div class="sblog-post-txt">

								<!-- Text -->
								<p><?php echo $row['blog_description']; ?>
								</p>
							<?php } ?>




							</div>
						</div>
					</div>
				</div>
		</section>




		<!-- FOOTER-1
			============================================= -->
		<footer id="footer-1" class="bg-blue-map wide-40 footer division">
			<div class="container white-color">


				<!-- FOOTER CONTENT -->
				<div class="row">


					<!-- FOOTER INFO -->
					<div class="col-xl-3">
						<div class="footer-info mb-40">

							<!-- Footer Logo -->
							<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 420 x 100 pixels) -->
							<img src="images/logo-white.png" width="210" height="50" alt="footer-logo">

							<!-- Text -->
							<p class="p-sm mt-25">Aliquam orci a nullam tempor undo sapien donec gravida an enim ipsum porta
								justo velna auctor and congue magna laoreet an augue sapien
							</p>

						</div>
					</div>


					<!-- FOOTER CONTACTS -->
					<div class="col-lg-4 col-xl-3">
						<div class="footer-box mb-40">

							<!-- Title -->
							<h5 class="h5-md">Contact Details</h5>

							<!-- Address -->
							<p class="p-sm">121 King Street, Melbourne,</p>
							<p class="p-sm">Victoria 3000 Australia</p>

							<!-- Phone -->
							<p class="p-sm mt-20">Phone: +12 9 8765 4321</p>

							<!-- Email -->
							<p class="p-sm foo-email">Email: <a href="mailto:yourdomain@mail.com">hello@demo.com</a></p>

							<!-- Working Hours -->
							<p class="p-sm mt-20">Mon-Fri: 9:00AM - 6:30PM</p>
							<p class="p-sm">Saturday: 8:30AM - 3:30PM</p>
							<p class="p-sm">Sunday: Closed</p>

						</div>
					</div>


					<!-- FOOTER LINKS -->
					<div class="col-lg-3 col-xl-3">
						<div class="footer-links mb-40">

							<!-- Title -->
							<h5 class="h5-md">Useful Links</h5>

							<!-- Footer Links -->
							<ul class="foo-links clearfix">
								<li><a href="#">About ImmiEx</a></li>
								<li><a href="#">Visa Information</a></li>
								<li><a href="#">Immigration FAQ</a></li>
								<li><a href="#">Immigration Assistance</a></li>
								<li><a href="#">EmmiEx Testimonials</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Terms and Conditions</a></li>
							</ul>

						</div>
					</div>


					<!-- FOOTER NEWSLETTER FORM -->
					<div class="col-lg-5 col-xl-3">
						<div class="footer-form mb-20">

							<!-- Title -->
							<h5 class="h5-md">Stay Informed</h5>

							<!-- Text -->
							<p class="p-sm">Subscribe to our newsletters to get the latest news and helps</p>

							<!-- Newsletter Form Input -->
							<form class="newsletter-form">

								<div class="input-group">
									<input type="email" class="form-control" placeholder="Your email address" required id="s-email">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary tra-white-hover">Subscribe</button>
									</span>
								</div>

								<!-- Newsletter Form Notification -->
								<label for="s-email" class="form-notification"></label>

							</form>

						</div>
					</div>


				</div> <!-- END FOOTER CONTENT -->


				<!-- BOTTOM FOOTER -->
				<div class="bottom-footer">
					<div class="row d-flex align-items-center">


						<!-- FOOTER COPYRIGHT -->
						<div class="col-lg-6">
							<p class="footer-copyright">&copy; Copyright <span>ImmiEx 2019</span>. All Rights Reserved</p>
						</div>


						<!-- FOOTER SOCIALS LINKS -->
						<div class="col-lg-6 text-right">
							<ul class="foo-socials text-center clearfix">

								<li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#" class="ico-google-plus"><i class="fab fa-google-plus-g"></i></a></li>
								<li><a href="#" class="ico-tumblr"><i class="fab fa-tumblr"></i></a></li>

								<!--
									<li><a href="#" class="ico-behance"><i class="fab fa-behance"></i></a></li>	
									<li><a href="#" class="ico-dribbble"><i class="fab fa-dribbble"></i></a></li>									
									<li><a href="#" class="ico-instagram"><i class="fab fa-instagram"></i></a></li>	
									<li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a></li>
									<li><a href="#" class="ico-pinterest"><i class="fab fa-pinterest-p"></i></a></li>								
									<li><a href="#" class="ico-youtube"><i class="fab fa-youtube"></i></a></li>										
									<li><a href="#" class="ico-vk"><i class="fab fa-vk"></i></a></li>
									<li><a href="#" class="ico-yelp"><i class="fab fa-yelp"></i></a></li>
									<li><a href="#" class="ico-yahoo"><i class="fab fa-yahoo"></i></a></li>
								    -->

							</ul>
						</div>


					</div>
				</div> <!-- END BOTTOM FOOTER -->


			</div> <!-- End container -->
		</footer> <!-- END FOOTER-1 -->




</div> <!-- INNER PAGE WRAPPER -->




</div> <!-- END PAGE CONTENT -->




<!-- EXTERNAL SCRIPTS
		============================================= -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/materialize.js"></script>
<script src="js/jquery.scrollto.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/hero-request-form.js"></script>
<script src="js/hero-register-form.js"></script>
<script src="js/request-form.js"></script>
<script src="js/contact-form.js"></script>
<script src="js/comment-form.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

<!-- Custom Script -->
<script src="js/custom.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!-- [if lt IE 9]>
			<script src="js/html5shiv.js" type="text/javascript"></script>
			<script src="js/respond.min.js" type="text/javascript"></script>
		<![endif] -->

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
<!--
		<script>
			window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
			ga('create', 'UA-XXXXX-Y', 'auto');
			ga('send', 'pageview');
		</script>
		<script async src='https://www.google-analytics.com/analytics.js'></script>
		-->
<!-- End Google Analytics -->


<!-- STYLE SWITCHER
		============================================= -->
<div id="stlChanger">
	<div class="blockChanger bgChanger">
		<a href="#" class="chBut icon-xs"><span class="flaticon-292-gear"></span></a>
		<div class="chBody">

			<div class="stBlock text-center" style="margin: 30px 20px 20px 16px;">
				<p>Color Scheme</p>
				<div class="stBgs">
					<a href="javascript:chooseStyle('aqua-theme', 60)"><img src="images/color-scheme/aqua.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('salmon-theme', 60)"><img src="images/color-scheme/salmon.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('blue-theme', 60)"><img src="images/color-scheme/blue.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('red-theme', 60)"><img src="images/color-scheme/red.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('olive-theme', 60)"><img src="images/color-scheme/olive.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('darkred-theme', 60)"><img src="images/color-scheme/darkred.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('teal-theme', 60)"><img src="images/color-scheme/teal.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('yellow-theme', 60)"><img src="images/color-scheme/yellow.png" width="50" height="50" alt="" /></a>
					<a href="javascript:chooseStyle('green-theme', 60)"><img src="images/color-scheme/green.png" width="50" height="50" alt="" /></a>
				</div>
			</div>

			<div class="stBlock text-center" style="margin: 0px 32px 25px 20px;">
				<a class="btn btn-primary black-hover" href="javascript:chooseStyle('none', 60)">Reset color</a>
			</div>

			<div class="stBlock text-center" style="margin:30px 20px 30px 16px">
				<p>Choose Layout</p>
				<a class="s_1" href="demo-1.html"><img src="images/color-scheme/l-01.jpg" width="175" height="140" alt="layout-image"></a>
				<a class="s_1" href="demo-2.html"><img src="images/color-scheme/l-02.jpg" width="175" height="130" alt="layout-image"></a>
				<a class="s_1" href="demo-3.html"><img src="images/color-scheme/l-03.jpg" width="175" height="110" alt="layout-image"></a>
				<a class="s_1" href="demo-4.html"><img src="images/color-scheme/l-04.jpg" width="175" height="130" alt="layout-image"></a>
				<a class="s_1" href="demo-5.html"><img src="images/color-scheme/l-05.jpg" width="175" height="110" alt="layout-image"></a>
				<a class="s_1" href="demo-6.html"><img src="images/color-scheme/l-06.jpg" width="175" height="150" alt="layout-image"></a>
				<a class="s_1" href="demo-7.html"><img src="images/color-scheme/l-07.jpg" width="175" height="165" alt="layout-image"></a>
				<a class="s_1" href="demo-8.html"><img src="images/color-scheme/l-08.jpg" width="175" height="100" alt="layout-image"></a>
				<a class="s_1" href="demo-9.html"><img src="images/color-scheme/l-09.jpg" width="175" height="135" alt="layout-image"></a>
			</div>
		</div>
	</div>
</div> <!-- END SWITCHER -->


<script src="js/changer.js"></script>
<script defer src="js/styleswitch.js"></script>


</body>




<!-- Mirrored from jthemes.net/themes/html/immiex/files/single-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Apr 2022 19:50:03 GMT -->

</html>