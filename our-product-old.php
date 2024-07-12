<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_id='55'");
$page = mysqli_fetch_array($page_data);
?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?= $page['site_pages_name'] ?></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">
          <a href="<?= $site_url ?>">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?= $page['site_pages_name'] ?></li>
      </ol>
    </nav>
  </div>
</div>
<div class="container pd-5 pt-5 text-center ">
  <h3 class="text-uppercase pb-4 font1 font-weight-bold">Our Brands</h3>

  <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
    <?php
    $i = 1;
    $brands = db_query("select * from tbl_category where category_status='Active' and category_parent_id='0' order by category_order_by");
    while ($row = mysqli_fetch_array($brands)) {
      $final_url = $site_url . "/" . $row['category_url'] . ".html";
      if (!empty($_REQUEST['state_name'])) {
        $final_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $row['category_url'] . ".html";
      } ?>
      <li class="nav-item">
        <a href="<?= $final_url ?>"><img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $row['category_name'] ?>" style="height: 140px;width: auto; border: none;"> <a class="nav-link <?php if ($i == 1) { ?> active <?php } ?>" id="home-tab-just" data-toggle="tab" href="#<?= $row['category_url'] ?>" role="tab" aria-controls="home-just" aria-selected="true"><?= $row['category_name'] ?></a></a>
      </li>
    <?php $i++;
    } ?>
  </ul>
  <!--<div class="tab-content card pt-5" id="myTabContentJust">
<?php
$i = 1;
$brands = db_query("select * from tbl_category where category_status='Active' and category_parent_id='0' order by category_order_by");
while ($row = mysqli_fetch_array($brands)) { ?>
<div class="tab-pane fade show <?php if ($i == 1) { ?> active <?php } ?>" id="<?= $row['category_url'] ?>" role="tabpanel" aria-labelledby="home-tab-just">
  <div class="row">
<?php
  $categories = db_query("select * from tbl_category where category_status='Active' and category_parent_id='$row[category_id]' order by category_order_by");
  while ($data = mysqli_fetch_array($categories)) {
    $name = (strlen($data['category_name']) > 20) ? substr($data['category_name'], 0, 20) . "..." : $data['category_name'];
    $final_url = $site_url . "/" . $data['category_url'] . ".html";
    if (!empty($_REQUEST['state_name'])) {
      $final_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $data['category_url'] . ".html";
    } ?> 

<div class="col-md-4" id="divyanz">
<a href="<?= $final_url ?>"><img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $data['category_image_name'] ?>" alt="<?= $data['category_name'] ?>"></a>
<div class="card-footer megadivyan">
<a href="<?= $final_url ?>"><h5 class="card-title font1"><?= $name ?></h5></a>
</div>
</div> 
<?php } ?>
</div>
  </div>
<?php $i++;
} ?> 
</div>-->
</div>
<?php include "footer.php" ?>