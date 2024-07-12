<?php include("inc/header.php");

?>




<!-- HERO-8
			============================================= -->

<section id="hero-8" class="hero-section division">



    <!-- SLIDER -->
    <div class="slider">
        <?php
        $slider = db_query("select * from  tbl_header_flash where header_flash_status='Active'");

        while ($row = mysqli_fetch_array($slider)) { ?>
            <ul class="slides">


                <!-- SLIDE #1 -->
                <li id="slide-<?php echo $row['header_flash_id']; ?>">

                    <!-- Background Image -->
                    <img src="flash_images/<?php echo $row['header_flash_image_name']; ?>" alt="<?php echo $row['header_flash_image_title']; ?>">

                    <!-- Image Caption -->
                    <div class="caption left-align d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-lg-6">
                                    <div class="caption-txt">

                                        <!-- Title -->
                                        <h2 class="primary-color"><?php echo  $row['header_flash_title']; ?></h2>

                                        <!-- Text -->
                                        <h4 class="h4-md darkblue-color">
                <li><?php echo  $row['header_flash_description']; ?></li></span>
                </h4>

    </div>
    </div>
    </div> <!-- End row -->
    </div> <!-- End container -->
    </div> <!-- End Image Caption -->

    </li> <!-- END SLIDE #1 -->

    </ul>
<?php } ?>
</div> <!-- END SLIDER -->


<!-- SLIDER NAV -->
<div class="hero-slider-nav icon-xs white-color">
    <div class="slider-btn">
        <a class="slide-prev"><span class="flaticon-442-left-arrow"></span></a>
        <a class="slide-next"><span class="flaticon-441-right-arrow"></span></a>
    </div>
</div>


</section> <!-- END HERO-8 -->




<!-- CALL TO ACTION-3
			============================================= -->
<section id="cta-3" class="bg-darkblue cta-section division">
    <div class="container white-color">
        <div class="row d-flex align-items-center">


            <!-- CALL TO ACTION TEXT -->
            <div class="col-lg-12">
                <div class="cta-txt text-center">
                    <h4 class="h4-xs txt-400">Need immigration & visa consultation? <a href="mailto:yourdomain@mail.com">Send a request</a> for free consultation</h4>
                </div>
            </div>


        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- END CALL TO ACTION-3 -->




<!-- ABOUT-2
			============================================= -->
<section id="about-2" class="wide-60 about-section division">
    <div class="container">
        <div class="row d-flex align-items-center">
            <?php
            $about = db_query("select * from  tbl_site_pages where site_pages_id='47'");

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
                        <span class="section-id id-color">About Agency</span>

                        <!-- Title -->
                        <h3 class="h3-lg darkblue-color"><?php echo  $row['site_pages_title']; ?></h3>

                        <!-- Text #1 -->
                        <div class="box-list">
                            <div class="box-list-icon"><i class="fas fa-genderless"></i></div>
                            <p><?php echo  $row['site_pages_description']; ?></p>
                        </div>
                        <a href="" class="btn btn-md btn-primary black-hover">
                            read more
                        </a>




                    </div>
                </div> <!-- END ABOUT TEXT	-->



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
                <h2 class="h2-xs darkblue-color">Why Work With Orto International?</h2>

                <!-- Text -->


            </div>
        </div>


        <div class="row d-flex align-items-center">


            <!-- SERVICE BOX #1 -->
            <div id="sb-01" class="col-md-6 col-lg-4 sb-box">
                <div class="sbox-6">

                    <!-- Text -->
                    <h5 class="h5-lg darkblue-color">50 + Years</h5>
                    <p class="p-sm">Combined experience achieving temporary and permanent status in India for our
                        clients.</p>



                </div>
            </div>


            <!-- SERVICE BOX #2 -->
            <div id="sb-02" class="col-md-6 col-lg-4 sb-box">
                <div class="sbox-6">

                    <!-- Text -->
                    <h5 class="h5-lg darkblue-color">Money Back Guarantee</h5>
                    <p class="p-sm">
                    <p>Our Services are Guaranteed, Orto International Stands Behind Our Commitment to Processing Every
                        Applicant's File.</p>




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
                    <p class="p-sm">We are guided by our commitment to Integrity, Accountability, Knowledge, Creativity,
                        and Client Care</p>

                    <!--Link -->


                </div>
            </div>


            <!-- SERVICE BOX #5 -->
            <div id="sb-05" class="col-md-6 col-lg-4 sb-box">
                <div class="sbox-6">

                    <!-- Text -->
                    <h5 class="h5-lg darkblue-color">We Give Back</h5>
                    <p class="p-sm">A portion of our profits are donated to the Ortoer Together Charity.</p>

                    <!--Link -->


                </div>
            </div>




        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- END SERVICES-6 -->
