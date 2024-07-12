<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_id='55'");
$page = mysqli_fetch_array($page_data);
?>
<div class="container">
  <!--    <nav aria-label="breadcrumb">-->
  <!--  <ol class="breadcrumb">-->
  <!--    <li class="breadcrumb-item" aria-current="page">-->
  <!--     <a href="<?= $site_url ?>">Home</a>-->
  <!--    </li>-->
  <!--    <li class="breadcrumb-item active" aria-current="page"><?= $page['site_pages_name'] ?></li>-->
  <!--  </ol>-->
  <!--</nav>-->
</div>
<div class="container pd-5 pt-5 text-center ">
  <h3 class="text-uppercase pb-4 font1">Our Brands</h3>

  <div class="row">
    <?php
    $i = 1;
    $brands = db_query("select * from tbl_category where category_status='Active' and category_parent_id='0' order by category_order_by");
    while ($row = mysqli_fetch_array($brands)) {
      $final_url = $site_url . "/" . $row['category_url'] . ".html";
      if (!empty($_REQUEST['state_name'])) {
        $final_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $row['category_url'] . ".html";
      } ?>
      <div class="col-lg-4">
        <a href="<?= $final_url ?>">
          <div class="xuv" style="padding:20px;height:200px;">
            <img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $row['category_name'] ?>" style="height: auto;width: 100%;max-height:250px; border: none;">
          </div>
        </a>
        <a href="<?= $final_url ?>" style="text-transform: uppercase;padding:10px;border:1px solid #80808069;">View Now</a>

      </div>
    <?php } ?>

  </div>

</div>
<?php include "footer.php" ?>