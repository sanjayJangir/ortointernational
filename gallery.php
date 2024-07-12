<div class="container md-5 pt-5 text-center ">
  <h3 class="text-uppercase pb-4 font1">Head Office</h3>
  <div class="galldiv">
    <?php
    $gallery = db_query("select * from tbl_image_gallery where header_flash_status='Active'");
    while ($row = mysqli_fetch_array($gallery)) { ?>
      <div class="grid-item">
        <a data-fancybox="gallery" href="<?= $site_url ?>/gallery/<?= $row['header_flash_image_name'] ?>"><img src="<?= $site_url ?>/gallery/<?= $row['header_flash_image_name'] ?>" alt="<?= $row['header_flash_title'] ?>" title="<?= $row['header_flash_title'] ?>"></a>
      </div>
    <?php } ?>
  </div>

</div>