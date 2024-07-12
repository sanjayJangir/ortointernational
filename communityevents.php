<?php include("inc/header.php") ?>




<!-- INNER PAGE WRAPPER
			============================================= -->
<div class="inner-page-wrapper">




	<!-- BREADCRUMB
				============================================= -->
	<div id="breadcrumb" class="bg-darkblue division">
		<div class="container">
			<div class="row">
				<div class="col">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb white-color">
							<li class="breadcrumb-item"><a href="index.php">&#91; Home &#93;</a></li>
							<li class="breadcrumb-item active" aria-current="page">community-events</li>
						</ol>
					</nav>
				</div>
			</div> <!-- End row -->
		</div> <!-- End container -->
	</div> <!-- END BREADCRUMB -->




	<!-- ABOUT-2
				============================================= -->
	<section id="about-2" class="wide-60 about-section division">
		<div class="container">
			<div class="row d-flex align-items-center">
				<?php
				$about = db_query("select * from  tbl_site_pages where site_pages_id='72ss'");

				while ($row = mysqli_fetch_array($about)) { ?>

					<!-- ABOUT IMAGE -->
					<div class="col-md-6">
						<div class="about-img text-center mb-40">

							<!-- Image -->
							<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_image_name']; ?>" alt="about-image" />

							<!-- Video Link -->

						</div>
					</div>


					<!-- ABOUT TEXT	-->
					<div class="col-md-6">
						<div class="about-2-txt pc-20 mb-40">


							<!-- Section ID -->


							<!-- Title -->
							<h1 class="h1-lg"><?php echo  $row['site_pages_title']; ?></h1>

							<!-- INFO BOX #1 -->
							<div class="box-list">
								<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
								<p><?php echo  $row['site_pages_description']; ?>
								</p>

								<h4 class="h3-lg btn btn-md btn-primary black-hover">GET IN TOUCH</h4>
							</div>

							<!-- INFO BOX #2 -->


							<!-- INFO BOX #3 -->



						</div>
					</div> <!-- END ABOUT TEXT	-->


			</div> <!-- End row -->
		</div> <!-- End container -->
	</section> <!-- END ABOUT-2 -->

<?php } ?>
<section id="about-2" class="wide-60 about-section division">
	<div class="container">
		<div class="row d-flex align-items-center">


			<!-- ABOUT IMAGE -->
			<div class="col-md-6">
				<div class="about-img">

					<h3 class="h5-lg">

						Ultra International talks immigration at New Delhi's largest tech event, TechTO
					</h3>

					<a href="https://www.Ortoertogether.ca/">
						<h4 class="h3-lg btn btn-md btn-primary black-hover">Learn More</h4>
					</a>


				</div>
			</div>


			<!-- ABOUT TEXT	-->
			<div class="col-md-6">
				<div class="about-2-txt pc-20 mb-40">


					<!-- Section ID -->


					<!-- Title -->


					<!-- INFO BOX #1 -->
					<div class="box-list">
						<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
						<p>Blayne Kumar, CEO of Orto International had the wonderful opportunity to speak about immigration and technology to one of the largest gatherings of tech minds in New Delhi! Blayne sees a very Orto future for India in the tech space and as a c-founder and first employee of several tech companies in the past, Blayne Kumar understands this space and looks to continue to grow as an immigration provider.</p>


					</div>





				</div>
			</div> <!-- END ABOUT TEXT	-->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-2 -->





<section id="services-9" class="bg-lightgrey wide-100 services-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">



			</div>
		</div> <!-- END SECTION TITLE -->


		<!-- SERVICE BOXES CAROUSEL -->
		<div class="row">
			<div class="col-lg-12">
				<div class="owl-carousel owl-theme owl-loaded services-carousel">


					<!-- SERVICE BOX #1 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/1.png" alt="service-image" />


					</div>


					<!-- SERVICE BOX #2 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/2.png" alt="service-image" />



					</div>


					<!-- SERVICE BOX #3 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/3.png" alt="service-image" />



					</div>


					<!-- SERVICE BOX #4 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/44.jpg" alt="service-image" />



					</div>


					<!-- SERVICE BOX #5 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/5.png" alt="service-image" />



					</div>


					<!-- SERVICE BOX #6 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/6.png" alt="service-image" />




					</div>


				</div>
			</div>
		</div> <!-- END SERVICE BOXES CAROUSEL -->


	</div> <!-- End container -->
