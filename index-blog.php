<?php

include("includes/config.inc.php");
$blogs = db_query("select * from tbl_blogs where blog_status='Active' order by blog_id desc limit 3");
if (mysqli_num_rows($blogs) > 0) { ?>
    <div class="container md-5 pt-5 text-center ">
        <h3 class="text-uppercase pb-4 font1">Our Latest Updates </h3>
        <?php
        while ($row = mysqli_fetch_array($blogs)) {
            $final_name = (strlen($row['blog_title']) > 50) ? substr($row['blog_title'], 0, 50) . "..." : $row['blog_title'];
            $final_desc = strip_tags($row['blog_description']);
            $final_desc = (strlen($final_desc) > 210) ? substr($final_desc, 0, 210) . ".." : $final_desc;
        ?>
            <a href="<?= $site_url ?>/latest-updates/<?= $row['blog_url'] ?>">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?= $site_url ?>/blog/<?= $row['blog_image_name'] ?>" alt="<?= $row['blog_title'] ?>" style="width:100%;height:150px;">
                    </div>
                    <div class="col-md-9">
                        <p style="color: #a7a8a9;text-align:left;margin:0px;"><?= date('d M, Y', strtotime($row['blog_add_date'])) ?></p>
                        <blockquote class="blockquote" style="padding: 10px;text-align: center;">
                            <p class="mb-0"><?= $final_name ?></p>
                            <p class="blockquote-footer"><?= $final_desc ?></p>
                        </blockquote>
                    </div>
                </div>
            </a>
            <hr>
        <?php } ?>
    </div>
<?php } ?>