<style>
    @media screen and (max-width: 480px) {
        .center {

            margin-right: 50px;
            text-align: center;
        }
    }
</style>



<!-- TABS-2
			============================================= -->
<section>
    <div class="container">
        <div class="row">


            <div class="col-md-12 section-title center">


                <h2 class="h2-xs darkblue-color">Our Canadian Immigration Consultants Help With…?</h2>


            </div> <!-- END TABS CONTENT -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-3 center">
            <img src="img/icon1.svg">
            <BR><br>
            <h5>STUDY</h5>
        </div>

        <div class="col-lg-3 center">
            <img src="img/icon2.svg">
            <BR><br>
            <h5>VISIT</h5>
        </div>


        <div class="col-md-3 center">
            <img src="img/icon3.svg">
            <BR><br>
            <h5>WORK PERMIT</h5>
        </div>


        <div class="col-md-2 center">
            <img src="img/icon4.svg">
            <BR><br><br>
            <h5>SPONSORSHIP</h5>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-2 center">
            </div>
            <div class="col-md-2 center">
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="78.912" height="75.066" viewBox="0 0 78.912 75.066">
                            <g id="Group_3349" data-name="Group 3349" transform="translate(-137.61 -3730.121)">
                                <path id="Path_148" data-name="Path 148" d="M26.3,118.693c-11.3,0-17.541-7.654-22.151-15.142-.043-.072-1.289-2.28-1.805-3.4A28.447,28.447,0,0,1,0,88.885V77.344C0,67.163,6.915,63.425,11.8,62.606c1.085-2.477,4.383-6.215,14.434-6.468a31.4,31.4,0,0,1,5.09.307A2.37,2.37,0,0,1,33.413,59.1a2.445,2.445,0,0,1-2.8,1.983,25.861,25.861,0,0,0-4.258-.256c-7.74.194-10.025,2.724-10.15,4.035a2.532,2.532,0,0,1-2.413,2.252c-.891.028-8.861.563-8.861,10.228V88.885a23.887,23.887,0,0,0,1.96,9.44c.437.945,1.562,2.931,1.562,2.931C13.149,108.875,18.005,114,26.3,114c8.1,0,12.784-4.82,17.716-12.6s1.213-2.08,1.733-3.187a23.841,23.841,0,0,0,1.923-9.365,2.435,2.435,0,0,1,2.466-2.377,2.384,2.384,0,0,1,2.466,2.315,28.469,28.469,0,0,1-2.318,11.266c-.621,1.326-2,3.7-2,3.7C43.346,111.549,37.3,118.693,26.3,118.693Z" transform="translate(137.61 3686.494)" fill="#3d63ae"></path>
                                <path id="Path_149" data-name="Path 149" d="M7.631,136.447,6.4,134.395l-.963-2.158,5.225-2.205c.062-.025,7.283-3.222,7.283-9.146a2.378,2.378,0,0,1,2.012-2.3,2.491,2.491,0,0,1,2.755,1.461c.184.45,4.616,11.038,15.256,11.038a2.349,2.349,0,1,1,0,4.692c-8.388,0-13.754-4.792-16.765-8.783-2.815,4.836-8.227,7.194-8.532,7.325Z" transform="translate(133.448 3637.982)" fill="#3d63ae"></path>
                                <path id="Path_150" data-name="Path 150" d="M81.583,261.628a12.357,12.357,0,0,1-8.713-3.537,2.267,2.267,0,0,1,.059-3.319,2.56,2.56,0,0,1,3.489.053,7.562,7.562,0,0,0,10.337,0,2.56,2.56,0,0,1,3.489-.053,2.267,2.267,0,0,1,.059,3.319A12.4,12.4,0,0,1,81.583,261.628Z" transform="translate(82.334 3532.612)" fill="#3d63ae"></path>
                                <path id="Path_151" data-name="Path 151" d="M175.83,40.661c-11.784,0-21.372-9.121-21.372-20.33S164.046,0,175.83,0,197.2,9.121,197.2,20.33,187.615,40.661,175.83,40.661Zm0-35.969c-9.065,0-16.44,7.016-16.44,15.639s7.375,15.639,16.44,15.639,16.44-7.016,16.44-15.639S184.9,4.692,175.83,4.692Z" transform="translate(19.319 3730.121)" fill="#3d63ae"></path>
                                <path id="Path_152" data-name="Path 152" d="M211.395,70.855a2.512,2.512,0,0,1-1.743-.688,2.267,2.267,0,0,1,0-3.319l12.3-11.7a2.557,2.557,0,0,1,3.489,0,2.266,2.266,0,0,1,0,3.319l-12.3,11.7A2.526,2.526,0,0,1,211.395,70.855Z" transform="translate(-22.397 3687.794)" fill="#3d63ae"></path>
                                <path id="Path_153" data-name="Path 153" d="M223.7,70.855a2.512,2.512,0,0,1-1.743-.688l-12.3-11.7a2.267,2.267,0,0,1,0-3.319,2.557,2.557,0,0,1,3.489,0l12.3,11.7a2.266,2.266,0,0,1,0,3.319A2.525,2.525,0,0,1,223.7,70.855Z" transform="translate(-22.397 3687.794)" fill="#3d63ae"></path>
                            </g>
                        </svg>
                        <h3>Denied</h3>
                        <p>We Can Help!</p>
                    </li><br><br>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="80.022" height="73.74" viewBox="0 0 80.022 73.74">
                            <g id="Layer_2" data-name="Layer 2" transform="translate(-601.5 -300)">
                                <path id="Path_154" data-name="Path 154" d="M606.588,342.751v45.793s1.388,3.238,5.088.925l.463-26.366h0l.231,25.672s3.238,4.163,6.013.463l1.388-49.956,16.421-.231s4.163-2.775,0-5.551H604.275s-2.775.925-2.775,8.326v18.5s.144,1,1.85,1.85a2.289,2.289,0,0,0,3.238-1.85Z" transform="translate(0 -18.004)" fill="#3d63ae"></path>
                                <path id="Path_155" data-name="Path 155" d="M608.731,300l-.231,5.319h12.489l-.008-2.346L623.533,300Z" transform="translate(-3.762 0)" fill="#3d63ae"></path>
                                <path id="Path_156" data-name="Path 156" d="M612,311v3.7a3.6,3.6,0,0,0,1.388,2.775c1.388.925,5.551,2.775,8.788-1.85v-3.238h1.85L622.639,311Z" transform="translate(-5.643 -5.912)" fill="#3d63ae"></path>
                                <path id="Path_157" data-name="Path 157" d="M660.526,350.261l-9.714,9.251s-.925,1.388-.463,1.85l1.85,1.85,11.1-11.1-1.85-1.85S661.451,349.8,660.526,350.261Z" transform="translate(-26.184 -26.902)" fill="#3d63ae"></path>
                                <path id="Path_158" data-name="Path 158" d="M656.5,367.6l8.789,8.789,11.564-10.639L667.6,356.5Z" transform="translate(-29.56 -30.366)" fill="#3d63ae"></path>
                                <path id="Path_159" data-name="Path 159" d="M676.5,387.6s2.775,3.238,4.163,2.775,5.088-4.626,5.088-4.626l3.7-3.7s1.85-1.85.462-3.238L687.6,376.5Z" transform="translate(-40.308 -41.115)" fill="#3d63ae"></path>
                                <path id="Path_160" data-name="Path 160" d="M685.5,360.24s6.476-1.85,5.088,5.088Z" transform="translate(-45.146 -32.255)" fill="#3d63ae"></path>
                                <path id="Path_161" data-name="Path 161" d="M690.241,343.046l15.264-11.564s6.013-.463,18.5,3.7c0,0,3.7.463,3.7,7.863s-4.626,18.965-4.626,18.965-4.163,3.7-4.625-1.85l3.7-16.189-1.388.925-10.176,43.48a3.759,3.759,0,0,1-4.554,2.158,3.165,3.165,0,0,1-2.385-3.546l6.476-26.828h-.925s-1.85,8.326-2.775,9.251-14.339,8.789-14.339,8.789-5.088,1.85-4.626-4.626l12.951-8.326,6.476-27.753-14.339,10.639s-1.85-3.7-3.238-3.238A2.865,2.865,0,0,1,690.241,343.046Z" transform="translate(-46.186 -16.912)" fill="#3d63ae"></path>
                                <circle id="Ellipse_76" data-name="Ellipse 76" cx="6.013" cy="6.013" r="6.013" transform="translate(668.339 300.463)" fill="#3d63ae"></circle>
                            </g>
                        </svg>
                        <h3>Deported</h3>
                        <p>We Can Help!</p>
                    </li><br><br>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="79.328" height="82.969" viewBox="0 0 79.328 82.969">
                            <g id="Group_3352" data-name="Group 3352" transform="translate(-239.544 -4165.962)">
                                <path id="Path_162" data-name="Path 162" d="M87.729,27.459a5.827,5.827,0,0,0-3.35,1.053V11.636a5.908,5.908,0,0,0-9.33-4.683V5.78a5.886,5.886,0,0,0-11.77,0V6.953a5.907,5.907,0,0,0-9.33,4.683v7.029a5.907,5.907,0,0,0-9.33,4.683l0,18.179a21.682,21.682,0,0,0-19.842,1.924,1.207,1.207,0,0,0,1.348,2c12.323-8.206,29.442.861,29.311,15.513-1.038,24.676-36.757,24.672-37.792,0a18.213,18.213,0,0,1,4.058-11.5c.977-1.219-.938-2.706-1.915-1.488-11.031,13.583-.906,34.076,16.753,34a21.435,21.435,0,0,0,15.6-6.695c8.935,8.8,24.576,8.874,33.638.2,1.151-1.061-.517-2.814-1.668-1.753-8.2,7.856-22.379,7.733-30.408-.295,7.674-9.9,4.251-24.864-6.648-30.725l0-19.349a3.446,3.446,0,0,1,6.891,0V40.567a1.221,1.221,0,0,0,2.439,0c0-6.991,0-22.062,0-28.931a3.446,3.446,0,0,1,6.891,0V35.344a1.221,1.221,0,0,0,2.439,0V5.78a3.446,3.446,0,0,1,6.891,0c0,3.723,0,25.354,0,29.564a1.221,1.221,0,0,0,2.439,0V11.636a3.446,3.446,0,0,1,6.891,0c-.027,9.066.02,28.241,0,37.185A11.67,11.67,0,0,0,71.386,60.34a1.22,1.22,0,0,0,2.439,0,9.268,9.268,0,0,1,9.334-9.179,1.21,1.21,0,0,0,1.22-1.2V33.145a3.351,3.351,0,0,1,6.7,0V57.588a21.805,21.805,0,0,1-3.251,11.66A1.215,1.215,0,0,0,89.9,70.507,23.9,23.9,0,0,0,93.518,57.6V33.145a5.745,5.745,0,0,0-5.79-5.686Z" transform="translate(224.851 4166.462)" fill="#3d63ae" stroke="#3d63ae" stroke-width="1"></path>
                                <path id="Path_163" data-name="Path 163" d="M83.286,338.488a1.123,1.123,0,0,0,.444.815c13.844,9.891,30.344-7.026,20.692-21.2a1.073,1.073,0,0,0-1.65-.131L83.6,337.613A1.131,1.131,0,0,0,83.286,338.488Zm20.081-17.966c6.409,11.543-6.018,24.263-17.279,17.7Z" transform="translate(168.398 3899.751)" fill="#3d63ae"></path>
                                <path id="Path_164" data-name="Path 164" d="M67.61,281.449c-13.758-9.72-30.153,6.9-20.562,20.832a1.074,1.074,0,0,0,1.639.128l19.049-19.3A1.106,1.106,0,0,0,67.61,281.449ZM48.1,299.906c-6.368-11.344,5.98-23.845,17.17-17.4Z" transform="translate(202.086 3933.585)" fill="#3d63ae"></path>
                            </g>
                        </svg>
                        <h3>Inadmissible</h3>
                        <p>We Can Help!</p>

                    </li><br><br>
                </ul>


            </div>
            <div class="col-md-2 center">
            </div>
            <div class="col-md-4 center">

                <h2 class="h2-xs darkblue-color">Our Focus is Success</h2>
                <br>
                <p>At Ultra International, our immigration consultants aim to help clients reach their immigration
                    related objectives, such as getting a India visitor visa,
                    Entry permit, getting a super visa, and any other India immigration services you might need. </p>
                <br>
                <p>We are the #1 immigration consultant firm in New Delhi. Ultra International is far ahead from any
                    competition when it comes to offering solutions to complex Canadian immigration problems.</p>
                <br>

                <br>
                <a href="about.php" class="btn btn-md btn-primary black-hover">
                    Learn More
                </a>


            </div> <!-- END TABS CONTENT -->
        </div>
    </div>









