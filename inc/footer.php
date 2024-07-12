				</div>
				</div>
				<div id="brands-2" class="bg-lightgrey wide-100 brands-section division">
					<div class="container">


						<!-- TEXT -->
						<div class="row">
							<div class="col-md-12 text-center mb-10">
								<h2 class="h2-xs darkblue-color">Awards and Licenses</h2>
							</div>
						</div>


						<!-- BRANDS HOLDER -->
						<div class="row brands-holder">

							<?php
							$slider = db_query("select * from  tbl_image_gallery where header_flash_status='Active'");

							while ($row = mysqli_fetch_array($slider)) { ?>
								<!-- BRAND LOGO IMAGE -->
								<div id="bl-01" class="col-sm-6 col-md-3 b-bottom b-right">
									<div class="brand-logo">
										<img class="img-fluid" src="gallery/<?php echo $row['header_flash_image_name']; ?>" alt="<?php echo $row['header_flash_title']; ?>" />
									</div>
								</div>
							<?php } ?>


						</div> <!-- END BRANDS HOLDER -->


					</div> <!-- End container -->
				</div> <!-- END BRANDS-2 -->




				<!-- BLOG-1
			============================================= -->






				<!-- CALL TO ACTION-4
			============================================= -->
				<section id="cta-4" class="bg-fixed cta-section division">
					<div class="container white-color">
						<div class="row d-flex align-items-center">
							<?php
							$admin = db_query("select * from  tbl_admin  where admin_id='1'");

							while ($row3 = mysqli_fetch_array($admin)) { ?>

								<!-- CALL TO ACTION TEXT -->
								<div class="col-md-8 col-lg-7 offset-md-4 offset-lg-5">
									<div class="cta-txt">

										<!-- Title  -->
										<h3 class="h3-xl">Consultations for prospective immigrants</h3>

										<!-- Text -->


										<!-- Button  -->
										<a href="mailto:<?php echo $row3['admin_address']; ?>" class="btn btn-md btn-tra-white primary-hover btn-arrow">
											<span>Get Consultation <i class="fas fa-arrow-right"></i></span>
										</a>
									<?php } ?>
									</div>
								</div>


						</div> <!-- End row -->
					</div> <!-- End container -->
				</section> <!-- END CALL TO ACTION-4 -->




				<!-- FOOTER-2
			============================================= -->
				<footer id="footer-2" class="wide-40 footer division">
					<div class="container">


						<!-- FOOTER CONTENT -->
						<div class="row">
							<?php
							$logo = db_query("select header_logo from tbl_header where header_status='Active'");
							while ($row2 = mysqli_fetch_array($logo)) {
							?>

								<!-- FOOTER INFO -->
								<div class="col-xl-3">
									<div class="footer-info mb-40">

										<!-- Footer Logo -->
										<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 420 x 100 pixels) -->
										<a href="index.php"><img src="header_files/<?php echo $row2['header_logo'] ?>" alt="<?php echo $row2['header_image_title'] ?>" width="80px" height="80px"></a>

										<!-- Text -->
									<?php } ?>
									<?php
									$about = db_query("select * from  tbl_site_pages where site_pages_id='47'");

									while ($row = mysqli_fetch_array($about)) { ?>
										<?php

										$desc = strip_tags($row['site_pages_description']);
										$desc = (strlen($desc) > 250) ? substr($desc, 0, 250) . '..' : $desc; ?>
										<p> <?php echo $desc ?> </p>




									<?php } ?>

									</div>
								</div>


								<!-- FOOTER CONTACTS -->
								<div class="col-lg-4 col-xl-3">
									<div class="footer-box mb-40">
										<?php
										$admin = db_query("select * from  tbl_admin  where admin_id='1'");

										while ($row3 = mysqli_fetch_array($admin)) { ?>
											<!-- Title -->
											<h5 class="h5-md darkblue-color">Contact Details</h5>

											<!-- Address -->
											<p class="p-sm"><?php echo $row3['admin_address']; ?>,</p>
											<p class="p-sm"><?php echo $row3['admin_city']; ?><?php echo $row3['admin_state']; ?><?php echo $row3['admin_country']; ?></p>

											<!-- Phone -->
											<p class="p-sm mt-20">Phone: <?php echo $row3['admin_phone']; ?>,<?php echo $row3['admin_mobile']; ?></p>

											<!-- Email -->
											<p class="p-sm foo-email">Email: <a href="mailto:<?php echo $row3['admin_email']; ?>"><?php echo $row3['admin_email']; ?></a></p>

										<?php } ?>
									</div>
								</div>


								<!-- FOOTER LINKS -->
								<div class="col-lg-4 col-xl-3">
									<div class="footer-links mb-40">

										<!-- Title -->
										<h5 class="h5-md darkblue-color">Useful Links</h5>
										<?php
										$admin = db_query("select * from  tbl_site_pages  where site_pages_show_in_footer='Yes'");

										while ($row = mysqli_fetch_array($admin)) { ?>
											<!-- Footer Links -->
											<ul class="foo-links clearfix">
												<li><a href="<?php echo $row['site_pages_link']; ?>"><?php echo $row['site_pages_name']; ?></a></li>

											</ul>
										<?php } ?>
									</div>
								</div>


								<!-- FOOTER LINKS -->
								<div class="col-lg-4 col-xl-3">
									<div class="footer-links mb-40">

										<!-- Title -->
										<h5 class="h5-md darkblue-color">Subscribe to Our Newsletter</h5>
										<p>Subscribe to our newsletter to receive the latest news and exclusive offers.</p>

										<div id="input-email" class="col-lg-16">
											<input type="email" name="email" class="form-control email" placeholder="Enter Your Email" required>
										</div>
										<br>
										<button type="submit" class="btn btn-primary tra-black-hover submit">Send Your Message</button>
									</div>
								</div>


						</div> <!-- END FOOTER CONTENT -->


						<!-- BOTTOM FOOTER -->
						<div class="bottom-footer">
							<div class="row d-flex align-items-center">


								<!-- FOOTER COPYRIGHT -->



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
				</footer> <!-- END FOOTER-2 -->




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
									<a href="javascript:chooseStyle('orange-theme', 60)"><img src="images/color-scheme/orange.png" width="50" height="50" alt="" /></a>
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


						</div>
					</div>
				</div> <!-- END SWITCHER -->


				<script src="js/changer.js"></script>
				<script defer src="js/styleswitch.js"></script>


				</body>

				</html>