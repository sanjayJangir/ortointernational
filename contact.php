<?php include("inc/header.php");




?>



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
							<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
						</ol>
					</nav>
				</div>
			</div> <!-- End row -->
		</div> <!-- End container -->
	</div> <!-- END BREADCRUMB -->



	<section id="about-2" class="wide-60 about-section division">
		<div class="container">
			<div class="row d-flex align-items-center">
				<?php
				$about = db_query("select * from  tbl_site_pages where site_pages_id='11'");

				while ($row = mysqli_fetch_array($about)) { ?>

					<!-- ABOUT IMAGE -->
					<div class="col-md-6">
						<div class="about-img mb-40">

							<!-- Image -->
							<h2 class="h2-xs darkblue-color"><b><?php echo  $row['site_pages_title']; ?></b></h2>

							<!-- INFO BOX #1 -->
							<div class="box-list">
								<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
								<p><?php echo  $row['site_pages_description']; ?>
								</p>
							</div>


						</div>
					</div>


					<!-- ABOUT TEXT	-->
					<div class="col-md-6">
						<div class="about-2-txt pc-20 mb-40">


							<!-- Section ID -->

							<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_image_name']; ?>" alt="business-image" />
							<!-- Title -->


							<!-- INFO BOX #2 -->


							<!-- INFO BOX #3 -->



						</div>
					</div> <!-- END ABOUT TEXT	-->


			</div> <!-- End row -->
		</div> <!-- End container -->
	</section> <!-- END ABOUT-2 -->

<?php } ?>

<!-- CONTACTS-4
				============================================= -->
<section id="contacts-4" class="bg-lightgrey wide-80 contacts-section division">
	<div class="container">




		<div class="row">
			<?php
			$admin = db_query("select * from  tbl_admin  where admin_id='1'");

			while ($row3 = mysqli_fetch_array($admin)) { ?>
				<div class="col-lg-5">
					<div class="contact-boxes">


						<!-- LOCATION -->
						<div class="contact-box icon-xs clearfix mb-25">

							<!-- Icon -->
							<div class="contact-box-icon"><span class="flaticon-240-placeholder"></span></div>

							<!-- Text -->
							<div class="contact-box-txt">
								<h5 class="h5-sm deepblue-color"><?php echo $row3['admin_address']; ?></h5>

								<p class="grey-color">Our Location</p>
							</div>

						</div>


						<!-- PHONES -->
						<div class="contact-box icon-xs clearfix mb-25">

							<!-- Icon -->
							<div class="contact-box-icon"><span class="flaticon-172-telephone-1"></span></div>

							<!-- Text -->
							<div class="contact-box-txt">
								<h5 class="h5-sm deepblue-color"><?php echo $row3['admin_mobile']; ?></h5>
								<h5 class="h5-xs deepblue-color"><?php echo $row3['admin_phone']; ?></h5>
								<p class="grey-color">Let's Talk</p>
							</div>

						</div>


						<!-- EMAIL -->
						<div class="contact-box icon-xs clearfix">

							<!-- Icon -->
							<div class="contact-box-icon"><span class="flaticon-235-mail"></span></div>

							<!-- Text -->
							<div class="contact-box-txt">
								<h5 class="h5-xs deepblue-color"><a href="mailto:<?php echo $row3['admin_email']; ?>"><?php echo $row3['admin_email']; ?></a></h5>

								<p class="grey-color">Drop a Line</p>
							</div>

						</div>


					</div>
				</div>


				<!-- CONTACT FORM -->
				<div class="col-lg-7">
					<div class="form-holder">
						<form name="contactForm" class="row contact-form" method="post" action="requestForm.php">

							<!-- Contact Form Input -->
							<div id="input-name" class="col-lg-12">
								<input type="text" name="firstname" class="form-control name" placeholder="Enter Your First Name*" required>
							</div>

							<!-- Contact Form Input -->
							<div id="input-name" class="col-lg-12">
								<input type="text" name="lastname" class="form-control name" placeholder="Enter Your Last Name*" required>
							</div>


							<!-- Contact Form Input -->
							<div id="input-email" class="col-lg-12">
								<input type="text" name="email" class="form-control email" placeholder="Enter Your Email*" required>
							</div>

							<!-- Contact Form Select -->
							<div id="input-email" class="col-lg-12">
								<input type="text" name="phone" class="form-control phone" placeholder="Enter Your Phone Number*" required>
							</div>

							<!-- Contact Form Mesaage -->
							<div id="input-message" class="col-lg-12 input-message">
								<textarea class="form-control message" name="message" rows="6" placeholder="Your Message ..." required></textarea>
							</div>

							<!-- Contact Form Button -->
							<div class="col-lg-12 mt-15 form-btn">
								<button type="submit" name="submit" class="btn btn-primary tra-black-hover submit">Send Your Message</button>
							</div>

							<!-- Contact Form Message -->
							<div class="col-lg-12 contact-form-msg text-center">
								<div class="sending-msg"><span class="loading"></span></div>
							</div>

						</form>
					</div>
				</div> <!-- END CONTACT FORM -->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END CONTACTS-4 -->




<!-- GOOGLE MAP
				============================================= -->
<div class="map bg-lightgrey division">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="gmap" class="gmap">
					<?php echo $row3['admin_contactus_map_link']; ?>


				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	//$lastname=$_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$sql = db_query("INSERT INTO  tbl_enquiry(enquiry_name,enquiry_email,enquiry_mobiler,enquiry_address) VALUES(:name,:email,:phone,:message)");
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $name, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':phone', $contactno, PDO::PARAM_STR);
	$query->bindParam(':message', $message, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($sql) {
		echo '<script>alert("Your Enqury submitted")</script>';

		$msg = "Query Sent. We will contact you shortly";
	} else {
		echo '<script>alert("Your Enqury not  submitted")</script>';
		$error = "Something went wrong. Please try again";
	}
}
?>
<?php include("inc/footer.php") ?>