<?php
$brands = db_query("select * from tbl_category where category_status='Active' and category_parent_id='0' order by category_order_by");
if (mysqli_num_rows($brands) > 0) { ?>
  <div class="container pd-5 pt-5 text-center ">
    <h3 class="text-uppercase pb-4 font1">Our Construction Equipment Brands</h3>

    <div class="row">
      <?php
      while ($row = mysqli_fetch_array($brands)) {
        $final_url = $site_url . "/" . $row['category_url'] . ".html";
        if (!empty($_REQUEST['state_name'])) {
          $final_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $row['category_url'] . ".html";
        } ?>
        <div class="col-lg-3" style="padding:20px;border: 1px solid #80808036;margin: 28px;">
          <a href="<?= $final_url ?>">
            <img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $row['category_name'] ?>" style="height: 100px;
    width: auto; border: none;">
          </a>

        </div>
      <?php } ?>

    </div>
  </div>


  <style>
    .parallax {
      /* The image used */
      background-image: url("img_parallax.jpg");

      /* Set a specific height */
      min-height: 500px;

      /* Create the parallax scrolling effect */
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>



  <div class="parallax">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 pt-5" style="padding: 0px;">
          <div class="divyanbackg1">
            <center>
              <h2 class="divyhhh">Someone famous in Genuine Alpha Parts</h2>
              <p class="divyanpara99">We know that every part is vital and help you maximize uptime in the long run through Genuine Volvo Parts.</p>
              <button type="button" class="btn btn-primary divyabtnnn" onclick="window.location.href='https://alphagroupindia.com/contact-us.html';">Contact Now</button>
            </center>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!--<div class="container text-center pd-5 pt-5">-->
  <!--<blockquote class="blockquote" style="background: #b8b8b852;padding: 20px;text-align: center;">-->
  <!--<p class="mb-0" style="text-align: center;">We know that every part is vital and help you maximize uptime in the long run through Genuine Volvo Parts.</p>-->
  <!--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Genuine Volvo Parts</cite></footer>-->
  <!--</blockquote>-->
  <!--</div>-->


<?php } ?>