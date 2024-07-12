<?php
$services = db_query("select * from tbl_service order by category_order_by");
if (mysqli_num_rows($services) > 0) { ?>
    <div class="container pd-5 pt-5 text-center ">
        <h3 class="text-uppercase pb-4 font1 font-weight-bold">Our Services </h3>
        <div class="card-deck">
            <?php while ($row = mysqli_fetch_array($services)) {
                $desc = strip_tags($row['category_description']);
                $desc = (strlen($desc) > 105) ? substr($desc, 0, 105) . '..' : $desc;
            ?>
                <div class="card">
                    <img class="card-img-top" src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $row['category_name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?= $site_url ?>/<?= $row['category_url'] ?>.htm"><?= $row['category_name'] ?></a>
                        </h5>
                        <p class="font1"><?= $desc ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><a href="<?= $site_url ?>/<?= $row['category_url'] ?>.htm">Discover Here </a></small>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
<?php } ?>