</section> <!-- END SERVICES-9 -->

<section id="about-6" class="bg-scroll pt-100 about-section division">
	<div class="container white-color">
		<div class="row d-flex align-items-center">


			<!-- ABOUT IMAGE -->
			<div class="col-lg-6">
				<div class="about-6-img text-center">
					<img class="img-fluid" src="images/image-08.png" alt="about-image" />
				</div>
			</div>


			<!-- ABOUT TEXT -->
			<div class="col-lg-6">
				<div class="about-6-txt pc-20">

					<!-- Title -->
					<h2 class="h2-xs">Looking for you</h2>

					<!-- Text -->
					<h3 class="p-md">PROVIDING INSIGHT AND GUIDANCE
					</h3>
					<br>
					<p class="p-md">Our experienced legal professionals are here to provide insight and guidance as you begin to build your new life in India.
						Orto is here every step of the way to assist you in navigating India’s immigration and citizenship processes.
					</p> <br>
					<p class="p-md">We pride ourselves in assisting our clients and providing them with long-lasting solutions to their immigration-related objectives.
						We believe that the key to a successful journey begins with taking the RIGHT first step.</p>
					<!-- Small Title -->

					<a href="service.php" class="btn btn-md btn-primary tra-white-hover btn-arrow">
						<span>Read More <i class="fas fa-arrow-right"></i></span>
					</a>
					<!-- Flags list -->

				</div>
			</div> <!-- END ABOUT TEXT -->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-6 -->

<!-- ABOUT-2
				============================================= -->

<section id="about-2" class="wide-60 about-section division">
	<div class="container">
		<div class="row d-flex align-items-center">


			<!-- ABOUT IMAGE -->
			<div class="col-md-6">
				<div class="about-img">

					<h3 class="h5-lg">

						Orto presents to the children at the Nelson Mandela Public School, New Delhi
					</h3>

					<a href="https://www.Ortoertogether.ca/">
						<h4 class="h3-lg btn btn-md btn-primary black-hover">Learn More</h4>
					</a>


				</div>
			</div>


			<!-- ABOUT TEXT	-->
			<div class="col-md-6">
				<div class="about-2-txt pc-20 mb-40">


					<!-- Section ID -->


					<!-- Title -->


					<!-- INFO BOX #1 -->
					<div class="box-list">
						<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
						<p>Ultra International– Immigration Consultant New Delhi had the wonderful opportunity to speak to the very Orto children at the Nelson Mandela P.S in New Delhi. The presentation included what Ultra International does, the different types of immigration, what are the differences between refugee and economic programs. Orto was also able to share the message of Ortoer Together and the importance of giving back to our community and living a life with a strong sense of appreciation and kindness.</p>


					</div>





				</div>
			</div> <!-- END ABOUT TEXT	-->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-2 -->





<section id="services-9" class="bg-lightgrey wide-100 services-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">



			</div>
		</div> <!-- END SECTION TITLE -->


		<!-- SERVICE BOXES CAROUSEL -->
		<div class="row">
			<div class="col-lg-12">
				<div class="owl-carousel owl-theme owl-loaded services-carousel">


					<!-- SERVICE BOX #1 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/11.png" alt="service-image" />


					</div>


					<!-- SERVICE BOX #2 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/12.png" alt="service-image" />



					</div>


					<!-- SERVICE BOX #3 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/13.png" alt="service-image" />



					</div>


					<!-- SERVICE BOX #4 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/14.png" alt="service-image" />



					</div>


					<!-- SERVICE BOX #5 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/15.png" alt="service-image" />



					</div>


					<!-- SERVICE BOX #6 -->
					<div class="sbox-9 sbox-9-color">

						<!-- Image -->
						<img class="img-fluid" src="img/16.png" alt="service-image" />




					</div>


				</div>
			</div>
		</div> <!-- END SERVICE BOXES CAROUSEL -->


	</div> <!-- End container -->