</section> <!-- END TABS-2 -->




<!-- REQUEST FORM
			============================================= -->
<div id="request-1" class="bg-image wide-60 request-form-section division">
    <div class="container">
        <div class="row d-flex align-items-center">


            <!-- REQUEST FORM TEXT -->
            <div class="col-md-6 col-xl-6">
                <div class="request-txt white-color pc-20 mb-40">

                    <!-- Section ID -->
                    <span class="section-id id-color">Free 24/7 Support</span>

                    <!-- Title -->
                    <h2 class="h2-xs">Get Free & Quality Online Consultation</h2>

                    <!-- Samll Title -->


                    <!-- Text -->


                </div>
            </div> <!-- END REQUEST FORM TEXT -->


            <!-- REQUEST FORM -->
            <div class="col-md-6 col-xl-5 offset-xl-1">
                <div id="request-form" class="text-center mb-40">
                    <form class="row request-form bg-lightgrey" method="post" action="requestForm.php">

                        <!-- Request Form Text -->
                        <div class="col-md-12">
                            <h5 class="h5-lg">Request Free Consultation</h5>
                        </div>

                        <!-- Request Form Input -->
                        <div class="col-md-12">
                            <input type="text" name="firstname" id="firstname" class="form-control name" placeholder="Enter First Name*" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" name="lastname" id="lastname" class="form-control name" placeholder="Enter Your Last Name*" required>
                        </div>

                        <!-- Request Form Input -->
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" class="form-control email" placeholder="Enter Your Email*" required>
                        </div>

                        <!-- Request Form Input -->
                        <div class="col-md-12">
                            <input type="tel" name="phone" id="phone" class="form-control phone" placeholder="Enter Your Phone Number*" required>
                        </div>

                        <!-- Request Form Select -->

                        <div class="col-md-12">
                            <textarea type="text" name="message" id="message" class="form-control message" placeholder="Tell us about your situation and how we can help you.*" id="message" required></textarea>
                        </div>
                        <!-- Request Form Select -->


                        <!-- Request Form Button -->
                        <div class="col-md-12 form-btn">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary" class="tra-black-hover submit" value="Send Request">
                        </div>

                        <!-- Request Form Message -->
                        <div class="col-md-12 request-form-msg text-center">
                            <div class="sending-msg"><span class="loading"></span></div>
                        </div>

                    </form>
                </div>
            </div> <!-- END REQUEST FORM -->


        </div> <!-- End row -->
    </div> <!-- End container -->
