<?php include "header.php" ?>
<style>
    .market-area-heading h1 {
        padding: 10px;
        margin: 0 0 10px;
        background-color: #ee3232;
        border-radius: 5px;
        font-size: 20px;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
    }

    .market-area h4 {
        color: #000;
        margin-bottom: 10px;
    }

    .market-area h4 a {
        margin: 0 0 5px;
        font-size: 18px;
        color: #ef682f;
        line-height: 1.1;
        font-weight: 600;
        text-transform: uppercase;
    }

    .market-area ul {
        overflow: hidden;
    }

    .market-area ul li {
        float: left;
        width: 25%;
        margin-right: 0%;
        margin-bottom: 10px;
    }

    .market-area ul li a {
        padding: 6px 10px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid #423f3f;
        color: #423f3f;
        width: 98%;
        display: inline-block;
        margin-right: 10px;
    }

    .market-area ul li a:hover {
        color: #fff;
        text-decoration: none;
        border: 1px solid #000;
        background-color: #000;
    }

    .market-place h3 {

        background: #ff8c00;
        color: #FFFFFF;
        padding: 10px;
        text-transform: uppercase;
        font-size: 18px;
        border-radius: 5px;
        font-weight: 600;
        text-align: center;

    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sitemap</li>
    </ol>
</nav>


<div class="container">

    <div class="row">

        <div class="col-lg-12 col-12">

            <div class="row">
                <div class="col-lg-12">
                    <div class="market-area">
                        <h4><a href="#">Pages</a></h4>
                        <ul>
                            <?php
                            $pages = db_query("select * from tbl_site_pages where site_pages_status='Active' order by site_pages_order_by");
                            while ($row = mysqli_fetch_array($pages)) {
                                if ($row['site_pages_link'] == "latest-updates") { ?>
                                    <li><a href="<?= $site_url ?>/<?= $row['site_pages_link'] ?>1.html"><?= $row['site_pages_name'] ?></a></li>
                                <?php } else { ?>
                                    <li><a href="<?= $site_url ?>/<?= $row['site_pages_link'] ?>.html"><?= $row['site_pages_name'] ?></a></li>
                            <?php }
                            } ?>

                            <?php
                            $categories = db_query("select * from tbl_category where category_status='Active' and category_parent_id='0'");
                            while ($cat = mysqli_fetch_array($categories)) { ?>

                                <li><a href="<?= $site_url ?>/<?= $cat['category_url'] ?>.html"><?= $cat['category_name'] ?></a></li>

                                <?php
                                $subcategories = db_query("select * from tbl_category where category_status='Active' and category_parent_id='$cat[category_id]'");
                                while ($subcat = mysqli_fetch_array($subcategories)) { ?>
                                    <li><a href="<?= $site_url ?>/<?= $subcat['category_url'] ?>.html"><?= $subcat['category_name'] ?></a></li>
                            <?php }
                            } ?>

                        </ul>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<?php include "footer.php" ?>