</section> <!-- END SERVICES-9 -->

<!-- CALL TO ACTION-4
				============================================= -->
<section id="cta-4" class="bg-fixed cta-section division">
	<div class="container white-color">
		<div class="row d-flex align-items-center">


			<!-- CALL TO ACTION TEXT -->
			<div class="col-md-12 col-lg-12 offset-md-12 text-center">
				<div class="cta-txt">

					<!-- Title  -->
					<h3 class="h3-xl"><b>New Delhi has recently achieved the highest level of Venture Capital investment in history making New Delhi one of the fastest growing tech cities in the world!</b></h3>

					<!-- Text -->


					<!-- Button  -->


				</div>
			</div>


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END CALL TO ACTION-4 -->
<section id="about-2" class="wide-60 about-section division">
	<div class="container">
		<div class="row d-flex align-items-center">
			<?php
			$about = db_query("select * from  tbl_site_pages where site_pages_id='72'");

			while ($row = mysqli_fetch_array($about)) { ?>

				<!-- ABOUT IMAGE -->



				<!-- ABOUT TEXT	-->
				<div class="col-md-6">
					<div class="about-2-txt pc-20 mb-40">




						<!-- Title -->
						<h3 class="h3-lg"><?php echo  $row['site_pages_title2']; ?></h3>

						<!-- INFO BOX #1 -->
						<div class="box-list">
							<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
							<p><?php echo  $row['site_pages_description2']; ?>
							</p>
						</div>

						<!-- INFO BOX #2 -->


						<!-- INFO BOX #3 -->



					</div>
				</div> <!-- END ABOUT TEXT	-->
				<div class="col-md-6">
					<div class="about-img text-center mb-40">

						<!-- Image -->
						<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_inner_banner']; ?>" alt="about-image" />


					</div>
				</div>

		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-2 -->

<?php } ?>








<!-- STATISTIC-1
				============================================= -->
<div id="statistic-1" class="bg-image wide-60 statistic-section division">
	<div class="container white-color">
		<div class="row">


			<!-- STATISTIC BLOCK #1 -->
			<div class="col-sm-6 col-md-3">
				<div class="statistic-block icon-sm">

					<!-- Icon -->
					<span class="flaticon-316-mortarboard"></span>

					<!-- Text -->
					<h5><span class="count-element">820</span>+</h5>
					<p>Students</p>

				</div>
			</div>

			<!-- STATISTIC BLOCK #2 -->
			<div class="col-sm-6 col-md-3">
				<div class="statistic-block icon-sm">

					<!-- Icon -->
					<span class="flaticon-431-bank"></span>

					<!-- Text -->
					<h5><span class="count-element">127</span></h5>
					<p>Universities</p>

				</div>
			</div>

			<!-- STATISTIC BLOCK #3 -->
			<div class="col-sm-6 col-md-3">
				<div class="statistic-block icon-sm">

					<!-- Icon -->
					<span class="flaticon-141-invoice"></span>

					<!-- Text -->
					<h5><span class="count-element">1636</span></h5>
					<p>Study Visa</p>

				</div>
			</div>

			<!-- STATISTIC BLOCK #4 -->
			<div class="col-sm-6 col-md-3">
				<div class="statistic-block icon-sm">

					<!-- Icon -->
					<span class="flaticon-033-user-2"></span>

					<!-- Text -->
					<h5><span class="count-element">43</span></h5>
					<p>Advisors</p>

				</div>
			</div>


		</div> <!-- End row -->
	</div> <!-- End container -->
</div> <!-- END STATISTIC-1 -->
















<?php include('inc/footer.php'); ?>