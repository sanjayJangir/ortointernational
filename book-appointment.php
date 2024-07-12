<?php include("inc/header.php"); ?>
<?php
include_once 'includes/dbsmain.inc.php'; ?>
<?php include_once 'site-main-query.php'; ?>
<?php
date_default_timezone_set("asia/kolkata");
$currDate = date('Y-m-d');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

function sanitize_data($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($GLOBALS['dbcon'], $data);
	return $data;
}


if (isset($_REQUEST['submit'])) {
	$firstname = $lastname = $email = $phone = $message = '';
	$name = sanitize_data($_REQUEST['firstname']) .  sanitize_data($_REQUEST['lastname']);
	$email = sanitize_data($_REQUEST['email']);
	$phone = sanitize_data($_REQUEST['phonenumber']);
	$age = sanitize_data($_REQUEST['age']);
	$MaritialStatus = sanitize_data($_REQUEST['MaritialStatus']);
	$Citizenship = sanitize_data($_REQUEST['Citizenship']);
	$Country = sanitize_data($_REQUEST['Country']);
	$Visa = sanitize_data($_REQUEST['Visa']);
	$message = sanitize_data($_REQUEST['message']);


	date_default_timezone_set("asia/kolkata");
	$currDate = date('Y-m-d');
	$sql = "INSERT INTO tbl_appointment SET enquiry_name='$name',enquiry_email='$email',enquiry_mobile='$phone',enquiry_comp_name='$age',enquiry_subject='$MaritialStatus',enquiry_detail='$Citizenship',enquiry_source='$Country',Visa='$Visa',enquiry_address='$message',enquiry_add_date='$currDate'";
	db_query($sql);

	if ($sql) {
		echo '<script>alert("Thankyou !! Your Appointment Submitted")</script>';
		echo "<script>window.location.href='index.php'</script>";

		$msg = "Query Sent. We will contact you shortly";
	} else {
		echo '<script>alert("Your Appointment Not  submitted")</script>';
		$error = "Something went wrong. Please try again";
	}
}




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
							<li class="breadcrumb-item active" aria-current="page">Our team</li>
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
				$about = db_query("select * from  tbl_site_pages where site_pages_id='90'");

				while ($row = mysqli_fetch_array($about)) { ?>

					<!-- ABOUT IMAGE -->
					<div class="col-md-6">
						<div class="about-img text-center mb-40">

							<!-- Image -->
							<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_image_name']; ?>">


						</div>
					</div>


					<!-- ABOUT TEXT	-->
					<div class="col-md-6">
						<div class="about-2-txt pc-20 mb-40">


							<!-- Section ID -->


							<!-- Title -->
							<h2 class="h2-xs darkblue-color"><?php echo  $row['site_pages_title']; ?></h2>

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




<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
	}

	.flip-box {
		background-color: transparent;
		width: 300px;
		height: 200px;
		border: 1px solid #f1f1f1;
		perspective: 1000px;

	}

	.flip-box-inner {
		position: relative;
		width: 100%;
		height: 100%;
		text-align: center;
		transition: transform 0.8s;
		transform-style: preserve-3d;

	}

	.flip-box:hover .flip-box-inner {
		transform: rotateY(180deg);
	}

	.flip-box-front,
	.flip-box-back {
		position: absolute;
		width: 100%;
		height: 100%;
		-webkit-backface-visibility: hidden;
		backface-visibility: hidden;
		border-radius: 25px !important;
	}

	.flip-box-front {
		background-color: #2765bf;
		color: white;
		min-height: 300px;
		border-radius: 25px !important;
	}

	.flip-box-back {
		background-color: #fa9f1a;
		color: white;
		transform: rotateY(180deg);
		font-size: 10px;
		padding: 20px;
		box-shadow: 0px 0px 40px #fa9f1a;
		min-height: 300px;
		border-radius: 25px !important;
	}

	.card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		transition: 0.3s;
		width: 100%;
		color: black;
	}

	.card:hover {
		box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
	}

	.container {
		padding: 2px 16px;
	}

	@media screen and (max-width: 480px) {
		.flip-box {

			margin-top: 150px;
		}
	}
</style>







<!-- SERVICES-7
				============================================= -->
<section id="services-7" class="wide-60 services-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">

				<!-- Title -->
				<h2 class="h2-xs blue">What Would You like to find out</h2>

				<!-- Text -->


			</div>
		</div>
	</div>
	<!-- END SECTION TITLE -->
</section>


<!-- SERVICES-3
				============================================= -->
