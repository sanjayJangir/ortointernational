<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_link='company-details'");
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
<!--<div class="container" id="divyancont" style="background-image:url('<?= $site_url ?>/static_files/<?= $page[site_pages_inner_banner] ?>')">-->
<!--<div class="row">
<!--      <div class="col-lg-12 col-12">-->
<!--       <div class="divyanservice">   -->

<!--    </div>-->
<!--  </div>-->
<!--  </div>-->
<!--</div>-->

<div class="container text-center" style="padding: 54px;">
  <h5 class="text-uppercase" style="font-size: 40px;font-family: 'VolvoBroadProDigital';"><?= $page['site_pages_name'] ?> </h5>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <a href="#"><img src="<?= $site_url ?>/static_files/<?= $page[site_pages_inner_banner] ?>"></a>
    </div>
    <div class="col-lg-12">
      <?= $page['site_pages_description'] ?>
    </div>
  </div>
</div>

<img src="<?= $site_url ?>/static_files/<?= $page['site_pages_image_name'] ?>" alt="<?= $compDATA['admin_company_name'] ?>" style="width: 100%;padding-bottom:45px;">

<div class="container">
  <div class="row">
    <?php
    $branches = db_query("select * from tbl_dealers where category_status='Active' and category_parent_id!=0");
    while ($row = mysqli_fetch_array($branches)) {
      $parent = db_scalar("select category_name from tbl_dealers where category_id='$row[category_parent_id]'");
    ?>
      <div class="col-md-3" style="display: none">
        <h5 class="mb-3">
          <?= $parent ?> Branch
        </h5>

        <ul class="list-group mb-3">
          <li class="mydivyanshu">
            <span class="icon-envelope-open"></span>
            <i class="fa fa-map-marker" style="color: #515151;"></i>
            <span id="address"><?= $row['category_address'] ?></span>
          </li>

          <li class="mydivyanshu">
            <span class="icon-earphones"></span>
            <i class="fa fa-phone" style="color: #515151;"></i>
            <span id="mobile"><?= $row['category_mobile'] ?></span>
          </li>
          <?php if (!empty($row['category_email'])) { ?>
            <li class="mydivyanshu">
              <span class="icon-envelope-open"></span>
              <i class="fa fa-envelope" style="color: #515151;"></i>
              <span id="email"><?= $row['category_email'] ?></span>
            </li>
          <?php } ?>
        </ul>

      </div>
    <?php } ?>
  </div>
</div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="padding-bottom: 45px; text-align: center;">
        <h5 class="mb-3" style="font-size: 31px;">
          Alpha Group
        </h5>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php
      $locations = db_query("select * from tbl_dealers where category_parent_id=0");
      while ($data = mysqli_fetch_array($locations)) { ?>
        <div class="col-md-6" style="border-right: 1px solid #cbc7c7;border-left: 1px solid #cbc7c7;padding-left: 65px;">
          <h5 class="mb-3">
            <?= $data['location_name'] ?>
          </h5>
          <ul class="list-group mb-3">
            <li class="mydivyanshu">
              <span class="icon-envelope-open"></span>
              <a <?php if (!empty($data['category_map'])) { ?> href="<?= $data['category_map'] ?>" target="_blank" <?php } else { ?> href="#" <?php } ?>><i class="fa fa-map-marker" id="dirt" style="color: #515151;"></i></a>
              <span id="address"><?= $data['category_address'] ?></span>
            </li>

            <li class="mydivyanshu">
              <span class="icon-earphones"></span>
              <i class="fa fa-phone" id="dirt" style="color: #515151;"></i>
              <span id="mobile"><?= $data['category_mobile'] ?></span>
            </li>
          </ul>
          <?php
          $branches = db_query("select * from tbl_dealers where category_parent_id='$data[category_id]'");
          while ($branch = mysqli_fetch_array($branches)) { ?>
            <h5 class="mb-3"><?= $branch['branch_name'] ?> Branch </h5>
            <ul class="list-group mb-3">
              <li class="mydivyanshu">
                <span class="icon-envelope-open"></span>
                <a <?php if (!empty($branch['category_map'])) { ?> href="<?= $branch['category_map'] ?>" target="_blank" <?php } else { ?> href="#" <?php } ?>><i class="fa fa-map-marker" id="dirt" style="color: #515151;"></i></a>
                <span id="address"><?= $branch['category_address'] ?></span>
              </li>

              <li class="mydivyanshu">
                <span class="icon-earphones"></span>
                <i class="fa fa-phone" id="dirt" style="color: #515151;"></i>
                <span id="mobile"><?= $branch['category_mobile'] ?></span>
              </li>
            </ul>
          <?php } ?>
        </div>
      <?php } ?>


    </div>
  </div>
</section>
<?php include "gallery.php" ?>
<div class="container md-5 pt-5 text-center ">
  <h3 class="text-uppercase pb-4 font1">Our Branches</h3>
  <div class="galldiv">

    <?php
    $branch_gallery = db_query("select * from tbl_branch_gallery where branch_parent_id=0");
    while ($row = mysqli_fetch_array($branch_gallery)) { ?>
      <div class="grid-item">
        <a href="<?= $site_url ?>/branch/<?= $row['branch_url'] ?>.html"><img src="<?= $site_url ?>/branch_gallery/<?= $row['branch_image_name'] ?>" alt="<?= $row['branch_name'] ?>" title="<?= $row['branch_name'] ?>"><?= $row['branch_name'] ?></a>
      </div>
    <?php } ?>
  </div>
</div>
<!--<div class="container md-5 pt-5 text-center ">-->
<!--<h3 class="text-uppercase pb-4 font1">Haldwani Office</h3>-->
<!--  <div class="galldiv">-->
<!--<div class="grid-item">-->
<!--  <a data-fancybox="gallery" href="img/1.jpg"><img src="img/1.jpg" alt="#" title="#"></a>-->
<!--</div>-->

<!--<div class="grid-item">-->
<!--  <a data-fancybox="gallery" href="img/3.jpg"><img src="img/3.jpg" alt="#" title="#"></a>-->
<!--</div>-->

<!--<div class="grid-item">-->
<!--  <a data-fancybox="gallery" href="img/5.jpg"><img src="img/5.jpg" alt="#" title="#"></a>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="container md-5 pt-5 text-center ">-->
<!--<h3 class="text-uppercase pb-4 font1">Dehradun Office</h3>-->
<!--  <div class="galldiv">-->
<!--<div class="grid-item">-->
<!--  <a data-fancybox="gallery" href="img/6.jpg"><img src="img/6.jpg" alt="#" title="#"></a>-->
<!--</div>-->

<!--<div class="grid-item">-->
<!--  <a data-fancybox="gallery" href="img/2.jpg"><img src="img/2.jpg" alt="#" title="#"></a>-->
<!--</div>-->

<!--<div class="grid-item">-->
<!--  <a data-fancybox="gallery" href="img/3.jpg"><img src="img/3.jpg" alt="#" title="#"></a>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
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