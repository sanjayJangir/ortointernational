<?php include "header.php" ?>
<div class="container md-5 pt-5 text-center ">
  <?php
  $branch_url = $_REQUEST['branch_url'];
  $branch_data = db_query("select id,branch_name from tbl_branch_gallery where branch_url='$branch_url'");
  $data = mysqli_fetch_array($branch_data);
  ?>
  <h3 class="text-uppercase pb-4 font1"><?= $data['branch_name'] ?></h3>
  <div class="galldiv">

    <?php
    $branch_images = db_query("select * from tbl_branch_gallery where branch_parent_id='$data[id]'");
    while ($row = mysqli_fetch_array($branch_images)) { ?>
      <div class="grid-item">
        <a data-fancybox="gallery" href="<?= $site_url ?>/branch_gallery/<?= $row['branch_image_name'] ?>"><img src="<?= $site_url ?>/branch_gallery/<?= $row['branch_image_name'] ?>" alt="#" title="#"></a>
      </div>
    <?php } ?>

  </div>
</div>
<?php include "footer.php" ?>