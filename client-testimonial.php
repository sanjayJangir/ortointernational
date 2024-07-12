<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_link='client-testimonial'");
$page = mysqli_fetch_array($page_data);
?>
<div class="container">
  <!--<nav aria-label="breadcrumb">-->
  <!--  <ol class="breadcrumb">-->
  <!--    <li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>-->
  <!--    <li class="breadcrumb-item active" aria-current="page"><?= $page['site_pages_name'] ?></li>-->
  <!--  </ol>-->
  <!--</nav>-->
</div>
<div class="container text-center" style="padding: 22px;">
  <h5 class="text-uppercase" style="font-family: 'VolvoBroadProDigital';
    font-size: 50px;"><?= $page['site_pages_name'] ?> </h5>
</div>

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <?php
    $index_test = db_query("select * from tbl_testimonial where test_status='Active'");
    while ($row = mysqli_fetch_array($index_test)) { ?>
      <div class="col-lg-4" style="text-align: center;padding: 0px 20px 0px 20px;">
        <img class="rounded-circle" src="<?= $site_url ?>/test_images/<?= $row['test_image_name'] ?>" alt="<?= $compDATA['admin_company_name'] ?>" title="<?= $compDATA['admin_company_name'] ?>" width="140" height="140">
        <h2 style="font-size: 23px;font-family: 'Rubik';color: #423d3d;"><?= $row['test_given_by'] ?></h2><i style="color: gray;
    font-family: 'Rubik';font-size: 12px;"><?= $row['test_comp_name'] ?></i>
        <p><span style="font-size: 50px; color:gray;line-height: 12px;">❝</span> &nbsp;<?= $row['test_description'] ?></p>
      </div>
    <?php } ?>
  </div>
</div>

<div class="parallax">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 pt-5" style="padding: 0px;">
        <div class="divyanbackg1">
          <center>
            <h2 class="divyhhh">GET IN TOUCH</h2>
            <p class="divyanpara99">Want to order or learn more? Send us a message.</p>
            <button type="button" class="btn btn-primary divyabtnnn" onclick="window.location.href='<?= $site_url ?>/contact-us.html';">Get In Touch</button>
          </center>

        </div>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php" ?>