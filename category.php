<?php include "header.php" ?>

<?php
$cat_data = db_query("select * from tbl_category where category_url='$_REQUEST[cat_name]'");
$cat = mysqli_fetch_array($cat_data);

$cat_url = $site_url . "/" . $cat['category_url'] . ".html";
if (!empty($_REQUEST['state_name'])) {
  $cat_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $cat['category_url'] . ".html";
}

$state_name = "India";
if (!empty($_REQUEST['state_name'])) {
  $state_name = str_replace("-", " ", $_REQUEST['state_name']);
}
$cat_banner = $cat['category_inner_banner'];
?>


<!--<div class="container">-->
<!--    <nav aria-label="breadcrumb">-->
<!--  <ol class="breadcrumb">-->
<!--    <li class="breadcrumb-item" aria-current="page"><a href="<?= $site_url ?>">Home</a></li>-->
<!--    <li class="breadcrumb-item active" aria-current="page"><?= $cat['category_name'] ?></li>-->
<!--  </ol>-->
<!--</nav>-->
<!--  </div>-->


<?php if ($cat['category_parent_id'] == 0) { ?>
  <div class="container pd-5 pt-5 text-center ">
    <h3 class="text-uppercase pb-4 font1"><?= $cat['category_name'] ?> Categories</h3>
    <div class="row">
      <?php
      $categories = db_query("select * from tbl_category where category_status='Active' and category_parent_id='$cat[category_id]' order by category_order_by");
      while ($row = mysqli_fetch_array($categories)) {
        $name = (strlen($row['category_name']) > 20) ? substr($row['category_name'], 0, 20) . "..." : $row['category_name'];
        $final_url = $site_url . "/" . $row['category_url'] . ".html";
        if (!empty($_REQUEST['state_name'])) {
          $final_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $row['category_url'] . ".html";
        } ?>
        <div class="col-md-4" id="divyanz">
          <div class="meta22">
            <a href="<?= $final_url ?>"><img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $row['category_name'] ?>" style="border: none"></a>
            <a href="<?= $final_url ?>">
              <h5 class="card-title font1" style="border-top: 1px solid #80808045;"><?= $name ?></h5>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
<?php } else if ($cat['cat_type'] == "subcat") { ?>

  <div class="container pd-5 pt-5 text-center ">


    <!--<ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">-->
    <!--<li class="nav-item">-->
    <!--<a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"-->
    <!--  aria-selected="true">All Products</a>-->
    <!--</li>-->

    <!--</ul>-->
    <div class="tab-content" id="myTabContentJust">
      <h3 class="text-uppercase pb-4 font1"><?= $cat['category_name'] ?></h3>
      <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
        <div class="row">

          <?php
          $products = db_query("select * from tbl_category where category_status='Active' and category_parent_id='$cat[category_id]' order by category_order_by");
          while ($row = mysqli_fetch_array($products)) {
            $name = (strlen($row['category_name']) > 20) ? substr($row['category_name'], 0, 20) . "..." : $row['category_name'];
            $final_url = $site_url . "/" . $row['category_url'] . ".html";
            if (!empty($_REQUEST['state_name'])) {
              $final_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $row['category_url'] . ".html";
            } ?>
            <div class="col-md-3" id="divyanz">
              <a href="<?= $final_url ?>"><img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $row['category_name'] ?>"></a>
              <div class="card-footer megadivyan">
                <a href="<?= $final_url ?>">
                  <h5 class="card-title font1"><?= $name ?></h5>
                </a>

                <ul>
                  <?php if (!empty($row['operating_weight'])) { ?>
                    <li class="divyaum" title="operating weight">
                      <div class="mgk"><i class="fa fa-balance-scale" id="divyanfaa" aria-hidden="true"></i><?= $row['operating_weight'] ?></div>
                    </li>
                  <?php } ?>
                  <?php if (!empty($row['gross_power'])) { ?>
                    <li class="divyaum" title="gross power">
                      <div class="mgk"> <i class="fa fa-pie-chart" id="divyanfaa" aria-hidden="true"></i><?= $row['gross_power'] ?></div>
                    </li>
                  <?php } ?>
                  <?php if (!empty($row['bucket_capacity'])) { ?>
                    <li class="divyaum" title="bucket capacity">
                      <div class="mgk"><i class="fa fa-bitbucket" id="divyanfaa" aria-hidden="true"></i><?= $row['bucket_capacity'] ?></div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>

    </div>
  </div>

<?php } else { ?>

  <div class="container pd-5 pt-5 text-center " style="margin-bottom:50px">
    <div class="row">
      <div class="col-md-7" id="divyacrd">
        <a href="category.php"><img src="<?= $site_url ?>/uploaded_files/<?= $cat['category_image_name'] ?>" alt="Card image cap" style="padding: 5%;
    position: relative;top: -59px;"></a>
      </div>
      <div class="col-md-5 divyan00">
        <!--<img class="card-img-top" src="img/slideshow-1.jpg" alt="Card image cap">-->
        <blockquote class="blockquote">
          <p class="mb-0">Alpha Construction</p>
        </blockquote>
        <h3 class="divyanh3"><?= $cat['category_name'] ?></h3>
        <ul>
          <?php if (!empty($cat['operating_weight'])) { ?>
            <li class="divyaum">
              <div class="mgk"><i class="fa fa-balance-scale" id="divyanfaa" aria-hidden="true"></i><?= $cat['operating_weight'] ?></div>
            </li>
          <?php } ?>
          <?php if (!empty($cat['gross_power'])) { ?>
            <li class="divyaum">
              <div class="mgk"> <i class="fa fa-pie-chart" id="divyanfaa" aria-hidden="true"></i><?= $cat['gross_power'] ?></div>
            </li>
          <?php } ?>
          <?php if (!empty($cat['bucket_capacity'])) { ?>
            <li class="divyaum">
              <div class="mgk"><i class="fa fa-bitbucket" id="divyanfaa" aria-hidden="true"></i><?= $cat['bucket_capacity'] ?></div>
            </li>
          <?php } ?>
        </ul>
        <?= $cat['category_description'] ?>
        <!--<div class="col-sm-6" style="padding-top: 26px;"><button type="button" class="btn btn-primary btn-lg divyanproduct"  data-toggle="modal" data-target="#myModalNorm" style="width: 160px;height: 50px;font-family: VolvoNovumMedium;background: #605e5ebf;border: none;">Contact Us</button></div>-->
        <div class="col-sm-6" style="padding-top: 26px;">
          <button type="button" class="btn btn-primary btn-lg divyanproduct" onclick="window.location.href='<?= $site_url ?>/contact-us.html';" style="width: 160px;height: 50px;font-family: VolvoNovumMedium;background: #605e5ebf;border: none;">Contact Us</button>
        </div>

      </div>
    </div>
  </div>

  <!-- Divyanshu Tabs content -->
  <!--<div class="container-fluid" style="background: #e1dfdd;">-->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Classic tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <?php if (!empty($cat['overview']) && !empty($cat['category_video_name'])) { ?>
            <li class="nav-item" id="divyantab">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
            </li>
          <?php } ?>
          <?php if (!empty($cat['specification'])) { ?>
            <li class="nav-item" id="divyantab">
              <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
            </li>
          <?php } ?>
          <?php
          $features_count = db_scalar("select COUNT(*) from tbl_features where product_id='$cat[category_id]'");
          if ($features_count > 0) { ?>
            <li class="nav-item" id="divyantab">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Features</a>
            </li>
          <?php } ?>
          <?php
          $attachments_count = db_scalar("select COUNT(*) from tbl_attachments where product_id='$cat[category_id]'");
          if ($attachments_count > 0) { ?>
            <li class="nav-item" id="divyantab">
              <a class="nav-link" id="attachments-tab" data-toggle="tab" href="#attachments" role="tab" aria-controls="attachments" aria-selected="false">Attachments</a>
            </li>
          <?php } ?>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <div class="divyanoverview">
                    <?= $cat['overview'] ?>
                  </div>

                </div>
                <div class="col-lg-6">
                  <div class="divyayoutube">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $cat['category_video_name'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table table-striped">
              <?= $cat['specification'] ?></table>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container pd-5 pt-5 text-center">
              <h3 class="text-uppercase pb-4 font1 font-weight-bold" id="divyantxt2">FEATURES & BENEFITS</h3>

              <div class="row">
                <?php
                $features = db_query("select * from tbl_features where product_id='$cat[category_id]'");
                while ($row = mysqli_fetch_array($features)) {
                  $name = (strlen($row['name']) > 20) ? substr($row['name'], 0, 20) . '..' : $row['name'];
                  $desc = strip_tags($row['description']);
                  $desc = (strlen($desc) > 80) ? substr($desc, 0, 80) . '..' : $desc;
                ?>
                  <div class="col-md-4" id="divyanz">
                    <a href="<?= $site_url ?>/feature/<?= $row['url'] ?>.html"><img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['feature_image_name'] ?>" alt="<?= $row['name'] ?>"></a>
                    <div class="card-footer">
                      <a href="<?= $site_url ?>/feature/<?= $row['url'] ?>.html">
                        <h5 class="card-title font1" id="divyanh5"><?= $name ?></h5>
                      </a>
                      <p class="divyanp3"><?= $desc ?></p>
                      <div class="divyabtnu">
                        <a href="<?= $site_url ?>/feature/<?= $row['url'] ?>.html"><button type="button" class="btn btn-outline-primary">Read More</button></a>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="attachments" role="tabpanel" aria-labelledby="attachments-tab">
            <div class="container pd-5 pt-5 text-center ">
              <h3 class="text-uppercase pb-4 font1 font-weight-bold">Attachments</h3>

              <div class="row">
                <?php
                $attachments = db_query("select * from tbl_attachments where product_id='$cat[category_id]'");
                while ($row = mysqli_fetch_array($attachments)) {
                  $desc = strip_tags($row['description']);
                  $desc = (strlen($desc) > 100) ? substr($desc, 0, 100) . '..' : $desc;
                ?>
                  <div class="col-md-4">
                    <div class="card-header">
                      <h5 class="card-title font1"><?= $row['name'] ?> (1)</h5>
                    </div>
                    <a href="<?= $site_url ?>/attachment/<?= $row['url'] ?>.html"><img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['attachment_image_name'] ?>" alt="<?= $row['name'] ?>"></a>
                    <div class="card-footer megadivyan">
                      <a href="<?= $site_url ?>/attachment/<?= $row['url'] ?>.html">
                        <h5 class="card-title font1"><?= $row['name'] ?></h5>
                      </a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Classic tabs -->
      </div>
    </div>
  </div>

<?php } ?>
</div>
</div>
<?php include "footer.php" ?>