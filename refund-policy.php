<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_link='refund-policy'");
$page=mysqli_fetch_array($page_data);
?>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$site_url?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?=$page['site_pages_name']?></li>
  </ol>
</nav>
</div>
<div class="container text-center" style="padding: 22px;">
<h5 class="text-uppercase" style="font-size: 38px;"><?=$page['site_pages_name']?> </h5>
</div>
<div class="container">
<div class="row">
<div class="col-md-12">

<p><?=$page['site_pages_description']?></p>

</div>
</div>
</div>
<?php include "footer.php" ?>