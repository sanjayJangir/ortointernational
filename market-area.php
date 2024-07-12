<?php include "header.php" ?>
<style>
    /*    .market-area-heading h1 {*/
    /*    padding: 10px;*/
    /*    margin: 0 0 10px;*/
    /*    background-color: #ee3232;*/
    /*    border-radius:5px;*/
    /*    font-size: 20px;*/
    /*    color: #fff;*/
    /*    font-weight: 600;*/
    /*    text-transform: uppercase;*/
    /*}*/

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
        <li class="breadcrumb-item active" aria-current="page">Market Area</li>
    </ol>
</nav>


<div class="container">

    <div class="row">

        <div class="col-lg-12 col-12">

            <div class="row">
                <div class="col-lg-12">
                    <div class="market-area-heading">
                        <h4>Market Area</h4>

                    </div>
                    <div class="market-area">
                        <?php
                        $marketplace_state_data = db_query("select * from tbl_marketplace where category_status='Active' and category_parent_id='0' order by category_order_by");
                        while ($marketplace_state = mysqli_fetch_array($marketplace_state_data)) {

                            $check_subcat = db_scalar("select COUNT(category_id) from tbl_marketplace where category_parent_id='$marketplace_state[category_id]'");
                        ?>
                            <h4><a href="<?= $site_url ?>/<?= $marketplace_state['category_url'] ?>/"><?= $marketplace_state['category_name'] ?></a></h4>
                            <?php
                            if ($check_subcat > 0) {
                                $marketplace_district_data = db_query("select * from tbl_marketplace where category_status='Active' and category_parent_id='$marketplace_state[category_id]'");
                            ?>
                                <ul>
                                    <?php
                                    while ($marketplace_district = mysqli_fetch_array($marketplace_district_data)) {

                                    ?>
                                        <li><a href="<?= $site_url ?>/<?= $marketplace_district['category_url'] ?>/"><?= $marketplace_district['category_name'] ?></a></li>

                                    <?php } ?>
                                </ul>

                        <?php }
                        } ?>

                    </div>


                </div>

            </div>

        </div>
    </div>
</div>

<?php include "footer.php" ?>