<?php
$index_slider = db_query("select * from tbl_header_flash where header_flash_status='Active'");
if (mysqli_num_rows($index_slider) > 0) { ?>
  <div class="container-fluid mb-5" style="padding:0px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
        $i = 0;
        $index_slider = db_query("select * from tbl_header_flash where header_flash_status='Active'");
        while ($row = mysqli_fetch_array($index_slider)) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" <?php if ($i == 0) { ?> class="active" <?php } ?>></li>
        <?php $i++;
        } ?>
      </ol>
      <div class="carousel-inner">
        <?php
        $i = 1;
        $index_slider = db_query("select * from tbl_header_flash where header_flash_status='Active'");
        while ($row = mysqli_fetch_array($index_slider)) { ?>
          <div class="carousel-item <?php if ($i == 1) { ?> active <?php } ?>">
            <img class="d-block w-100" src="<?= $site_url ?>/flash_images/<?= $row['header_flash_image_name'] ?>" alt="<?= $compDATA['admin_company_name'] ?>">
            <div class="carousel-caption d-none d-md-block" id="divvv">
              <div class="alphaint" style="text-align: initial;">
                <h1 class="heavy"><?= $row['header_flash_title'] ?></h1>
                <p class="heavydriver"><?= $row['header_flash_description'] ?></p>
                <?php if (!empty($row['header_flash_link'])) { ?>
                  <a class="btndiv" href="<?= $row['header_flash_link'] ?>">Read more <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++;
        } ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
<?php } ?>