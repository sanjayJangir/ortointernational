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
							<li class="breadcrumb-item active" aria-current="page">Work</li>
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
				$about = db_query("select * from  tbl_site_pages where site_pages_id='82'");

				while ($row = mysqli_fetch_array($about)) { ?>

					<!-- ABOUT IMAGE -->
					<div class="col-md-6">
						<div class="about-img text-center mb-40">

							<!-- Image -->
							<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_image_name']; ?>" alt="business-image" />


						</div>
					</div>


					<!-- ABOUT TEXT	-->
					<div class="col-md-6">
						<div class="about-2-txt pc-20 mb-40">


							<!-- Section ID -->


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




<!-- ABOUT-2
				============================================= -->
<section id="about-2" class="wide-60 about-section division">
	<div class="container">
		<div class="row d-flex align-items-center">
			<?php
			$about = db_query("select * from  tbl_site_pages where site_pages_id='82'");

			while ($row = mysqli_fetch_array($about)) { ?>

				<!-- ABOUT IMAGE -->
				<div class="col-md-6">
					<div class="about-img text-center mb-40">
						<!-- Title -->
						<h4 class="h4-lg"><?php echo  $row['site_pages_title2']; ?></h4>

						<!-- INFO BOX #1 -->
						<div class="box-list">
							<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
							<p><?php echo  $row['site_pages_description2']; ?>
							</p>
						</div>



					</div>
				</div>


				<!-- ABOUT TEXT	-->
				<div class="col-md-6">
					<div class="about-2-txt pc-20 mb-40">


						<!-- Section ID -->


						<!-- Image -->
						<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_inner_banner']; ?>" alt="business-image" />

						<!-- INFO BOX #2 -->


						<!-- INFO BOX #3 -->



					</div>
				</div> <!-- END ABOUT TEXT	-->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-2 -->

<?php } ?>


<!-- ABOUT-2
				============================================= -->
<section id="about-2" class="wide-60 about-section division">
	<div class="container">
		<div class="row d-flex align-items-center">
			<?php
			$about = db_query("select * from  tbl_site_pages where site_pages_id='82'");

			while ($row = mysqli_fetch_array($about)) { ?>

				<!-- ABOUT IMAGE -->
				<div class="col-md-6">
					<div class="about-img text-center mb-40">
						<!-- Title -->
						<h4 class="h4-lg"><?php echo  $row['site_pages_title3']; ?></h4>

						<!-- INFO BOX #1 -->
						<div class="box-list">
							<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
							<p><?php echo  $row['site_pages_description3']; ?>
							</p>
						</div>



					</div>
				</div>


				<!-- ABOUT TEXT	-->
				<div class="col-md-6">
					<div class="about-2-txt pc-20 mb-40">


						<!-- Section ID -->


						<!-- Image -->
						<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_inner_banner3']; ?>" alt="business-image" />

						<!-- INFO BOX #2 -->


						<!-- INFO BOX #3 -->



					</div>
				</div> <!-- END ABOUT TEXT	-->


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






<!-- ABOUT-2
				============================================= -->
<section id="about-2" class="wide-60 about-section division">
	<div class="container">
		<div class="row d-flex align-items-center">
			<?php
			$about = db_query("select * from  tbl_site_pages where site_pages_id='82'");

			while ($row = mysqli_fetch_array($about)) { ?>

				<!-- ABOUT IMAGE -->
				<div class="col-md-6">
					<div class="about-img text-center mb-40">
						<!-- Title -->
						<h4 class="h4-lg"><?php echo  $row['site_pages_title5']; ?></h4>

						<!-- INFO BOX #1 -->
						<div class="box-list">
							<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
							<p><?php echo  $row['site_pages_description5']; ?>
							</p>
						</div>



					</div>
				</div>


				<!-- ABOUT TEXT	-->
				<div class="col-md-6">
					<div class="about-2-txt pc-20 mb-40">


						<!-- Section ID -->


						<!-- Image -->
						<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_inner_banner5']; ?>" alt="business-image" />

						<!-- INFO BOX #2 -->


						<!-- INFO BOX #3 -->



					</div>
				</div> <!-- END ABOUT TEXT	-->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END ABOUT-2 -->

<?php } ?>

<?php include('inc/footer.php'); ?>