</div> <!-- END REQUEST FORM -->




<!-- SERVICES-9
			============================================= -->
<section id="services-9" class="wide-100 services-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12 section-title center">

                <!-- Title -->
                <h2 class="h2-xs darkblue-color">Immigration Opportunities</h2>

                <!-- Text -->


            </div>
        </div> <!-- END SECTION TITLE -->


        <!-- SERVICE BOXES CAROUSEL -->
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme owl-loaded services-carousel">


                    <!-- SERVICE BOX #1 -->



                    <!-- SERVICE BOX #2 -->
                    <div class="sbox-9 sbox-9-color">

                        <!-- Image -->
                        <img class="img-fluid" src="images/australia-800x600.jpg" alt="service-image" />

                        <!-- Text -->
                        <div class="sbox-9-txt">

                            <!-- Title -->
                            <h5 class="h5-lg darkblue-color">Australia</h5>

                            <!-- Text -->


                        </div>

                    </div>


                    <!-- SERVICE BOX #4 -->
                    <div class="sbox-9 sbox-9-color">

                        <!-- Image -->
                        <img class="img-fluid" src="images/singapore-800x600.jpg" alt="service-image" />

                        <!-- Text -->
                        <div class="sbox-9-txt">

                            <!-- Title -->
                            <h5 class="h5-lg darkblue-color">Singapore</h5>

                            <!-- Text -->


                            <!--Link -->


                        </div>

                    </div>


                    <!-- SERVICE BOX #5 -->
                    <div class="sbox-9 sbox-9-color">

                        <!-- Image -->
                        <img class="img-fluid" src="images/uk-800x600.jpg" alt="service-image" />

                        <!-- Text -->
                        <div class="sbox-9-txt">

                            <!-- Title -->
                            <h5 class="h5-lg darkblue-color">United Kingdom</h5>

                            <!-- Text -->




                        </div>

                    </div>


                    <!-- SERVICE BOX #6 -->
                    <div class="sbox-9 sbox-9-color">

                        <!-- Image -->
                        <img class="img-fluid" src="images/usa-800x600.jpg" alt="service-image" />

                        <!-- Text -->
                        <div class="sbox-9-txt">

                            <!-- Title -->
                            <h5 class="h5-lg darkblue-color">USA</h5>




                        </div>

                    </div>


                    <!-- SERVICE BOX #3 -->
                    <div class="sbox-9 sbox-9-color">

                        <!-- Image -->
                        <img class="img-fluid" src="images/newzealand-800x600.jpg" alt="service-image" />

                        <!-- Text -->
                        <div class="sbox-9-txt">

                            <!-- Title -->
                            <h5 class="h5-lg darkblue-color">New Zealand</h5>





                        </div>

                    </div>


                    <!-- SERVICE BOX #6 -->
                    <div class="sbox-9 sbox-9-color">

                        <!-- Image -->
                        <img class="img-fluid" src="images/china-800x600.jpg" alt="service-image" />

                        <!-- Text -->
                        <div class="sbox-9-txt">

                            <!-- Title -->
                            <h5 class="h5-lg darkblue-color">China</h5>

                            <!-- Text -->




                        </div>

                    </div>


                </div>
            </div>
        </div> <!-- END SERVICE BOXES CAROUSEL -->


    </div> <!-- End container -->
