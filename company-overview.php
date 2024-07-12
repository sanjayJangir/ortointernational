<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_link='company-overview'");
$page = mysqli_fetch_array($page_data);
?>
<div class="container">
    <!--<nav aria-label="breadcrumb">-->
    <!--<ol class="breadcrumb">-->
    <!--<li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>-->
    <!--<li class="breadcrumb-item active" aria-current="page"><?= $page['site_pages_name'] ?></li>-->
    <!--</ol>-->
    <!--</nav>-->
</div>
<!--<div class="container" id="divyancont" style="background-image:url('<?= $site_url ?>/static_files/<?= $page[site_pages_inner_banner] ?>')">-->
<!--</div>-->

<div class="container text-center" style="padding: 54px;font-family: VolvoBroadProDigital;">
    <h5 class="text-uppercase" style="font-size: 40px;font-family: VolvoBroadProDigital;"><?= $page['site_pages_name'] ?> </h5>
</div>

<div class="container">

    <div class="row">
        <div class="col-lg-5">
            <a href="#"><img src="<?= $site_url ?>/static_files/<?= $page['site_pages_image_name'] ?>" alt="<?= $compDATA['admin_company_name'] ?>" style="max-height: 700px;
    width: auto;"></a>
        </div>
        <div class="col-lg-7">
            <?= $page['site_pages_description'] ?>
        </div>
    </div>
</div>
<div class="container">
    <h3 class="text-uppercase pb-4 font1 font-weight-bold">Our Services </h3>
    <?php
    $i = 1;
    $services = db_query("select * from tbl_service where category_status='Active'");
    while ($row = mysqli_fetch_array($services)) {
        $desc = strip_tags($row['category_description']);
        $desc = (strlen($desc) > 500) ? substr($desc, 0, 500) . '..' : $desc;

        if ($i % 2 == 0) { ?>
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $compDATA['admin_company_name'] ?>">
                </div>
                <div class="col-lg-8" style="margin:auto;">
                    <h5> <?= $row['category_name'] ?> </h5>
                    <p><?= $desc ?></p>
                    <a href="<?= $site_url ?>/<?= $row['category_url'] ?>.htm" style="color: #5b5757;text-transform: uppercase;">Overview of attachments </a>
                </div>
            </div>
            <hr>
        <?php } else { ?>
            <div class="row">
                <div class="col-lg-8" style="margin:auto;">
                    <h5> <?= $row['category_name'] ?> </h5>
                    <p><?= $desc ?></p>
                    <a href="<?= $site_url ?>/<?= $row['category_url'] ?>.htm" style="color: #5b5757;text-transform: uppercase;">Overview of attachments </a>
                </div>
                <div class="col-lg-4">
                    <img src="<?= $site_url ?>/uploaded_files/<?= $row['category_image_name'] ?>" alt="<?= $compDATA['admin_company_name'] ?>">
                </div>
            </div>
            <hr>
    <?php }
        $i++;
    } ?>

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