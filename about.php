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
							<li class="breadcrumb-item active" aria-current="page">About ImmiEx</li>
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
				$about = db_query("select * from  tbl_site_pages where site_pages_id='2'");

				while ($row = mysqli_fetch_array($about)) { ?>

					<!-- ABOUT IMAGE -->
					<div class="col-md-6">
						<div class="about-img text-center mb-40">

							<!-- Image -->
							<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_image_name']; ?>" alt="about-image" />

							<!-- Video Link -->
							<div class="video-square">
								<div class="video-link icon-lg primary-color">
									<a class="video-popup2" href="<?php echo  $row['site_pages_video_name']; ?>">
										<span class="flaticon-159-play-button"></span>
									</a>
								</div>
							</div>
						</div>
					</div>


					<!-- ABOUT TEXT	-->
					<div class="col-md-6">
						<div class="about-2-txt pc-20 mb-40">


							<!-- Section ID -->
							<span class="section-id noto-font-700 id-color">About us</span>

							<!-- Title -->
							<h4 class="h4-lg"><?php echo  $row['site_pages_title']; ?></h4>

							<!-- INFO BOX #1 -->
							<div class="box-list">
								<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
								<p><?php echo  $row['site_pages_description']; ?>
								</p>
							</div>

							<!-- INFO BOX #2 -->


							<!-- INFO BOX #3 -->



						</div>
					</div> <!-- END ABOUT TEXT	-->


			</div> <!-- End row -->
		</div> <!-- End container -->
	</section> <!-- END ABOUT-2 -->

<?php } ?>


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
			<?php
			$about = db_query("select * from  tbl_site_pages where site_pages_id='2'");

			while ($row = mysqli_fetch_array($about)) { ?>

				<!-- ABOUT IMAGE -->



				<!-- ABOUT TEXT	-->
				<div class="col-md-6">
					<div class="about-2-txt pc-20 mb-40">


						<!-- Section ID -->
						<span class="section-id noto-font-700 id-color">About Agency</span>

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

						<!-- Video Link -->
						<div class="video-square">
							<div class="video-link icon-lg primary-color">
								<a class="video-popup2" href="<?php echo  $row['site_pages_video_name']; ?>">
									<span class="flaticon-159-play-button"></span>
								</a>
							</div>
						</div>
					</div>
				</div>

		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-2 -->

<?php } ?>
<!-- SERVICES-6
				============================================= -->
<section id="services-6" class="bg-lightgrey wide-100 services-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">

				<!-- Title -->
				<h2 class="h2-lg">COMPANY VALUES</h2>
				<br>
				<BR <!-- Text -->
				<img src="img/companyvalue.jpg" alt="company-value" class="img-fluid">

			</div>
		</div>





	</div> <!-- End row -->
</div> <!-- End container -->
</section> <!-- END SERVICES-6 -->




<!-- ABOUT-5
				============================================= -->
