<?php include "header.php" ?>
<?php 
$blog_id=db_scalar("select blog_id from tbl_blogs where blog_url='$_REQUEST[blog_name]'");
$blog_data=db_query("select * from tbl_blogs where blog_id='$blog_id'");
$blog=mysqli_fetch_array($blog_data);
?>
<div class="container">
<!--<nav aria-label="breadcrumb">-->
<!--  <ol class="breadcrumb">-->
<!--    <li class="breadcrumb-item"><a href="<?=$site_url?>">Home</a></li>-->
<!--    <li class="breadcrumb-item active" aria-current="page">Events & News</li>-->
<!--  </ol>-->
<!--</nav>-->
</div>


<div class="container" style=" min-height: 70vh;">
    <h5 class="divtitle"><?=$blog['blog_title']?></h5>
<div class="row">
  <div class="col-lg-5">
      <img  src="<?=$site_url?>/blog/<?=$blog['blog_image_name']?>" alt="<?=$blog['blog_title']?>" title="<?=$blog['blog_title']?>" style="    width: 100%;">
</div>

  <div class="col-lg-7" >
<?=$blog['blog_description']?>
</div>   
</div>
</div>


<?php include "footer.php" ?>