</section> <!-- END SERVICES-9 -->




<!-- ABOUT-4
			============================================= -->
<section id="about-4" class="bg-lightgrey bg-tra-city pt-100 about-section division">
    <div class="container">
        <div class="row d-flex align-items-center">


            <!-- ABOUT TEXT -->
            <div class="col-lg-7 col-xl-6">
                <div class="about-4-txt mb-40">

                    <!-- Section ID -->
                    >
                    <div class="col-lg-8 col-xl-8 offset-xl-1">
                        <div class="about-4-img text-center">
                            <img class="img-fluid" src="img/call-center.png" alt="about-image" />
                        </div>
                    </div>
                    <!-- Title -->


                </div>
            </div>
            <div class="col-lg-5 col-xl-6">
                <!-- END ABOUT TEXT -->
                <h3 class="h3-lg darkblue-color">Book Your Consultation Today</h3>

                <!-- Text #1 -->
                <div class="box-list">
                    <div class="box-list-icon"><i class="fas fa-genderless"></i></div>

                </div>

                <!-- Text #2 -->


                <!-- Button -->
                <a href="book-appointment.php" class="btn btn-md btn-primary black-hover">
                    Book Now
                </a>

                <!-- SERVICES IMAGE -->



            </div>
        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- END ABOUT-4 -->