<section id="about-5" class="wide-60 about-section division">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-4">
				<span class="elementor-icon elementor-animation-">
					<svg xmlns="http://www.w3.org/2000/svg" width="102.182" height="91.802" viewBox="0 0 102.182 91.802">
						<g id="Group_3617" data-name="Group 3617" transform="translate(-39.648 -86.66)">
							<g id="Group_3586" data-name="Group 3586" transform="translate(88.69 125.383)">
								<path id="Path_529" data-name="Path 529" d="M482.815,438.191a1.551,1.551,0,0,1-1.535-1.338l-1.109-7.955a1.552,1.552,0,1,1,3.074-.429l1.109,7.955a1.552,1.552,0,0,1-1.322,1.752A1.444,1.444,0,0,1,482.815,438.191Z" transform="translate(-480.156 -427.131)" fill="#3d63ae"></path>
							</g>
							<g id="Group_3587" data-name="Group 3587" transform="translate(75.17 131.839)">
								<path id="Path_530" data-name="Path 530" d="M345.762,505.493a1.543,1.543,0,0,1-.644-.141l-11.067-5.05a1.552,1.552,0,1,1,1.288-2.824l11.067,5.05a1.553,1.553,0,0,1-.645,2.965Z" transform="translate(-333.143 -497.337)" fill="#3d63ae"></path>
							</g>
							<g id="Group_3588" data-name="Group 3588" transform="translate(92.234 122.385)">
								<path id="Path_531" data-name="Path 531" d="M531.161,402.018a1.543,1.543,0,0,1-.578-.112l-10.913-4.383a1.552,1.552,0,1,1,1.157-2.88l10.913,4.383a1.552,1.552,0,0,1-.579,2.992Z" transform="translate(-518.697 -394.531)" fill="#3d63ae"></path>
							</g>
							<g id="Group_3589" data-name="Group 3589" transform="translate(67.659 124.564)">
								<path id="Path_532" data-name="Path 532" d="M257.185,429.678a5.724,5.724,0,1,1,5.724-5.725A5.73,5.73,0,0,1,257.185,429.678Zm0-8.344a2.62,2.62,0,1,0,2.621,2.62A2.623,2.623,0,0,0,257.185,421.334Z" transform="translate(-251.46 -418.23)" fill="#3d63ae"></path>
							</g>
							<g id="Group_3590" data-name="Group 3590" transform="translate(86.065 133.934)">
								<path id="Path_533" data-name="Path 533" d="M457.345,531.571a5.725,5.725,0,1,1,5.725-5.725A5.73,5.73,0,0,1,457.345,531.571Zm0-8.346a2.621,2.621,0,1,0,2.62,2.622A2.624,2.624,0,0,0,457.345,523.225Z" transform="translate(-451.62 -520.12)" fill="#3d63ae"></path>
							</g>
							<g id="Group_3591" data-name="Group 3591" transform="translate(83.679 116.741)">
								<path id="Path_534" data-name="Path 534" d="M431.4,344.606a5.723,5.723,0,1,1,5.725-5.723A5.731,5.731,0,0,1,431.4,344.606Zm0-8.344a2.619,2.619,0,1,0,2.62,2.62A2.624,2.624,0,0,0,431.4,336.263Z" transform="translate(-425.67 -333.16)" fill="#3d63ae"></path>
							</g>
							<g id="Group_3592" data-name="Group 3592" transform="translate(102.408 125.081)">
								<path id="Path_535" data-name="Path 535" d="M635.055,435.3a5.725,5.725,0,1,1,5.725-5.724A5.731,5.731,0,0,1,635.055,435.3Zm0-8.345a2.621,2.621,0,1,0,2.621,2.622A2.624,2.624,0,0,0,635.055,426.954Z" transform="translate(-629.33 -423.85)" fill="#3d63ae"></path>
							</g>
							<g id="Group_3595" data-name="Group 3595" transform="translate(39.648 86.66)">
								<g id="Group_3593" data-name="Group 3593" transform="translate(0 0)">
									<path id="Path_536" data-name="Path 536" d="M90.892,178.462a1.857,1.857,0,0,1-1.066-.336L73.519,166.742A122.507,122.507,0,0,1,58.9,155.086a76.646,76.646,0,0,1-13.473-15.854c-6.677-10.7-7.636-24.129-2.5-35.058A30.684,30.684,0,0,1,70.1,86.66l.482,0c8.706.159,15.53,3.969,20.154,7.173,4.624-3.2,11.449-7.014,20.136-7.173l.482,0a30.691,30.691,0,0,1,27.2,17.514c5.135,10.93,4.178,24.363-2.5,35.06a76.627,76.627,0,0,1-13.473,15.853c-4.466,4.015-20.152,16.242-25.412,19.658l-5.261,3.418A1.868,1.868,0,0,1,90.892,178.462ZM70.086,90.386A26.888,26.888,0,0,0,46.294,105.76c-4.6,9.795-3.726,21.866,2.289,31.5a72.794,72.794,0,0,0,12.8,15.056,118.913,118.913,0,0,0,14.193,11.323l.049.033,15.3,10.682,4.209-2.734c5.16-3.351,20.561-15.359,24.95-19.3a72.839,72.839,0,0,0,12.8-15.056c6.015-9.635,6.893-21.706,2.289-31.5a26.9,26.9,0,0,0-23.81-15.373l-.448,0c-8.242.15-14.536,3.949-19.1,7.24a1.863,1.863,0,0,1-2.181,0c-4.559-3.292-10.851-7.09-19.114-7.24Z" transform="translate(-39.648 -86.66)" fill="#3d63ae"></path>
								</g>
								<g id="Group_3594" data-name="Group 3594" transform="translate(9.301 9.313)">
									<path id="Path_537" data-name="Path 537" d="M166.04,242.287a1.857,1.857,0,0,1-1.066-.336l-11.285-7.876a113.531,113.531,0,0,1-13.607-10.86,67.082,67.082,0,0,1-11.8-13.861c-5.021-8.042-5.776-18.067-1.972-26.165,3.43-7.3,11.294-12.313,19.08-12.158,8.2.149,14.632,4.966,20.305,9.56,5.673-4.592,12.11-9.411,20.305-9.56.107,0,.216,0,.323,0a21.432,21.432,0,0,1,18.757,12.162c3.805,8.1,3.05,18.122-1.972,26.165a67.117,67.117,0,0,1-11.8,13.861c-4.175,3.751-19.377,15.6-24.258,18.772A1.856,1.856,0,0,1,166.04,242.287Zm-20.98-67.532a17.6,17.6,0,0,0-15.377,10.02,23.954,23.954,0,0,0,1.76,22.607,63.3,63.3,0,0,0,11.131,13.064,110.076,110.076,0,0,0,13.172,10.523l.052.034,10.263,7.163c5.548-3.829,19.026-14.364,22.761-17.722a63.308,63.308,0,0,0,11.131-13.064,23.948,23.948,0,0,0,1.76-22.607,17.586,17.586,0,0,0-15.641-10.018c-7.48.136-13.436,4.987-19.2,9.68a1.865,1.865,0,0,1-2.354,0c-5.76-4.693-11.717-9.544-19.2-9.68Z" transform="translate(-123.908 -171.029)" fill="#3d63ae"></path>
								</g>
							</g>
							<g id="Group_3597" data-name="Group 3597" transform="translate(48.949 95.973)">
								<g id="Group_3596" data-name="Group 3596" transform="translate(0 0)">
									<path id="Path_538" data-name="Path 538" d="M166.04,242.287a1.857,1.857,0,0,1-1.066-.336l-11.285-7.876a113.531,113.531,0,0,1-13.607-10.86,67.082,67.082,0,0,1-11.8-13.861c-5.021-8.042-5.776-18.067-1.972-26.165,3.43-7.3,11.294-12.313,19.08-12.158,8.2.149,14.632,4.966,20.305,9.56,5.673-4.592,12.11-9.411,20.305-9.56.107,0,.216,0,.323,0a21.432,21.432,0,0,1,18.757,12.162c3.805,8.1,3.05,18.122-1.972,26.165a67.117,67.117,0,0,1-11.8,13.861c-4.175,3.751-19.377,15.6-24.258,18.772A1.856,1.856,0,0,1,166.04,242.287Zm-20.98-67.532a17.6,17.6,0,0,0-15.377,10.02,23.954,23.954,0,0,0,1.76,22.607,63.3,63.3,0,0,0,11.131,13.064,110.076,110.076,0,0,0,13.172,10.523l.052.034,10.263,7.163c5.548-3.829,19.026-14.364,22.761-17.722a63.308,63.308,0,0,0,11.131-13.064,23.948,23.948,0,0,0,1.76-22.607,17.586,17.586,0,0,0-15.641-10.018c-7.48.136-13.436,4.987-19.2,9.68a1.865,1.865,0,0,1-2.354,0c-5.76-4.693-11.717-9.544-19.2-9.68Z" transform="translate(-123.908 -171.029)" fill="#3d63ae"></path>
								</g>
							</g>
						</g>
					</svg> </span>


				<h3 class="h3-lg"><span>1. Integrity</span></h3>
				<p>
					Our team practices integrity by always being honest and showing consistent moral principles and values.<br>a)We are honest and realistic with our clients when it comes to the expectations they should have.<br>
					b) We are honest with our clients when discussing how we can help them. You can count on our word. </p>

			</div>
			<div class="col-md-4">
				<svg xmlns="http://www.w3.org/2000/svg" width="101.079" height="89.175" viewBox="0 0 101.079 89.175">
					<g id="Icon2-02" transform="translate(-61.013 -119.885)">
						<path id="Path_539" data-name="Path 539" d="M279.164,161.835a1.458,1.458,0,0,1-.908-.316,18.144,18.144,0,0,1-5.436-8.035c-.644-2.013-.517-3.626.378-4.793a3.717,3.717,0,0,1,1.612-1.194c-1.4-7.153.17-20.994,13.8-25.361,14.5-4.641,20.019,1.456,20.247,1.718a1.47,1.47,0,0,1-2.216,1.93c-.032-.034-4.641-4.844-17.134-.849-12.654,4.05-13.2,17.681-11.5,23.278l.6,1.989-2.079-.1a1.454,1.454,0,0,0-1.007.378,2.727,2.727,0,0,0,.1,2.1,15.431,15.431,0,0,0,4.461,6.63,1.471,1.471,0,0,1-.916,2.621Z" transform="translate(-187.598)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
						<path id="Path_540" data-name="Path 540" d="M593.3,177.794a1.47,1.47,0,0,1-1.461-1.326c-.408-4.1-1.957-8.748-5.15-11.546a6.281,6.281,0,0,0-5.805-.808,1.47,1.47,0,1,1-1.065-2.739c2.707-1.053,6.453-.763,8.693,1.2a19.391,19.391,0,0,1,5.425,9.206,25.192,25.192,0,0,1,.824,4.388,1.47,1.47,0,0,1-1.317,1.608A1.319,1.319,0,0,1,593.3,177.794Z" transform="translate(-460.197 -35.915)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
						<path id="Path_541" data-name="Path 541" d="M329.95,308.625a1.471,1.471,0,0,1-1.47-1.446c-.02-1.262-.044-12.4,5.275-14.744l.488-.214.512.148c5.718,1.65,14.533,3.719,19.361,3.867l-1.272-1.5-.005-.007,2.21-1.94c.3-.26,2.314.292,2.738.365a19.876,19.876,0,0,1,4.359,1.271A1.47,1.47,0,1,1,361,297.134a22.913,22.913,0,0,0-2.541-.884,5.619,5.619,0,0,0-.56-.1l.291.343,1.462,1.719-2.168.646c-4.848,1.436-19.46-2.508-22.958-3.494-2.36,1.657-3.166,7.97-3.108,11.773a1.471,1.471,0,0,1-1.446,1.493Zm25.1-15.823.021.025h0Z" transform="translate(-237.466 -152.836)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
						<path id="Path_542" data-name="Path 542" d="M342.4,505.9c-15.84,0-20.313-21.166-20.5-22.067a1.47,1.47,0,0,1,2.881-.585c.04.2,4.179,19.712,17.615,19.712a13.652,13.652,0,0,0,10.022-4.489,1.47,1.47,0,0,1,2.109,2.044A16.483,16.483,0,0,1,342.4,505.9Z" transform="translate(-231.59 -321.711)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
						<path id="Path_543" data-name="Path 543" d="M62.984,674.917h-.045a1.47,1.47,0,0,1-1.424-1.513c.582-19.235,18.74-20.975,28.494-21.91l.319-.031c3.1-.3,5.336-1.2,6.466-2.611a3.566,3.566,0,0,0,.831-2.5,1.481,1.481,0,0,1,1.253-1.649,1.462,1.462,0,0,1,1.657,1.215A6.4,6.4,0,0,1,99.16,650.6c-1.649,2.125-4.525,3.4-8.547,3.786l-.32.031c-9.475.908-25.332,2.431-25.837,19.071a1.47,1.47,0,0,1-1.472,1.426Z" transform="translate(0 -466.357)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
						<path id="Path_544" data-name="Path 544" d="M651.405,674.757a1.47,1.47,0,0,1-1.468-1.424,23.754,23.754,0,0,0-.338-3.388c-2.386-13.468-16.854-14.856-25.5-15.685l-.32-.031a21.383,21.383,0,0,1-2.21-.331c-8.61-1.755-7.726-8.075-7.715-8.139a1.47,1.47,0,0,1,2.907.435c-.046.387-.272,3.671,5.393,4.83a18.328,18.328,0,0,0,1.907.277l.318.031c8.855.849,25.341,2.431,28.112,18.1a26.734,26.734,0,0,1,.382,3.809,1.47,1.47,0,0,1-1.424,1.514Z" transform="translate(-491.283 -466.197)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
						<path id="Path_545" data-name="Path 545" d="M557.662,373.9a16.132,16.132,0,1,1,16.132-16.132A16.15,16.15,0,0,1,557.662,373.9Zm0-29.317a13.189,13.189,0,1,0,13.189,13.189A13.189,13.189,0,0,0,557.662,344.587Z" transform="translate(-426.977 -196.796)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
						<path id="Path_546" data-name="Path 546" d="M628.5,445.57l-5.4-5.4a1.47,1.47,0,1,1,2.078-2.078l3.325,3.325,8.372-8.371a1.47,1.47,0,0,1,2.074,2.079Z" transform="translate(-499.147 -277.752)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					</g>
				</svg> </span>


				<h3 class="h3-lg"><span>2. Accountability</span></h3>
				<p>
					The condition of being accountable and responsible..<br>a)We take accountability for any errors we make and address them right away.<br>
					b) We hold ourselves accountable for following our own company values and providing the highest quality service possible.</p>
			</div>

		</div>
		<div class="col-md-2">
		</div>

	</div>
	<br>
	<br>


	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
			<span class="elementor-icon elementor-animation-">
				<svg xmlns="http://www.w3.org/2000/svg" width="89.284" height="68.169" viewBox="0 0 89.284 68.169">
					<g id="Icon3-02" transform="translate(-92.69 -221.472)">
						<path id="Path_547" data-name="Path 547" d="M181.724,347.5H92.94V290.99h3.013v53.495h82.757V290.99h3.013Z" transform="translate(0 -61.926)" fill="#3d63ae" stroke="#3d63ae" stroke-width="0.5"></path>
						<circle id="Ellipse_175" data-name="Ellipse 175" cx="6.346" cy="6.346" r="6.346" transform="translate(130.89 276.95)" fill="#3d63ae"></circle>
						<path id="Path_549" data-name="Path 549" d="M498.7,286.859v-54.58l.7-.443A66.927,66.927,0,0,1,536.07,221.8l1.412.089v54.284l-1.52-.014h-.6a68.415,68.415,0,0,0-34.325,9.18Zm3.011-52.914v47.5a72.085,72.085,0,0,1,32.757-8.3V224.777A65.658,65.658,0,0,0,501.711,233.945Z" transform="translate(-362.873 -0.006)" fill="#3d63ae" stroke="#3d63ae" stroke-width="0.5"></path>
						<path id="Path_550" data-name="Path 550" d="M210.28,296.884a69.241,69.241,0,0,0-35.77-9.423Z" transform="translate(-72.948 -12.819)" fill="#fff"></path>
						<path id="Path_551" data-name="Path 551" d="M199.043,286.86l-2.334-1.536a68.4,68.4,0,0,0-34.929-9.175l-1.52.014V221.878l1.413-.089a66.9,66.9,0,0,1,36.669,10.041l.7.443ZM163.273,273.14a72.1,72.1,0,0,1,32.757,8.3v-47.5a65.652,65.652,0,0,0-32.757-9.168Z" transform="translate(-60.205)" fill="#3d63ae" stroke="#3d63ae" stroke-width="0.5"></path>
					</g>
				</svg> </span>



			<h3 class="h3-lg"><span>3.Knowledge</span></h3>
			<p>
				Knowledge is an asset. Orto International relies on skills, capabilities, and expert insight when it comes to making decisions to provide the best experience.
				<br>a) Cumulatively, we have 50+ years of immigration experience.<br>b) Our team of professionals have experience in all immigration application types.<br>c) We stay up to date with all new programs and policies. We have team discussions to ensure every member of our team is well informed.
			</p>

		</div>
		<div class="col-md-4">
			<svg xmlns="http://www.w3.org/2000/svg" width="101.079" height="89.175" viewBox="0 0 101.079 89.175">
				<g id="Icon2-02" transform="translate(-61.013 -119.885)">
					<path id="Path_539" data-name="Path 539" d="M279.164,161.835a1.458,1.458,0,0,1-.908-.316,18.144,18.144,0,0,1-5.436-8.035c-.644-2.013-.517-3.626.378-4.793a3.717,3.717,0,0,1,1.612-1.194c-1.4-7.153.17-20.994,13.8-25.361,14.5-4.641,20.019,1.456,20.247,1.718a1.47,1.47,0,0,1-2.216,1.93c-.032-.034-4.641-4.844-17.134-.849-12.654,4.05-13.2,17.681-11.5,23.278l.6,1.989-2.079-.1a1.454,1.454,0,0,0-1.007.378,2.727,2.727,0,0,0,.1,2.1,15.431,15.431,0,0,0,4.461,6.63,1.471,1.471,0,0,1-.916,2.621Z" transform="translate(-187.598)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					<path id="Path_540" data-name="Path 540" d="M593.3,177.794a1.47,1.47,0,0,1-1.461-1.326c-.408-4.1-1.957-8.748-5.15-11.546a6.281,6.281,0,0,0-5.805-.808,1.47,1.47,0,1,1-1.065-2.739c2.707-1.053,6.453-.763,8.693,1.2a19.391,19.391,0,0,1,5.425,9.206,25.192,25.192,0,0,1,.824,4.388,1.47,1.47,0,0,1-1.317,1.608A1.319,1.319,0,0,1,593.3,177.794Z" transform="translate(-460.197 -35.915)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					<path id="Path_541" data-name="Path 541" d="M329.95,308.625a1.471,1.471,0,0,1-1.47-1.446c-.02-1.262-.044-12.4,5.275-14.744l.488-.214.512.148c5.718,1.65,14.533,3.719,19.361,3.867l-1.272-1.5-.005-.007,2.21-1.94c.3-.26,2.314.292,2.738.365a19.876,19.876,0,0,1,4.359,1.271A1.47,1.47,0,1,1,361,297.134a22.913,22.913,0,0,0-2.541-.884,5.619,5.619,0,0,0-.56-.1l.291.343,1.462,1.719-2.168.646c-4.848,1.436-19.46-2.508-22.958-3.494-2.36,1.657-3.166,7.97-3.108,11.773a1.471,1.471,0,0,1-1.446,1.493Zm25.1-15.823.021.025h0Z" transform="translate(-237.466 -152.836)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					<path id="Path_542" data-name="Path 542" d="M342.4,505.9c-15.84,0-20.313-21.166-20.5-22.067a1.47,1.47,0,0,1,2.881-.585c.04.2,4.179,19.712,17.615,19.712a13.652,13.652,0,0,0,10.022-4.489,1.47,1.47,0,0,1,2.109,2.044A16.483,16.483,0,0,1,342.4,505.9Z" transform="translate(-231.59 -321.711)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					<path id="Path_543" data-name="Path 543" d="M62.984,674.917h-.045a1.47,1.47,0,0,1-1.424-1.513c.582-19.235,18.74-20.975,28.494-21.91l.319-.031c3.1-.3,5.336-1.2,6.466-2.611a3.566,3.566,0,0,0,.831-2.5,1.481,1.481,0,0,1,1.253-1.649,1.462,1.462,0,0,1,1.657,1.215A6.4,6.4,0,0,1,99.16,650.6c-1.649,2.125-4.525,3.4-8.547,3.786l-.32.031c-9.475.908-25.332,2.431-25.837,19.071a1.47,1.47,0,0,1-1.472,1.426Z" transform="translate(0 -466.357)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					<path id="Path_544" data-name="Path 544" d="M651.405,674.757a1.47,1.47,0,0,1-1.468-1.424,23.754,23.754,0,0,0-.338-3.388c-2.386-13.468-16.854-14.856-25.5-15.685l-.32-.031a21.383,21.383,0,0,1-2.21-.331c-8.61-1.755-7.726-8.075-7.715-8.139a1.47,1.47,0,0,1,2.907.435c-.046.387-.272,3.671,5.393,4.83a18.328,18.328,0,0,0,1.907.277l.318.031c8.855.849,25.341,2.431,28.112,18.1a26.734,26.734,0,0,1,.382,3.809,1.47,1.47,0,0,1-1.424,1.514Z" transform="translate(-491.283 -466.197)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					<path id="Path_545" data-name="Path 545" d="M557.662,373.9a16.132,16.132,0,1,1,16.132-16.132A16.15,16.15,0,0,1,557.662,373.9Zm0-29.317a13.189,13.189,0,1,0,13.189,13.189A13.189,13.189,0,0,0,557.662,344.587Z" transform="translate(-426.977 -196.796)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
					<path id="Path_546" data-name="Path 546" d="M628.5,445.57l-5.4-5.4a1.47,1.47,0,1,1,2.078-2.078l3.325,3.325,8.372-8.371a1.47,1.47,0,0,1,2.074,2.079Z" transform="translate(-499.147 -277.752)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
				</g>
			</svg>


			<h3 class="h3-lg"><span>4. Creativity</span></h3>
			<p>
				<br>
				Using our imagination, our team collectively creates original ideas when it comes to problem solving.
				<Br>a) We find creative strategies to complicated immigration problems.<br>b) We rely on our decades of diverse experience in guiding our creative problem solving.

			<div class="col-md-2">
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-4">

				<svg xmlns="http://www.w3.org/2000/svg" width="102.727" height="96.39" viewBox="0 0 102.727 96.39">
					<g id="IconNew_3-02" data-name="IconNew 3-02" transform="translate(-29.315 -80.227)">
						<path id="Path_552" data-name="Path 552" d="M69.336,361.39h-.792V346.5A1.8,1.8,0,0,0,68,345.221L50.8,328.445a6.6,6.6,0,0,0-9.268,9.387l8.073,8.063a1.8,1.8,0,0,0,2.544-2.544l-8.072-8.072a3,3,0,1,1,4.212-4.271l16.655,16.255V361.39h-16v-4.8a1.8,1.8,0,0,0-.526-1.272L32.913,339.8v-26.45a3.384,3.384,0,1,1,6.769,0v19.7c0,.994.8-1.574,1.8-1.574a1.8,1.8,0,0,0,1.8-1.8V313.352a6.981,6.981,0,1,0-13.963,0v27.19a1.8,1.8,0,0,0,.526,1.271l15.512,15.518v4.059h-.4a1.8,1.8,0,0,0-1.8,1.8v12.353a1.8,1.8,0,0,0,1.8,1.8h21.3a1.8,1.8,0,1,0,0-3.6h-19.5v-8.756h20.8v8.756h-.8a1.8,1.8,0,1,0,0,3.6h2.591a1.8,1.8,0,0,0,1.8-1.8V363.188A1.8,1.8,0,0,0,69.336,361.39Z" transform="translate(0 -200.724)" fill="#3d63ae"></path>
						<path id="Path_553" data-name="Path 553" d="M605.968,306.37a6.989,6.989,0,0,0-6.985,6.982v18.576a1.8,1.8,0,0,0,3.6,0V313.352a3.384,3.384,0,1,1,6.769,0V339.8l-15.512,15.512a1.8,1.8,0,0,0-.527,1.272v4.8h-16v-14.12l16.655-16.247a3,3,0,1,1,4.212,4.271l-8.074,8.066a1.8,1.8,0,0,0,2.546,2.542l8.072-8.073a6.594,6.594,0,1,0-9.269-9.38l-17.2,16.779a1.8,1.8,0,0,0-.543,1.287V361.39h-.792a1.8,1.8,0,0,0-1.8,1.8v12.353a1.8,1.8,0,0,0,1.8,1.8h2.591a1.8,1.8,0,1,0,0-3.6h-.792v-8.756h20.8v8.756h-19.5a1.8,1.8,0,0,0,0,3.6h21.3a1.8,1.8,0,0,0,1.8-1.8V363.188a1.8,1.8,0,0,0-1.8-1.8h-.4v-4.059l15.512-15.518a1.8,1.8,0,0,0,.527-1.271v-27.19A6.989,6.989,0,0,0,605.968,306.37Z" transform="translate(-480.903 -200.724)" fill="#3d63ae"></path>
						<path id="Path_554" data-name="Path 554" d="M372.895,188.275a1.8,1.8,0,1,0,3.035,1.923c2.405-3.8,5.958-5.979,9.732-5.979s7.328,2.18,9.732,5.979a1.8,1.8,0,0,0,3.035-1.923,16.172,16.172,0,0,0-8.768-7.044,8.5,8.5,0,1,0-8.018,0A16.221,16.221,0,0,0,372.895,188.275Zm12.77-19.428a4.9,4.9,0,1,1-4.9,4.9A4.9,4.9,0,0,1,385.665,168.846Z" transform="translate(-304.67 -75.461)" fill="#3d63ae"></path>
						<path id="Path_555" data-name="Path 555" d="M244.359,109.837l3.345-5.864a2.708,2.708,0,0,0-2.353-4.047h-1.036A20.786,20.786,0,0,1,282.839,94.7,1.8,1.8,0,1,0,286,92.985a24.383,24.383,0,0,0-45.363,6.945h-1.807a2.708,2.708,0,0,0-2.375,3.989l3.178,5.864a2.708,2.708,0,0,0,2.35,1.419h.03A2.707,2.707,0,0,0,244.359,109.837Zm-2.331-3.171-1.7-3.147h3.5Z" transform="translate(-183.569 0)" fill="#3d63ae"></path>
						<path id="Path_556" data-name="Path 556" d="M337.747,243.149a2.708,2.708,0,0,0-4.732-.052l-3.344,5.864a2.708,2.708,0,0,0,2.352,4.047h1.036a20.786,20.786,0,0,1-38.524,5.227,1.8,1.8,0,0,0-3.161,1.718,24.384,24.384,0,0,0,45.363-6.944h1.807a2.709,2.709,0,0,0,2.381-4Zm-4.194,6.266,1.8-3.147,1.7,3.147Z" transform="translate(-232.408 -143.351)" fill="#3d63ae"></path>
					</g>
				</svg> </span>




				<h3 class="h3-lg"><span>5.Client Care </span></h3>
				<p>
					We treat our clients with respect. We take the time to get to know each client and respect their values and personal priorities.
					<Br>a) We have a 48 business hours response policy; we will respond to all case-related inquiries within 48 business hours.<br>b) We treat each client with the utmost care and respect.<br>c) We hold team meetings daily to brainstorm solutions for our toughest cases.
				</p>. </p>
			</div>
			<br>
			<div class="col-md-4">
				<img src="img/service.jpg" class="img-fluid" style="height:300px; width:300px;">

			</div>
			<div class="col-md-2">
			</div>

		</div>
		<br>
		<br>


