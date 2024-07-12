<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_link='latest-updates'");
$page = mysqli_fetch_array($page_data);
?>
<!--<nav aria-label="breadcrumb">-->
<!--  <ol class="breadcrumb">-->
<!--    <li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>-->
<!--    <li class="breadcrumb-item active" aria-current="page"><?= $page['site_pages_name'] ?></li>-->
<!--  </ol>-->
<!--</nav>-->



<div class="container md-5 pt-5 text-center ">
  <h3 class="text-uppercase pb-4 font1 font-weight-bold">Our Latest Updates </h3>
  <div class="card-group">

    <?php
    $limit = 12;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $index_blog = db_query("select * from tbl_blogs where blog_status='Active' order by blog_id desc LIMIT $offset,$limit");
    $blog_count = db_scalar("select COUNT(*) from tbl_blogs");
    while ($blog = mysqli_fetch_array($index_blog)) {
      $final_name = (strlen($blog['blog_title']) > 25) ? substr($blog['blog_title'], 0, 25) . "..." : $blog['blog_title'];
      $final_desc = strip_tags($blog['blog_description']);
      $final_desc = (strlen($final_desc) > 85) ? substr($final_desc, 0, 85) . "..." : $final_desc;
    ?>
      <div class="card">
        <img class="card-img-top" src="<?= $site_url ?>/blog/<?= $blog['blog_image_name'] ?>" alt="<?= $blog['blog_title'] ?>">
        <div class="card-body"><a href="<?= $site_url ?>/latest-updates/<?= $blog['blog_url'] ?>">
            <h5 class="card-title"><?= $final_name ?></h5>
          </a>
          <p class="card-text"><?= $final_desc ?></p>
          <p class="card-text"><small class="text-muted"><?= date('d M, Y', strtotime($blog['blog_add_date'])) ?></small></p>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<?php include "footer.php" ?>