<section id="services-3" class="wide-60 services-section division">
	<div class="container">
		<div class="row">


			<!-- SERVICE BOX #1 -->
			<div class="col-md-6 col-lg-4">
				<div class="flip-box">
					<div class="flip-box-inner">
						<div class="flip-box-front">
							<p style="margin-top:130px;"><b>WORK PERMIT</b></p>



						</div>

						<div class="flip-box-back">

							<p style="font-size:11px; text-align:center; margin-top:100px;">
								You may be eligible to qualify and find a job that suits your skills, experience, and language proficiency. Contact us to see if you need a work permit and find possible options in India.</p>
						</div>
					</div>


				</div>
			</div>
			<!-- SERVICE BOX #2 -->
			<div class="col-md-6 col-lg-4">
				<div class="flip-box">
					<div class="flip-box-inner">
						<div class="flip-box-front">
							<p style="margin-top:130px;"><b> FAMILY IMMIGRATIONS </b></p>

						</div>
						<div class="flip-box-back">

							<p style="font-size:11px; text-align:center;margin-top:100px;">If you are a Canadian citizen or permanent resident, you may be eligible to sponsor your spouse, common-law, dependent children, parents, and grandparents.</p>
						</div>
					</div>


				</div>
			</div>

			<!-- SERVICE BOX #2 -->
			<div class="col-md-6 col-lg-4">
				<div class="flip-box">
					<div class="flip-box-inner">
						<div class="flip-box-front">


							<p style="margin-top:130px;"><b> IMMIGRATIONS PROGRAMS</b></p>

						</div>
						<div class="flip-box-back">

							<p style="font-size:11px; text-align:center;margin-top:100px;">India offers more than 60 immigration programs. Choosing the program that’s right for you can be overwhelming. That is why Orto is here every step of the way.</p>
						</div>
					</div>
				</div>
			</div>

			<br>
			<br>
			<br>
			<br>
			<br>
			<br>




			<!-- SERVICE BOX #2 -->
			<div class="col-md-6 col-lg-4">
				<div class="flip-box" style="margin-top:250px;">
					<div class="flip-box-inner">
						<div class="flip-box-front">


							<p style="margin-top:130px;"><b> VISITOR VISA</b></p>
						</div>
						<div class="flip-box-back">

							<p style="font-size:11px; text-align:center;margin-top:100px;">India is known for its natural beauty, scenic landscapes, and multicultural cities. Whether you explore the wild pacific trail or stroll through Old Quebec City, India won't disappoint.</p>
						</div>
					</div>
				</div>
			</div>


			<!-- SERVICE BOX #2 -->
			<div class="col-md-6 col-lg-4">
				<div class="flip-box" style="margin-top:250px;">
					<div class="flip-box-inner">
						<div class="flip-box-front sb-box">
							<p style="margin-top:130px;"><b> STUDENT VISA</b></p>
						</div>
						<div class="flip-box-back">

							<p style="font-size:11px; text-align:center;margin-top:100px;">Graduate with an internationally recognized degree from some of the best institutions in the world. During and after graduation you may be eligible to work and gain valuable experience in India.</p>
						</div>
					</div>
				</div>
			</div>








		</div>
	</div>
