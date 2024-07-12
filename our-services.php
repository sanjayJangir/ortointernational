<?php include "header.php" ?>

<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_id='80'");
$page = mysqli_fetch_array($page_data);
?>

<!--<nav aria-label="breadcrumb">-->
<!--  <ol class="breadcrumb">-->
<!--    <li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>-->
<!--    <li class="breadcrumb-item active" aria-current="page"><?= $page['site_pages_name'] ?></li>-->
<!--  </ol>-->
<!--</nav>-->
<div class="container" id="divyancont">
  <div class="row">
    <div class="col-lg-12 col-12">
      <div class="divyanservice">
        <p class="lead">CRAWLER EXCAVATORS ATTACHMENTS</p>
        <h1 class="display-4" id="meta8">THE ULTIMATE <br>COMBINATION
        </h1>
      </div>
    </div>
  </div>
</div>

<div class="container text-center ">
  <h5 class="text-uppercase">VOLVO HAS THE RIGHT ATTACHMENT FOR THE JOB </h5>
  <p class="font1">
    A Volvo excavator and bucket together with a factory fitted quick coupler delivers the ultimate combination of high productivity, safety, precise control and reduced fuel consumption. Experience a new way of working and get the job done with Volvo.
  </p>
  <h5 class="text-capitalize">Please note that the attachments offering for machine models may vary in different markets.</h5>
</div>

<div class="container pd-5 pt-5 text-center ">
  <!--<h3 class="text-uppercase pb-4 font1 font-weight-bold">Our Services </h3>-->
  <div class="card-deck">

    <?php
    $services = db_query("select * from tbl_service where category_status='Active'");
    while ($row = mysqli_fetch_array($services)) {
      $desc = strip_tags($row['category_description']);
      $desc = (strlen($desc) > 105) ? substr($desc, 0, 105) . '..' : $desc; ?>
      <div class="card">
        <img class="card-img-top" src="img/slideshow-1.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?= $row['category_name'] ?></h5>
          <p class="font1 "><?= $desc ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="<?= $site_url ?>/<?= $row['category_url'] ?>.htm">Overview of attachments </a></small>
        </div>
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