<?php include "header.php" ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Search Result</li>
  </ol>
</nav>
<?php
$key = '%' . $search_keyword . '%';
$query = "select * from tbl_category where category_status='Active' and category_name like ?";
$resStatement = mysqli_prepare($GLOBALS['dbcon'], $query);
mysqli_stmt_bind_param($resStatement, 's', $key);
mysqli_stmt_execute($resStatement);
$products = mysqli_stmt_get_result($resStatement);
if (mysqli_num_rows($products) > 0) { ?>
  <div class="container pd-5 pt-5 text-center ">
    <h3 class="text-uppercase pb-4 font1 font-weight-bold">Our Construction Equipment</h3>

    <div class="row">

      <?php
      while ($row = mysqli_fetch_array($products)) {
        $final_url = $site_url . "/" . $row['category_url'] . ".html";
        if (!empty($_REQUEST['state_name'])) {
          $final_url = $site_url . "/" . $_REQUEST['state_name'] . "/" . $row['category_url'] . ".html";
        } ?>
        <div class="col-sm-3">
          <a href="<?= $final_url ?>">
            <img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $row['category_name'] ?>">
          </a>
          <div class="card-footer">
            <h5 class="card-title font1">
              <a href="<?= $final_url ?>"><?= $row['category_name'] ?></a>
            </h5>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
<?php } else { ?>
  <h4>No Result Found..!</h4>
<?php } ?>

<?php include "footer.php" ?>