<!-- STATISTIC-1
			============================================= -->
<div id="statistic-1" class="bg-blue-map wide-60 statistic-section division">
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
                    <span class="flaticon-285-internet-2"></span>

                    <!-- Text -->
                    <h5><span class="count-element">81</span></h5>
                    <p>Countries</p>

                </div>
            </div>

            <!-- STATISTIC BLOCK #4 -->
            <div class="col-sm-6 col-md-3">
                <div class="statistic-block icon-sm">

                    <!-- Icon -->
                    <span class="flaticon-032-user-3"></span>

                    <!-- Text -->
                    <h5><span class="count-element">969</span></h5>
                    <p>Immigrations</p>

                </div>
            </div>


        </div> <!-- End row -->
    </div> <!-- End container -->
</div> <!-- END STATISTIC-1 -->



<!-- SERVICES-7
				============================================= -->
<section id="services-7" class="wide-60 services-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12 section-title center">

                <!-- Title -->
                <h2 class="h2-xs blue">What You Can Expect</h2>
                <p>When you hire us, you will have a team of experts behind you. From basic advice to complicated
                    migration solutions, we have got you covered.</p>
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

                            <p style="margin-top:130px;"><b>EXPERT CARE</b></p>



                        </div>

                        <div class="flip-box-back">

                            <p style="font-size:11px; text-align:center; margin-top:100px;">
                                Our legal professionals take the time to get to know each of our clients personally and
                                ensure that they understand every option available to them.</p>
                        </div>
                    </div>


                </div>
            </div>
            <!-- SERVICE BOX #2 -->
            <div class="col-md-6 col-lg-4">
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <p style="margin-top:130px;"><b> QUICK RESPONSE TIMES</b></p>

                        </div>
                        <div class="flip-box-back">

                            <p style="font-size:11px; text-align:center;margin-top:100px;">We respond to all
                                business-related questions within 24-48 business hours.</p>
                        </div>
                    </div>


                </div>
            </div>

            <!-- SERVICE BOX #2 -->
            <div class="col-md-6 col-lg-4">
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <div class="flip-box-front">


                            <p style="margin-top:130px;"><b>AFFORDABLE RATES</b></p>

                        </div>
                        <div class="flip-box-back">

                            <p style="font-size:11px; text-align:center;margin-top:100px;">Along with the best service
                                in the industry, we have some of the most affordable rates. Book a consultation to get
                                your estimate.</p>
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


                            <p style="margin-top:130px;"><b> EXPERIENCED REPRESENTIVATES</b></p>
                        </div>
                        <div class="flip-box-back">

                            <p style="font-size:11px; text-align:center;margin-top:100px;">Our team has 50+ years of
                                cumulative Canadian immigration experience. We’ve got experts on every
                                immigration-related topic.</p>
                        </div>
                    </div>
                </div>
            </div>


















        </div>
    </div>
