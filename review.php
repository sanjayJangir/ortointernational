<?php include("inc/header.php"); ?>


<!-- SERVICES-6
			============================================= -->
<section id="services-6" class="bg-lightgrey wide-100 services-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">

				<!-- Title -->
				<h2 class="h2-xs darkblue-color">Why Work With Bright Immigration?</h2>

				<!-- Text -->


			</div>
		</div>


		<div class="row d-flex align-items-center">


			<!-- SERVICE BOX #1 -->
			<div id="sb-01" class="col-md-6 col-lg-4 sb-box">
				<div class="sbox-6">

					<!-- Text -->
					<h5 class="h5-lg darkblue-color">50 + Years</h5>
					<p class="p-sm">Combined experience achieving temporary and permanent status in Canada for our clients.</p>



				</div>
			</div>


			<!-- SERVICE BOX #2 -->
			<div id="sb-02" class="col-md-6 col-lg-4 sb-box">
				<div class="sbox-6">

					<!-- Text -->
					<h5 class="h5-lg darkblue-color">Money Back Guarantee</h5>
					<p class="p-sm">
					<p>Our Services are Guaranteed, Bright Immigration Stands Behind Our Commitment to Processing Every Applicant's File.</p>




				</div>
			</div>


			<!-- SERVICE BOX #3 -->
			<div id="sb-03" class="col-md-6 col-lg-4 sb-box">
				<div class="sbox-6">

					<!-- Text -->
					<h5 class="h5-lg darkblue-color">Skilled Immigration</h5>
					<p class="p-sm">Porta semper lacus cursus a feugiat primis an ultrice dolor undo congue placerat</p>

					<!--Link -->


				</div>
			</div>


			<!-- SERVICE BOX #4 -->
			<div id="sb-04" class="col-md-6 col-lg-4 sb-box">
				<div class="sbox-6">

					<!-- Text -->
					<h5 class="h5-lg darkblue-color">Company Values</h5>
					<p class="p-sm">We are guided by our commitment to Integrity, Accountability, Knowledge, Creativity, and Client Care</p>

					<!--Link -->


				</div>
			</div>


			<!-- SERVICE BOX #5 -->
			<div id="sb-05" class="col-md-6 col-lg-4 sb-box">
				<div class="sbox-6">

					<!-- Text -->
					<h5 class="h5-lg darkblue-color">We Give Back</h5>
					<p class="p-sm">A portion of our profits are donated to the Brighter Together Charity.</p>

					<!--Link -->


				</div>
			</div>




		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END SERVICES-6 -->

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
								<!--<div class="testimonial-avatar">
											<img src="test_images/<?php //echo $row['test_image_name'];
																	?>">
										</div>-->

								<!-- Author Data -->
								<div class="review-author">
									<h5 class="h5-sm"><?php echo $row['test_given_by']; ?></h5>
									<span><? //php echo $row['test_comp_name'];
											?></span>
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
<?php include("inc/footer.php"); ?>