</section> <!-- END ABOUT-5 -->




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

<section id="about-2" class="wide-60 about-section division">
	<div class="container">
		<div class="row d-flex align-items-center">


			<!-- ABOUT IMAGE -->



			<!-- ABOUT TEXT	-->
			<div class="col-md-6">
				<div class="about-2-txt pc-20 mb-40">


					<!-- Section ID -->


					<!-- Title -->
					<h4 class="h3-lg btn btn-md btn-primary black-hover">WE HAVE SOME GOALS</h4>
					<br>
					<h3 class="h3-lg">OUR MISSION & VISION</h3>
					<!-- INFO BOX #1 -->
					<div class="box-list">
						<p>Our mission is t0o build a global brand to serve our clients with integrity, creativity and strong values while setting the benchmark for ethical behaviour in our industry.</p>
						<br>
						<p>Ultra International wants to positively transform the lives and circumstances of all our clients and their communities.</p>
						<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
						<p>
							<br>
						<ul>
							<li>1.We will treat our employees fairly and respectfully and strive to offer them personal and career growth.</li>
							<br>
							<br>
							<li>2.We will collaborate with other organizations and Canadian employers by sharing expert advice to help solve their labour shortages through the immigration, recruitment, and settlement process.</li>
							<br> <br>
							<li>3.We will expertly guide our individual clients through the Canadian immigration process to help them reach their personal goals.
							</li>
						</ul>
					</div>





				</div>
			</div> <!-- END ABOUT TEXT	-->
			<div class="col-md-6">
				<div class="about-img text-center mb-40">

					<!-- Image -->
					<img class="img-fluid" src="img/sec_3img.png" alt="about-image" />

					<!-- Video Link -->

				</div>
			</div>

		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-2 -->


