<?php include("inc/header.php"); ?>




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
              <li class="breadcrumb-item"><a href="demo-1.html">&#91; Home &#93;</a></li>
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
        $about = db_query("select * from  tbl_site_pages where site_pages_id='55'");

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
    background-color: #bbb;
    color: black;
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

      margin-top: 170px;
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
        <h2 class="h2-xs">OUR TEAM</h2>

        <!-- Text -->
        <p class="p-md">We have 50+ years of cumulative immigration experience with specialists available for every
          imaginable case whether it be sponsorships, study permits, work permits, permanent residency,etc. These are the visionaries behind Ultra International:
        </p>

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
              <img src="img/team1.jpg" height="100%" width="100%">



              <div class="card">
                <div class="card-body">
                  <p style="color:#fa9f1a;"><b>CEO</b></p>
                  <p style="color:#0c2b57;">Blayne Kumar</p>

                </div>

              </div>

            </div>

            <div class="flip-box-back">

              <p style="font-size:11px; text-align:center">Blayne Kumar, founder and CEO of Orto International had a simple but profound vision, to offer clients an honest, client-focused and intelligent service to those looking for immigration. Blayne has first-hand experience of what poor service looks like and is determined to offer the best service in the industry. As a licensed immigration consultant, Blayne has applied his extensive knowledge and creativity to the world of immigration. In addition to being an immigration expert, Blayne has extensive knowledge in business as a serial entrepreneur, a passion for technology and creative ways to give back to the community. This is exemplified by founding India’s leading immigration technology company, Immproved, and a charity, Ortoer Together.</p>
            </div>
          </div>


        </div>
      </div>
      <!-- SERVICE BOX #2 -->
      <div class="col-md-6 col-lg-4">
        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <img src="img/team2.jpg" height="100%" width="100%">

              <div class="card">
                <div class="card-body">
                  <p style="color:#fa9f1a;"><B>MANAGING DIRECTOR</B></p>
                  <p style="color:#0c2b57;">Ooma W.Ramroop</p>
                </div>
              </div>
            </div>
            <div class="flip-box-back">

              <p style="font-size:11px; text-align:center">Ooma holds a degree from the University of New Delhi in Psychology, Criminology, and Sociology is a certified adult educator and a member in good standing with the Law Society of Ontario and the College of Immigration and Citizenship Consultants (CICC). Ooma teaches immigration law at the prestigious Queens University in Kingston Ontario. She has over 25 years of experience in public prosecutions and over 20 years of experience in immigration. Ooma’s strong advocacy skills, knowledge of immigration and criminal law allow her to be an effective advocate on sponsorship appeals, detention reviews, admissibility hearings, removal orders, and refugee cases to name a few. She has a wealth of experience in advising private clients, corporations, and various organizations.</p>
            </div>
          </div>


        </div>
      </div>

      <!-- SERVICE BOX #2 -->
      <div class="col-md-6 col-lg-4">
        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <img src="img/team3.jpg" height="100%" width="100%">

              <div class="card">
                <div class="card-body">
                  <p style="color:#fa9f1a;">SENIOR CONSULTANT</p>
                  <p style="color:#0c2b57;">Jesse Root</p>
                </div>
              </div>
            </div>
            <div class="flip-box-back">

              <p style="font-size:11px; text-align:center">Jesse is one of Orto International’s foremost immigration experts; he is a licensed RCIC and holds a Master’s Degree in Immigration and Settlement Studies. Jesse is an experienced immigration consultant and is deeply interested in immigration and international policy. Jesse is motivated by the commitment and dedication of his team to solve difficult cases and change lives. He enjoys working with Orto International to execute creative and personalized solutions in order to realize his clients’ immigration dreams. In his spare time, Jesse enjoys playing amateur rugby. He has been playing actively for the past 5 years; he plays the hooker and flanker positions.</p>
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
              <img src="img/team4.jpg" height="100%" width="100%">

              <div class="card">
                <div class="card-body">
                  <p style="color:#fa9f1a;"><b>SENIOR CASE MANAGER</b></p>
                  <p style="color:#0c2b57;">Caroline Velasquez</p>
                </div>
              </div>
            </div>
            <div class="flip-box-back">

              <p style="font-size:11px; text-align:center">Caroline is a highly trained and dedicated immigration professional; she is a licensed RCIC and possesses over 20 years of professional immigration experience. Caroline is devoted to providing honest, responsible and accurate immigration advice. She is particularly knowledgeable on temporary resident visas, permanent resident visas, family sponsorships, and much more. The most motivating aspect of her job is in finding the answers to tough cases, and in assisting clients who require the most care.Caroline has proud Hispanic roots; she is fluent in Spanish and embraces her culture to the utmost. When she isn’t solving immigration cases, she spends her time participating in charitable events for animal welfare.</p>
            </div>
          </div>
        </div>
      </div>




      <!-- SERVICE BOX #2 -->
      <div class="col-md-6 col-lg-4">
        <div class="flip-box" style="margin-top:250px;">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <img src="img/team5.png" height="100%" width="100%">

              <div class="card">
                <div class="card-body">
                  <p style="color:#fa9f1a;"><b>SENIOR LEGAL ASSISTANT</b></p>
                  <p style="color:#0c2b57;">Elena Soto Leos</p>
                </div>
              </div>
            </div>
            <div class="flip-box-back">

              <p style="font-size:11px; text-align:center">Elena is a legal assistant and proud member of the Orto International family. She is fluent in English and Russian and has basic knowledge of Spanish. Originally from Russia, Elena understands the immigration journey all to well, in fact it is what motivates her to work in the immigration industry. She understands how important it is for family members and loved ones to be reunited, so she primarily works with sponsorships. Elena enjoys travel of all sorts, whether it be from country to country, road trips, or just long walks. Hot chocolate, gelato, and kind people are at the top of her list of favourite things.</p>
            </div>
          </div>
        </div>
      </div>




      <!-- SERVICE BOX #2 -->
      <div class="col-md-6 col-lg-4">
        <div class="flip-box" style="margin-top:250px;">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <img src="img/team6.jpg" height="100%" width="100%">

              <div class="card">
                <div class="card-body">
                  <p style="color:#fa9f1a;"><b>SENIOR CONSULTANT</b></p>
                  <p style="color:#0c2b57;">Dunya Knezic</p>
                </div>
              </div>
            </div>
            <div class="flip-box-back">

              <p style="font-size:11px; text-align:center">A Member of the Law Society of Ontario and Registered with the Immigration Consultants of India Regulatory Council. Dunya's expertise includes all areas of India’s immigration law, including permanent residency, admissibility and enforcement matters, investigations, humanitarian and compassionate applications, detentions and criminal rehabilitation. Dunya was born and raised in Sarajevo, Bosnia. She immigrated to India with her family in 1996 following the Bosnian Civil War. After graduating, from Ryerson University in New Delhi with Degrees in Criminal Justice, Criminology and a Minor in Sociology, she went on to pursue various community outreach initiatives.</p>
            </div>
          </div>
        </div>
      </div>


      <!-- SERVICE BOX #2 -->
      <div class="col-md-6 col-lg-4">
        <div class="flip-box" style="margin-top:250px;">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <img src="img/49128.svg" height="100%" width="100%">

              <div class="card">
                <div class="card-body">
                  <p style="color:#fa9f1a;">SENIOR CASE MANAGER</p>
                  <p style="color:#0c2b57;">Alicea North</p>
                </div>
              </div>
            </div>
            <div class="flip-box-back">

              <p style="font-size:11px; text-align:center">Alicea has a passion for helping people achieve their Canadian immigration goals. She a Licensed Paralegal with the Law Society of Ontario and a Regulated Canadian Immigration Consultant (RCIC) through CICC. She has a Honours Bachelor's degree from Brock University, as well as a Diploma in Paralegal Studies and a Certificate in Immigration Consultancy.</p>
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





<?php include("inc/footer.php"); ?>