</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<section id="contacts-4" class="bg-lightgrey wide-80 contacts-section division">
	<div class="container">




		<div class="row">
			<div class="col-lg-5">

				<?php
				$about = db_query("select * from  tbl_site_pages where site_pages_id='90'");

				while ($row = mysqli_fetch_array($about)) { ?>

					<!-- ABOUT IMAGE -->

					<div class="about-img text-center mb-40">

						<!-- Image -->
						<img class="img-fluid" src="static_files/<?php echo  $row['site_pages_inner_banner']; ?>">


					<?php } ?>



					</div>
			</div>


			<!-- CONTACT FORM -->
			<div class="col-lg-7">
				<div class="form-holder">
					<form name="contactForm" class="row contact-form" method="post" action="book-appointment.php">

						<!-- Contact Form Input -->
						<div id="input-name" class="col-lg-6">
							<input type="text" name="firstname" class="form-control name" placeholder="Enter Your First Name*" required>
						</div>
						<div id="input-name" class="col-lg-6">
							<input type="text" name="lastname" class="form-control name" placeholder="Enter Your Last Name*" required>
						</div>

						<!-- Contact Form Input -->
						<div id="input-email" class="col-lg-6">
							<input type="text" name="email" class="form-control email" placeholder="Enter Your Email*" required>
						</div>

						<!-- Contact Form Input -->
						<div id="input-email" class="col-lg-6">
							<input type="text" name="phonenumber" class="form-control number" placeholder="Enter Your Phone Number*" required>
						</div>

						<!-- Contact Form Input -->
						<div id="input-email" class="col-lg-6">
							<input type="text" name="age" class="form-control age" placeholder="Enter Your Current Age*" required>
						</div>

						<!-- Contact Form Input -->
						<div id="input-subject" class="col-lg-6 input-subject">
							<select id="inlineFormCustomSelect2" name="MaritialStatus" class="custom-select subject" required>
								<option value="">Maritial Status..</option>
								<option>Single</option>
								<option>Married</option>
								<option>Common-Law Patner</option>
								<option>Conjugal Patners</option>

							</select>
						</div>

						<!-- Contact Form Select -->
						<div id="input-subject" class="col-lg-6 input-subject">
							<select id="inlineFormCustomSelect2" name="Citizenship" class="custom-select subject" required>
								<option value="">Country Of Citizenship?*</option>
								<option value='-None-'>-None-</option>
								<option value='No;Country'>No Country</option>
								<option value='Afghanistan'>Afghanistan</option>
								<option value='Albania'>Albania</option>
								<option value='Algeria'>Algeria</option>
								<option value='American;Samoa'>American Samoa</option>
								<option value='Andorra'>Andorra</option>
								<option value='Angola'>Angola</option>
								<option value='Anguilla'>Anguilla</option>
								<option value='Antarctica'>Antarctica</option>
								<option value='Antigua;and;Barbuda'>Antigua and Barbuda</option>
								<option value='Argentina'>Argentina</option>
								<option value='Armenia'>Armenia</option>
								<option value='Aruban'>Aruban</option>
								<option value='Australia'>Australia</option>
								<option value='Austria'>Austria</option>
								<option value='Azerbaijan'>Azerbaijan</option>
								<option value='Bahamas'>Bahamas</option>
								<option value='Bahrain'>Bahrain</option>
								<option value='Bangladesh'>Bangladesh</option>
								<option value='Barbados'>Barbados</option>
								<option value='Belarus'>Belarus</option>
								<option value='Belgium Dutch'>Belgium Dutch</option>
								<option value='Belgium French'>Belgium French </option>
								<option value='Belize'>Belize</option>
								<option value='Benin'>Benin</option>
								<option value='Bermuda'>Bermuda</option>
								<option value='Bhutan'>Bhutan</option>
								<option value='Bolivia'>Bolivia</option>
								<option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
								<option value='Botswana'>Botswana</option>
								<option value='Bouvet Island'>Bouvet Island</option>
								<option value='Brazil'>Brazil</option>
								<option value='British Indian Ocean Territory'>British Indian Ocean Territory</option>
								<option value='British Virgin Islands'>British Virgin Islands</option>
								<option value='Brunei'>Brunei</option>
								<option value='Bulgaria'>Bulgaria</option>
								<option value='Burkina Faso'>Burkina Faso</option>
								<option value='Burundi'>Burundi</option>
								<option value='Cambodia'>Cambodia</option>
								<option value='Cameroon'>Cameroon</option>
								<option value='India'>India</option>
								<option value='Cape Verde'>Cape Verde</option>
								<option value='Cayman Islands'>Cayman Islands</option>
								<option value='Central African Republic'>Central African Republic</option>
								<option value='Chad'>Chad</option>
								<option value='Chile'>Chile</option>
								<option value='China'>China</option>
								<option value='Christmas Island'>Christmas Island</option>
								<option value='Cocos Islands'>Cocos Islands</option>
								<option value='Colombia'>Colombia</option>
								<option value='Comoros'>Comoros</option>
								<option value='Congo'>Congo</option>
								<option value='Cook Islands'>Cook Islands</option>
								<option value='Costa Rica'>Costa Rica</option>
								<option value='Croatia'>Croatia</option>
								<option value='Cuba'>Cuba</option>
								<option value='Cyprus'>Cyprus</option>
								<option value='Czech Republic'>Czech Republic</option>
								<option value='Cote Ivoire'>Cote Ivoire</option>
								<option value='Denmark'>Denmark</option>
								<option value='Djibouti'>Djibouti</option>
								<option value='Dominica'>Dominica</option>
								<option value='Dominican Republic'>Dominican Republic</option>
								<option value='Ecuador'>Ecuador</option>
								<option value='Egypt'>Egypt</option>
								<option value='El Salvador'>El Salvador</option>
								<option value='Equatorial Guinea'>Equatorial Guinea</option>
								<option value='Eritrea'>Eritrea</option>
								<option value='Estonia'>Estonia</option>
								<option value='Ethiopia'>Ethiopia</option>
								<option value='Falkland Islands'>Falkland Islands</option>
								<option value='Faroe Islands'>Faroe Islands</option>
								<option value='Fiji'>Fiji</option>
								<option value='Finland'>Finland</option>
								<option value='France'>France</option>
								<option value='French Guiana'>French Guiana</option>
								<option value='French Polynesia'>French Polynesia</option>
								<option value='French Southern Territories'>French Southern Territories</option>
								<option value='Gabon'>Gabon</option>
								<option value='Gambia'>Gambia</option>
								<option value='Georgia'>Georgia</option>
								<option value='Germany'>Germany</option>
								<option value='Ghana'>Ghana</option>
								<option value='Gibraltar'>Gibraltar</option>
								<option value='Greece'>Greece</option>
								<option value='Greenland'>Greenland</option>
								<option value='Grenada'>Grenada</option>
								<option value='Guadeloupe'>Guadeloupe</option>
								<option value='Guam'>Guam</option>
								<option value='Guatemala'>Guatemala</option>
								<option value='Guernsey'>Guernsey</option>
								<option value='Guinea'>Guinea</option>
								<option value='GuineaBissau'>GuineaBissau</option>
								<option value='Guyana'>Guyana</option>
								<option value='Haiti'>Haiti</option>
								<option value='Heard Island and McDonald Islands'>Heard Island and McDonald Islands</option>
								<option value='Honduras'>Honduras</option>
								<option value='Hong Kong'>Hong Kong</option>
								<option value='Hungary'>Hungary</option>
								<option value='Iceland'>Iceland</option>
								<option value='India'>India</option>
								<option value='Indonesia'>Indonesia</option>
								<option value='Iran'>Iran</option>
								<option value='Iraq'>Iraq</option>
								<option value='Ireland'>Ireland</option>
								<option value='Israel'>Israel</option>
								<option value='Italy'>Italy</option>
								<option value='Jamaica'>Jamaica</option>
								<option value='Japan'>Japan</option>
								<option value='Jersey'>Jersey</option>
								<option value='Jordan'>Jordan</option>
								<option value='Kazakhstan'>Kazakhstan</option>
								<option value='Kenya'>Kenya</option>
								<option value='Kiribati'>Kiribati</option>
								<option value='Kuwait'>Kuwait</option>
								<option value='Kyrgyzstan'>Kyrgyzstan</option>
								<option value='Laos'>Laos</option>
								<option value='Latvia'>Latvia</option>
								<option value='Lebanon'>Lebanon</option>
								<option value='Lesotho'>Lesotho</option>
								<option value='Liberia'>Liberia</option>
								<option value='Libya'>Libya</option>
								<option value='Liechtenstein'>Liechtenstein</option>
								<option value='Lithuania'>Lithuania</option>
								<option value='Luxembourg French'>Luxembourg French</option>
								<option value='Luxembourg German'>Luxembourg German </option>
								<option value='Macao'>Macao</option>
								<option value='Macedonia'>Macedonia</option>
								<option value='Madagascar'>Madagascar</option>
								<option value='Malawi'>Malawi</option>
								<option value='Malaysia'>Malaysia</option>
								<option value='Maldives'>Maldives</option>
								<option value='Mali'>Mali</option>
								<option value='Malta'>Malta</option>
								<option value='Marshall Islands'>Marshall Islands</option>
								<option value='Martinique'>Martinique</option>
								<option value='Mauritania'>Mauritania</option>
								<option value='Mauritius'>Mauritius</option>
								<option value='Mayotte'>Mayotte</option>
								<option value='Mexico'>Mexico</option>
								<option value='Micronesia'>Micronesia</option>
								<option value='Moldova'>Moldova</option>
								<option value='Monaco'>Monaco</option>
								<option value='Mongolia'>Mongolia</option>
								<option value='Montenegro'>Montenegro</option>
								<option value='Montserrat'>Montserrat</option>
								<option value='Morocco'>Morocco</option>
								<option value='Mozambique'>Mozambique</option>
								<option value='Myanmar'>Myanmar</option>
								<option value='Namibia'>Namibia</option>
								<option value='Nauru'>Nauru</option>
								<option value='Nepal'>Nepal</option>
								<option value='Netherlands'>Netherlands</option>
								<option value='Netherlands Antilles'>Netherlands Antilles</option>
								<option value='New Caledonia'>New Caledonia</option>
								<option value='New Zealand'>New Zealand</option>
								<option value='Nicaragua'>Nicaragua</option>
								<option value='Niger'>Niger</option>
								<option value='Nigeria'>Nigeria</option>
								<option value='Niue'>Niue</option>
								<option value='Norfolk Island'>Norfolk Island</option>
								<option value='North Korea'>North Korea</option>
								<option value='Northern Ireland'>Northern Ireland</option>
								<option value='Northern Mariana Islands'>Northern Mariana Islands</option>
								<option value='Norway'>Norway</option>
								<option value='Oman'>Oman</option>
								<option value='Pakistan'>Pakistan</option>
								<option value='Palau'>Palau</option>
								<option value='Palestine'>Palestine</option>
								<option value='Panama'>Panama</option>
								<option value='Papua New Guinea'>Papua New Guinea</option>
								<option value='Paraguay'>Paraguay</option>
								<option value='Peru'>Peru</option>
								<option value='Philippines'>Philippines</option>
								<option value='Pitcairn'>Pitcairn</option>
								<option value='Poland'>Poland</option>
								<option value='Portugal'>Portugal</option>
								<option value='Puerto Rico'>Puerto Rico</option>
								<option value='Qatar'>Qatar</option>
								<option value='Reunion'>Reunion</option>
								<option value='Romania'>Romania</option>
								<option value='Russia'>Russia</option>
								<option value='Rwanda'>Rwanda</option>
								<option value='Saint Helena'>Saint Helena</option>
								<option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
								<option value='Saint Lucia'>Saint Lucia</option>
								<option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon</option>
								<option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
								<option value='Samoa'>Samoa</option>
								<option value='San Marino'>San Marino</option>
								<option value='Sao Tome and Principe'>Sao Tome and Principe</option>
								<option value='Saudi Arabia'>Saudi Arabia</option>
								<option value='Senegal'>Senegal</option>
								<option value='Serbia'>Serbia</option>
								<option value='Serbia and Montenegro'>Serbia and Montenegro</option>
								<option value='Seychelles'>Seychelles</option>
								<option value='Sierra Leone'>Sierra Leone</option>
								<option value='Singapore'>Singapore</option>
								<option value='Slovakia'>Slovakia</option>
								<option value='Slovenia'>Slovenia</option>
								<option value='Solomon Islands'>Solomon Islands</option>
								<option value='Somalia'>Somalia</option>
								<option value='South Africa'>South Africa</option>
								<option value='South Georgia and the  South  Sandwich  Islands'>South Georgia and the South Sandwich Islands</option>
								<option value='South  Korea'>South Korea</option>
								<option value='Spain'>Spain</option>
								<option value='Sri  Lanka'>Sri Lanka</option>
								<option value='Sudan'>Sudan</option>
								<option value='Suriname'>Suriname</option>
								<option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option>
								<option value='Swaziland'>Swaziland</option>
								<option value='Sweden'>Sweden</option>
								<option value='Switzerland French'>Switzerland French</option>
								<option value='Switzerland German'>Switzerland German</option>
								<option value='Switzerland Italan'>Switzerland Italian</option>
								<option value='Syria'>Syria</option>
								<option value='Taiwan'>Taiwan</option>
								<option value='Tajikistan'>Tajikistan</option>
								<option value='Tanzania'>Tanzania</option>
								<option value='Thailand'>Thailand</option>
								<option value='The Democratic Republic of Congo'>The Democratic Republic of Congo</option>
								<option value='Timor-Leste'>Timor-Leste</option>
								<option value='Togo'>Togo</option>
								<option value='Tokelau'>Tokelau</option>
								<option value='Tonga'>Tonga</option>
								<option value='Trinidad  and Tobago'>Trinidad and Tobago</option>
								<option value='Tunisia'>Tunisia</option>
								<option value='Turkey'>Turkey</option>
								<option value='Turkmenistan'>Turkmenistan</option>
								<option value='Turks and CaicosIslands'>Turks and Caicos Islands</option>
								<option value='Tuvalu'>Tuvalu</option>
								<option value='Virgin Islands'>Virgin Islands</option>
								<option value='Uganda'>Uganda</option>
								<option value='Ukraine'>Ukraine</option>
								<option value='United Arab Emirates'>United Arab Emirates</option>
								<option value='United Kingdom'>United Kingdom</option>
								<option value='United States'>United States</option>
								<option value='United StatesMinor OutlyingIslands'>United States Minor Outlying Islands</option>
								<option value='Uruguay'>Uruguay</option>
								<option value='Uzbekistan'>Uzbekistan</option>
								<option value='Vanuatu'>Vanuatu</option>
								<option value='Vatican'>Vatican</option>
								<option value='Venezuela'>Venezuela</option>
								<option value='Vietnam'>Vietnam</option>
								<option value='Wallis and Futuna'>Wallis and Futuna</option>
								<option value='Western Sahara'>Western Sahara</option>
								<option value='Yemen'>Yemen</option>
								<option value='Zambia'>Zambia</option>
								<option value='Zimbabwe'>Zimbabwe</option>
								<option value='Aland& Islands'>Aland Islands</option>
							</select>
						</div>
						<!-- Contact Form Select -->
						<div id="input-subject" class="col-lg-6 input-subject">
							<select id="inlineFormCustomSelect2" name="Country" class="custom-select subject" required>
								<option value="">Country Of Residence?*</option>
								<option value='Afghanistan'>Afghanistan</option>
								<option value='Albania'>Albania</option>
								<option value='Algeria'>Algeria</option>
								<option value='American Samoa'>American Samoa</option>
								<option value='Andorra'>Andorra</option>
								<option value='Angola'>Angola</option>
								<option value='Anguilla'>Anguilla</option>
								<option value='Antarctica'>Antarctica</option>
								<option value='Antigua and Barbuda'>Antigua and Barbuda</option>
								<option value='Argentina'>Argentina</option>
								<option value='Armenia'>Armenia</option>
								<option value='Aruban'>Aruban</option>
								<option value='Australia'>Australia</option>
								<option value='Austria'>Austria</option>
								<option value='Azerbaijan'>Azerbaijan</option>
								<option value='Bahamas'>Bahamas</option>
								<option value='Bahrain'>Bahrain</option>
								<option value='Bangladesh'>Bangladesh</option>
								<option value='Barbados'>Barbados</option>
								<option value='Belarus'>Belarus</option>
								<option value='Belgium Dutch '>Belgium Dutch </option>
								<option value='Belgium  French '>Belgium French</option>
								<option value='Belize'>Belize</option>
								<option value='Benin'>Benin</option>
								<option value='Bermuda'>Bermuda</option>
								<option value='Bhutan'>Bhutan</option>
								<option value='Bolivia'>Bolivia</option>
								<option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
								<option value='Botswana'>Botswana</option>
								<option value='Bouvet Island'>Bouvet Island</option>
								<option value='Brazil'>Brazil</option>
								<option value='British Indian Ocean Territory'>British Indian Ocean Territory</option>
								<option value='British Virgin Islands'>British Virgin Islands</option>
								<option value='Brunei'>Brunei</option>
								<option value='Bulgaria'>Bulgaria</option>
								<option value='Burkina Faso'>Burkina Faso</option>
								<option value='Burundi'>Burundi</option>
								<option value='Cambodia'>Cambodia</option>
								<option value='Cameroon'>Cameroon</option>
								<option value='India'>India</option>
								<option value='Cape Verde'>Cape Verde</option>
								<option value='Cayman Islands'>Cayman Islands</option>
								<option value='Central African Republic'>Central African Republic</option>
								<option value='Chad'>Chad</option>
								<option value='Chile'>Chile</option>
								<option value='China'>China</option>
								<option value='Christmas Island'>Christmas Island</option>
								<option value='Cocos Islands'>Cocos Islands</option>
								<option value='Colombia'>Colombia</option>
								<option value='Comoros'>Comoros</option>
								<option value='Congo'>Congo</option>
								<option value='Cook Islands'>Cook Islands</option>
								<option value='Costa Rica'>Costa Rica</option>
								<option value='Croatia'>Croatia</option>
								<option value='Cuba'>Cuba</option>
								<option value='Cyprus'>Cyprus</option>
								<option value='Czech Republic'>Czech Republic</option>
								<option value='Cote Ivoire'>Cote Ivoire</option>
								<option value='Denmark'>Denmark</option>
								<option value='Djibouti'>Djibouti</option>
								<option value='Dominica'>Dominica</option>
								<option value='Dominican Republic'>Dominican Republic</option>
								<option value='Ecuador'>Ecuador</option>
								<option value='Egypt'>Egypt</option>
								<option value='El Salvador'>El Salvador</option>
								<option value='Equatorial Guinea'>Equatorial Guinea</option>
								<option value='Eritrea'>Eritrea</option>
								<option value='Estonia'>Estonia</option>
								<option value='Ethiopia'>Ethiopia</option>
								<option value='Falkland Islands'>Falkland Islands</option>
								<option value='Faroe Islands'>Faroe Islands</option>
								<option value='Fiji'>Fiji</option>
								<option value='Finland'>Finland</option>
								<option value='France'>France</option>
								<option value='French Guiana'>French Guiana</option>
								<option value='French Polynesia'>French Polynesia</option>
								<option value='French Southern Territories'>French Southern Territories</option>
								<option value='Gabon'>Gabon</option>
								<option value='Gambia'>Gambia</option>
								<option value='Georgia'>Georgia</option>
								<option value='Germany'>Germany</option>
								<option value='Ghana'>Ghana</option>
								<option value='Gibraltar'>Gibraltar</option>
								<option value='Greece'>Greece</option>
								<option value='Greenland'>Greenland</option>
								<option value='Grenada'>Grenada</option>
								<option value='Guadeloupe'>Guadeloupe</option>
								<option value='Guam'>Guam</option>
								<option value='Guatemala'>Guatemala</option>
								<option value='Guernsey'>Guernsey</option>
								<option value='Guinea'>Guinea</option>
								<option value='GuineaBissau'>GuineaBissau</option>
								<option value='Guyana'>Guyana</option>
								<option value='Haiti'>Haiti</option>
								<option value='Heard Island and McDonald Islands'>Heard Island and McDonald Islands</option>
								<option value='Honduras'>Honduras</option>
								<option value='Hong Kong'>Hong Kong</option>
								<option value='Hungary'>Hungary</option>
								<option value='Iceland'>Iceland</option>
								<option value='India'>India</option>
								<option value='Indonesia'>Indonesia</option>
								<option value='Iran'>Iran</option>
								<option value='Iraq'>Iraq</option>
								<option value='Ireland'>Ireland</option>
								<option value='Israel'>Israel</option>
								<option value='Italy'>Italy</option>
								<option value='Jamaica'>Jamaica</option>
								<option value='Japan'>Japan</option>
								<option value='Jersey'>Jersey</option>
								<option value='Jordan'>Jordan</option>
								<option value='Kazakhstan'>Kazakhstan</option>
								<option value='Kenya'>Kenya</option>
								<option value='Kiribati'>Kiribati</option>
								<option value='Kuwait'>Kuwait</option>
								<option value='Kyrgyzstan'>Kyrgyzstan</option>
								<option value='Laos'>Laos</option>
								<option value='Latvia'>Latvia</option>
								<option value='Lebanon'>Lebanon</option>
								<option value='Lesotho'>Lesotho</option>
								<option value='Liberia'>Liberia</option>
								<option value='Libya'>Libya</option>
								<option value='Liechtenstein'>Liechtenstein</option>
								<option value='Lithuania'>Lithuania</option>
								<option value='Luxembourg French'>Luxembourg French</option>
								<option value='Luxembourg German'>Luxembourg German</option>
								<option value='Macao'>Macao</option>
								<option value='Macedonia'>Macedonia</option>
								<option value='Madagascar'>Madagascar</option>
								<option value='Malawi'>Malawi</option>
								<option value='Malaysia'>Malaysia</option>
								<option value='Maldives'>Maldives</option>
								<option value='Mali'>Mali</option>
								<option value='Malta'>Malta</option>
								<option value='Marshall Islands'>Marshall Islands</option>
								<option value='Martinique'>Martinique</option>
								<option value='Mauritania'>Mauritania</option>
								<option value='Mauritius'>Mauritius</option>
								<option value='Mayotte'>Mayotte</option>
								<option value='Mexico'>Mexico</option>
								<option value='Micronesia'>Micronesia</option>
								<option value='Moldova'>Moldova</option>
								<option value='Monaco'>Monaco</option>
								<option value='Mongolia'>Mongolia</option>
								<option value='Montenegro'>Montenegro</option>
								<option value='Montserrat'>Montserrat</option>
								<option value='Morocco'>Morocco</option>
								<option value='Mozambique'>Mozambique</option>
								<option value='Myanmar'>Myanmar</option>
								<option value='Namibia'>Namibia</option>
								<option value='Nauru'>Nauru</option>
								<option value='Nepal'>Nepal</option>
								<option value='Netherlands'>Netherlands</option>
								<option value='Netherlands Antilles'>Netherlands Antilles</option>
								<option value='New Caledonia'>New Caledonia</option>
								<option value='New Zealand'>New Zealand</option>
								<option value='Nicaragua'>Nicaragua</option>
								<option value='Niger'>Niger</option>
								<option value='Nigeria'>Nigeria</option>
								<option value='Niue'>Niue</option>
								<option value='Norfolk Island'>Norfolk Island</option>
								<option value='North Korea'>North Korea</option>
								<option value='Northern Ireland'>Northern Ireland</option>
								<option value='Northern Mariana Islands'>Northern Mariana Islands</option>
								<option value='Norway'>Norway</option>
								<option value='Oman'>Oman</option>
								<option value='Pakistan'>Pakistan</option>
								<option value='Palau'>Palau</option>
								<option value='Palestine'>Palestine</option>
								<option value='Panama'>Panama</option>
								<option value='Papua New Guinea'>Papua New Guinea</option>
								<option value='Paraguay'>Paraguay</option>
								<option value='Peru'>Peru</option>
								<option value='Philippines'>Philippines</option>
								<option value='Pitcairn'>Pitcairn</option>
								<option value='Poland'>Poland</option>
								<option value='Portugal'>Portugal</option>
								<option value='Puerto Rico'>Puerto Rico</option>
								<option value='Qatar'>Qatar</option>
								<option value='Reunion'>Reunion</option>
								<option value='Romania'>Romania</option>
								<option value='Russia'>Russia</option>
								<option value='Rwanda'>Rwanda</option>
								<option value='Saint Helena'>Saint Helena</option>
								<option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
								<option value='Saint Lucia'>Saint Lucia</option>
								<option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon</option>
								<option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
								<option value='Samoa'>Samoa</option>
								<option value='San Marino'>San Marino</option>
								<option value='Sao Tome and Principe'>Sao Tome and Principe</option>
								<option value='Saudi Arabia'>Saudi Arabia</option>
								<option value='Senegal'>Senegal</option>
								<option value='Serbia'>Serbia</option>
								<option value='Serbia and Montenegro'>Serbia and Montenegro</option>
								<option value='Seychelles'>Seychelles</option>
								<option value='Sierra Leone'>Sierra Leone</option>
								<option value='Singapore'>Singapore</option>
								<option value='Slovakia'>Slovakia</option>
								<option value='Slovenia'>Slovenia</option>
								<option value='Solomon Islands'>Solomon Islands</option>
								<option value='Somalia'>Somalia</option>
								<option value='South Africa'>South Africa</option>
								<option value='South Georgia and the South Sandwich Islands'>South Georgia and the South Sandwich Islands</option>
								<option value='South Korea'>South Korea</option>
								<option value='Spain'>Spain</option>
								<option value='Sri Lanka'>Sri Lanka</option>
								<option value='Sudan'>Sudan</option>
								<option value='Suriname'>Suriname</option>
								<option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option>
								<option value='Swaziland'>Swaziland</option>
								<option value='Sweden'>Sweden</option>
								<option value='Switzerland French'>Switzerland French</option>
								<option value='Switzerland German'>Switzerland German</option>
								<option value='Switzerland Italan'>Switzerland Italian</option>
								<option value='Syria'>Syria</option>
								<option value='Taiwan'>Taiwan</option>
								<option value='Tajikistan'>Tajikistan</option>
								<option value='Tanzania'>Tanzania</option>
								<option value='Thailand'>Thailand</option>
								<option value='The Democratic Republic of Congo'>The Democratic Republic of Congo</option>
								<option value='Timor-Leste'>Timor-Leste</option>
								<option value='Togo'>Togo</option>
								<option value='Tokelau'>Tokelau</option>
								<option value='Tonga'>Tonga</option>
								<option value='Trinidad  and Tobago'>Trinidad and Tobago</option>
								<option value='Tunisia'>Tunisia</option>
								<option value='Turkey'>Turkey</option>
								<option value='Turkmenistan'>Turkmenistan</option>
								<option value='Turks and CaicosIslands'>Turks and Caicos Islands</option>
								<option value='Tuvalu'>Tuvalu</option>
								<option value='Virgin Islands'>Virgin Islands</option>
								<option value='Uganda'>Uganda</option>
								<option value='Ukraine'>Ukraine</option>
								<option value='United Arab Emirates'>United Arab Emirates</option>
								<option value='United Kingdom'>United Kingdom</option>
								<option value='United States'>United States</option>
								<option value='United StatesMinor OutlyingIslands'>United States Minor Outlying Islands</option>
								<option value='Uruguay'>Uruguay</option>
								<option value='Uzbekistan'>Uzbekistan</option>
								<option value='Vanuatu'>Vanuatu</option>
								<option value='Vatican'>Vatican</option>
								<option value='Venezuela'>Venezuela</option>
								<option value='Vietnam'>Vietnam</option>
								<option value='Wallis and Futuna'>Wallis and Futuna</option>
								<option value='Western Sahara'>Western Sahara</option>
								<option value='Yemen'>Yemen</option>
								<option value='Zambia'>Zambia</option>
								<option value='Zimbabwe'>Zimbabwe</option>
								<option value='Aland& Islands'>Aland Islands</option>
							</select>
						</div>


						<!-- Contact Form Select -->
						<div id="input-subject" class="col-lg-6 input-subject">
							<select id="inlineFormCustomSelect2" name="Visa" class="custom-select subject" required>
								<option value="">Your Question About..</option>
								<option>Student Visa</option>
								<option>Travel visa</option>
								<option>Working Visa</option>
								<option>Business Visa</option>
								<option>Visitor Visa</option>
								<option>Other...</option>
							</select>
						</div>

						<!-- Contact Form Mesaage -->
						<div id="input-message" class="col-lg-6 input-message">
							<textarea class="form-control message" name="message" rows="6" placeholder="Please tell us about yourself and your situation*..........." required></textarea>
						</div>

						<!-- Contact Form Button -->
						<div class="col-lg-12 mt-15 form-btn">
							<button type="submit" name="submit" class="btn btn-primary tra-black-hover submit">Submit</button>
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




<?php include("inc/footer.php") ?>