<!-- TESTIMONIALS-1
			============================================= -->
<section id="reviews-1" class="wide-100 reviews-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">

				<!-- Title -->
				<h2 class="h2-xs darkblue-color">What Our Clients Say</h2>

				<!-- Text -->


			</div>
		</div> <!-- END SECTION TITLE -->


		<!-- TESTIMONIALS CONTENT -->
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme reviews-holder">
					<?php
					$slider = db_query("select * from  tbl_testimonial where test_status='Active'");

					while ($row = mysqli_fetch_array($slider)) { ?>

						<!-- TESTIMONIAL #1 -->
						<div class="review-1">

							<!-- Testimonial Author -->
							<div class="author-data clearfix">

								<!-- Author Avatar -->
								<div class="testimonial-avatar">
									<img src="test_images/<?php echo $row['test_image_name']; ?>">
								</div>

								<!-- Author Data -->
								<div class="review-author">
									<h5 class="h5-sm"><?php echo $row['test_given_by']; ?></h5>
									<span>(<?php echo $row['test_comp_name']; ?>)</span>
								</div>

							</div> <!-- End Testimonial Author -->

							<!-- Testimonial Text -->
							<p> <?php echo $row['test_description']; ?>
							</p>

						</div>

					<?php } ?>



				</div>
			</div>
		</div> <!-- END TESTIMONIALS CONTENT -->


	</div> <!-- End container -->
</section> <!-- END TESTIMONIALS-1 -->













<!-- CALL TO ACTION-4
				============================================= -->
<section id="cta-4" class="bg-fixed cta-section division">
	<div class="container white-color">
		<div class="row d-flex align-items-center">


			<!-- CALL TO ACTION TEXT -->
			<div class="col-md-8 col-lg-7 offset-md-4 offset-lg-5">
				<div class="cta-txt">

					<!-- Title  -->
					<h3 class="h3-xl">Consultations for prospective immigrants</h3>

					<!-- Text -->
					<p class="p-lg">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero
						tempus, and blandit ligula varius
					</p>

					<!-- Button  -->
					<a href="mailto:youremail@mail.com" class="btn btn-md btn-primary tra-white-hover btn-arrow">
						<span>Get Consultation <i class="fas fa-arrow-right"></i></span>
					</a>

				</div>
			</div>


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END CALL TO ACTION-4 -->
<?php include('inc/footer.php'); ?>