</section>
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

            margin-top: 120px;
        }
    }
</style>
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
                                <!--<div class="testimonial-avatar">
											<img src="test_images/<?php //echo $row['test_image_name'];
                                                                    ?>">
										</div>-->

                                <!-- Author Data -->
                                <div class="review-author">
                                    <h5 class="h5-sm"><?php echo $row['test_given_by']; ?></h5>
                                    <span>
                                        <? //php echo $row['test_comp_name'];
                                        ?>
                                    </span>
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

<!-- BLOG POSTS HOLDER -->
<div class="row">

    <?php
    $blog = db_query("select * from  tbl_blogs where blog_status='Active' limit 3");

    while ($row = mysqli_fetch_array($blog)) {
        $desc = strip_tags($row['blog_description']);
        $desc = (strlen($desc) > 105) ? substr($desc, 0, 105) . '..' : $desc; ?>

        <!-- BLOG POST #1 -->
        <div class="col-md-6 col-lg-4">
            <div class="blog-post">


                <!-- BLOG POST IMAGE -->
                <div class="blog-post-img mb-30">
                    <img class="img-fluid" src="blog/<?php echo $row['blog_image_name'] ?>" alt="blog-post-image" />
                </div>

                <!-- BLOG POST TEXT -->
                <div class="blog-post-txt">

                    <!-- Post Meta -->


                    <!-- Title -->
                    <h5 class="h5-lg"><a href="single-post.php?id=<?php echo $row['blog_id'] ?>" class="darkblue-color">
                            <?php echo $row['blog_title'] ?></a>
                    </h5>

                    <!-- Text -->
                    <p><?php echo $desc ?>
                    </p>

                    <!-- Post Data -->
                    <p class="post-data">By <a href="#">admin</a> -
                        <?php echo $row['blog_add_date'];
                        echo $row['blog_add_time'] ?></p>

                </div>


            </div>
        </div> <!-- END  BLOG POST #1 -->


    <?php } ?>


</div> <!-- END BLOG POSTS HOLDER -->


</div> <!-- End container -->
</section> <!-- END BLOG-1 -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php include('inc/footer.php'); ?>