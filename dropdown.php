<?php 
include_once 'includes/dbsmain.inc.php'; ?>
<?php include_once 'site-main-query.php'; ?>
<?php 
redirectTohttps();
date_default_timezone_set("asia/kolkata");
$currDate=date('Y-m-d');
$site_url=$compDATA['admin_website_url'];
$page_name=basename($_SERVER['PHP_SELF'],'.php');
$redirect = $site_url."/".$page_name.".html";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(!empty($_REQUEST['state_name'])){
$check = db_scalar("select count(*) from tbl_marketplace where category_url='$_REQUEST[state_name]'");
if($check==0){
header('location:'.$site_url);
}
}

if(!empty($_REQUEST['cat_name'])){
$cat_id=db_scalar("select category_id from tbl_category where category_url='$_REQUEST[cat_name]'");
}if(!empty($_REQUEST['subcat_name'])){
$subcat_id=db_scalar("select category_id from tbl_category where category_url='$_REQUEST[subcat_name]'");
}if(!empty($_REQUEST['blog_name'])){
$blog_id=db_scalar("select blog_id from tbl_blogs where blog_url='$_REQUEST[blog_name]'");
}

if(!empty($subcat_id)){
$source=db_scalar("select category_name from tbl_category where category_id='$subcat_id'");
}else if(!empty($cat_id)){
$source=db_scalar("select category_name from tbl_category where category_id='$cat_id'");
}else{
$source=$page_name;
}

if($page_name=="index"){
visitorCounter();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php if(!empty($_REQUEST['state_name'])){
if(!empty($subcat_id)){?>
<title>
<?php
$business_type = explode(',', $compDATA['admin_business_type']); 
$counter=1;
$total_count=COUNT($business_type);
for($i=0;$i<COUNT($business_type);$i++){?>
<?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> <?=$business_type[$i]?> in <?=str_replace('-',' ',$_REQUEST['state_name'])?> <?php if($counter<$total_count){?>,<?php } ?>
<?php $counter++;}?>
</title>

<meta name="description" content="Looking for High quality <?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> Manufacturers in <?=str_replace('-',' ',$_REQUEST['state_name'])?>? Save Huge Amount, Buy from <?=$compDATA['admin_company_name']?>, <?=$compDATA['admin_state']?> - <?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> Wholesaler, Supplying to <?=str_replace('-',' ',$_REQUEST['state_name'])?> at reasonable price. Call <?=$compDATA['admin_mobile']?>">

<meta name="keywords" content="<?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> Manufacturers in <?=str_replace('-',' ',$_REQUEST['state_name'])?>, <?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> Suppliers in <?=str_replace('-',' ',$_REQUEST['state_name'])?>, <?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> Exporter in <?=str_replace('-',' ',$_REQUEST['state_name'])?>, <?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> Traders in <?=$compDATA['admin_state']?>, <?=db_scalar("select category_name from tbl_category where category_id='$subcat_id'")?> <?=$compDATA['admin_company_name']?>">

<?php }else if(!empty($cat_id)){?>

<title>
<?php
$business_type = explode(',', $compDATA['admin_business_type']); 
$counter=1;
$total_count=COUNT($business_type);
for($i=0;$i<COUNT($business_type);$i++){?>
<?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> <?=$business_type[$i]?> in <?=str_replace('-',' ',$_REQUEST['state_name'])?> <?php if($counter<$total_count){?>,<?php } ?>
<?php $counter++;}?>
</title>

<meta name="description" content="Looking for High quality <?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> Manufacturers in <?=str_replace('-',' ',$_REQUEST['state_name'])?>? Save Huge Amount, Buy from <?=$compDATA['admin_company_name']?>, <?=$compDATA['admin_state']?> - <?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> Wholesaler, Supplying to <?=str_replace('-',' ',$_REQUEST['state_name'])?> at reasonable price. Call <?=$compDATA['admin_mobile']?>">

<meta name="keywords" content="<?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> Manufacturers in <?=str_replace('-',' ',$_REQUEST['state_name'])?>, <?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> Suppliers in <?=str_replace('-',' ',$_REQUEST['state_name'])?>, <?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> Exporter in <?=str_replace('-',' ',$_REQUEST['state_name'])?>, <?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> Traders in <?=$compDATA['admin_state']?>, <?=db_scalar("select category_name from tbl_category where category_id='$cat_id'")?> <?=$compDATA['admin_company_name']?>">

<?php }else{?>
<title>God Statue Manufacturer <?=str_replace('-',' ',$_REQUEST['state_name'])?>,Marble Radhe krishna Statue, Ganesh Marble Statue Suppliers <?=str_replace('-',' ',$_REQUEST['state_name'])?>, Human Statue <?=str_replace('-',' ',$_REQUEST['state_name'])?></title>

<meta name="description" content="Looking for High quality Ganesh Marble Statue Manufacturer <?=str_replace('-',' ',$_REQUEST['state_name'])?>? Save Huge Amount, Buy from <?=$compDATA['admin_company_name']?>, <?=$compDATA['admin_state']?> - Marble Radhe krishna Statue Wholesaler, Ganesh Marble Statue Supplying to <?=str_replace('-',' ',$_REQUEST['state_name'])?> at reasonable price. Call <?=$compDATA['admin_mobile']?>">

<meta name="keywords" content="Ganesh Marble Statue Manufacturers <?=str_replace('-',' ',$_REQUEST['state_name'])?>,Marble Radhe krishna Statue <?=str_replace('-',' ',$_REQUEST['state_name'])?>, Ganesh Marble Statue Suppliers <?=str_replace('-',' ',$_REQUEST['state_name'])?>,Human Statue Manufacturer <?=str_replace('-',' ',$_REQUEST['state_name'])?>">

<?php }

}else{

if(!empty($subcat_id)){?>

<title><?=db_scalar("select category_meta_title from tbl_category where category_id='$subcat_id'")?></title>
<meta name="description" content="<?=db_scalar("select category_meta_description from tbl_category where category_id='$subcat_id'")?>">
<meta name="keywords" content="<?=db_scalar("select category_meta_keywords from tbl_category where category_id='$subcat_id'")?>">

<?php }else if(!empty($cat_id)){?>

<title><?=db_scalar("select category_meta_title from tbl_category where category_id='$cat_id'")?></title>
<meta name="description" content="<?=db_scalar("select category_meta_description from tbl_category where category_id='$cat_id'")?>">
<meta name="keywords" content="<?=db_scalar("select category_meta_keywords from tbl_category where category_id='$cat_id'")?>">

<?php }else if(!empty($blog_id)){?>

<title><?=db_scalar("select blog_meta_title from tbl_blogs where blog_id='$blog_id'")?></title>
<meta name="description" content="<?=db_scalar("select blog_meta_description from tbl_blogs where blog_id='$blog_id'")?>">
<meta name="keywords" content="<?=db_scalar("select blog_meta_keywords from tbl_blogs where blog_id='$blog_id'")?>">

<?php }else{?>

<title><?=db_scalar("select site_pages_meta_title from tbl_site_pages where site_pages_link='$page_name'")?></title>
<meta name="description" content="<?=db_scalar("select site_pages_meta_description from tbl_site_pages where site_pages_link='$page_name'")?>">
<meta name="keywords" content="<?=db_scalar("select site_pages_meta_keyword from tbl_site_pages where site_pages_link='$page_name'")?>">

<?php }}?>
<link rel="canonical" href="<?=$compDATA['admin_canonical_link']?>" />
<link href="<?=$site_url?>/<?=$compDATA['admin_favicon']?>" rel="icon">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel="stylesheet" href="<?=$site_url?>/css/style.css">
<script src="https://use.fontawesome.com/471957ce91.js"></script>
<style>
h5 {
font-size: 22px;
font-family: fantasy;
color: #555454;
word-spacing:5px;
}
.megamenu-li {
position: static;
}

.megamenu {
position: absolute;
width: 56%;
left: 0;
right: 0;
padding: 15px;
margin: auto;
}
.navbar {
    padding: 0 10%;
    background-color: #e1dfdd !important;
}

/*@media (min-width: 768px)*/
/*.navbar-expand-md .navbar-nav .nav-link {*/
/*    text-transform: uppercase;*/
/*    padding-right: 3rem !important;*/
/*}*/
.paratext{
text-align: center;
}
.divyanalpha{
height: auto;
width:100%;
border-right:1px solid lightgrey;
}
</style>
</head>
<header>
<div class="container">
<div class="row ">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-2 mb-3">
<a href="<?=$site_url?>"><img class="img-fluid" src="<?=$site_url?>/header_files/<?=db_scalar("select header_logo from tbl_header where header_status='Active'")?>" alt="<?=$compDATA['admin_company_name']?>" width="400px;"></a>
</div>
<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mt-4 mb-3 d-sm-block d-none">
<div class="rows">
<img src="https://demo.dial4webindia.com/volvo/uploaded_files/7a3e9532847b81.ico" class="tlogo mt-3 mr-auto">
<img src="https://demo.dial4webindia.com/volvo/uploaded_files/fc0582b970b1ed.png" class="tlogo mt-3 mr-auto">

</div></div>
<div class="col-xl-3 col-lg-3 col-md-2 col-sm-12 col-12 d-sm-block d-none">
<a class="nav-link pt-0 pb-2" href="<?=$site_url?>/sitemap.html">Sitemap &nbsp; | &nbsp;  Connect with Us </a>
<div class="rows mt-3 ">
<form method="post" action="<?=htmlspecialchars($site_url.'/search-result.php');?>" style="display:flex;">   
<input type="search" class="input-group-text rounded-0" name="search_keyword" placeholder="Search Here" value="<?=$search_keyword?>" required>
<div class="input-group-append">
<button type="submit" class="input-group-text rounded-0" id="basic-addon2"><i class="fa fa-search"></i></button>
</form>
</div>
</div></div>
</div>   
</div>

<nav class="navbar navbar-expand-md  navbar-light bg-light rounded text-center">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link" href="#">Home</a>
</li>
<li class="nav-item dropdown megamenu-li">
<a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Brands</a>
<div class="dropdown-menu megamenu" aria-labelledby="dropdown02">
<div class="row">
<div class="col-lg-12" style="padding: 0px 40px 0px 40px">
<h5>Our Brands</h5>
<p style="font-size: 12px;">Volvo Construction Equipment designs and manufactures an entire product portfolio of machines. Volvo Construction Equipment designs and manufactures an entire product portfolio of machines.</p>
</div>
<div class="col-lg-4"> 
<div class="" style="height:150px;">
<img class="divyanalpha" src="https://demo.dial4webindia.com/volvo/uploaded_files/74fb2696e0c467.png" alt="..."></div>
<a href=""> <h5 style="text-align: center;">View Products</h5> </a>
</div>
<div class="col-lg-4"> 
<div class="" style="height:150px;">
<img class="divyanalpha" src="https://demo.dial4webindia.com/volvo/uploaded_files/fc0582b970b1ed.png" alt="..." ></div>
<a href=""> <h5 style="text-align: center;">View Products</h5> </a>
</div>
</div>
</div>
</li>
<li class="nav-item dropdown megamenu-li">
<a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
<div class="dropdown-menu megamenu" aria-labelledby="dropdown02">
<div class="row">
<div class="col-lg-12" style="padding: 0px 40px 0px 40px">
<h5>Our Brands</h5>
<p style="font-size: 12px;">Volvo Construction Equipment designs and manufactures an entire product portfolio of machines. Volvo Construction Equipment designs and manufactures an entire product portfolio of machines.</p>
</div>
<div class="col-lg-4"> 
<div class="row"> 
<div class="col-lg-8"> 
<div class="" style="height:150px;">
<img class="divyanalpha" src="https://demo.dial4webindia.com/volvo/uploaded_files/74fb2696e0c467.png" alt="..."></div>
</div>
<div class="col-lg-4">
<a href=""> <h6 style="text-align: center;">View Products</h6> </a>
</div>
</div>
</div>
<div class="col-lg-4"> 
<div class="row"> 
<div class="col-lg-8"> 
<div class="" style="height:150px;">
<img class="divyanalpha" src="https://demo.dial4webindia.com/volvo/uploaded_files/74fb2696e0c467.png" alt="..."></div>
</div>
<div class="col-lg-4">
<a href=""> <h5 style="text-align: center;">View Products</h5> </a>
</div>
</div>
</div>
<div class="col-lg-4"> 
<div class="row"> 
<div class="col-lg-8"> 
<div class="" style="height:150px;">
<img class="divyanalpha" src="https://demo.dial4webindia.com/volvo/uploaded_files/74fb2696e0c467.png" alt="..."></div>
</div>
<div class="col-lg-4">
<a href=""> <h5 style="text-align: center;">View Products</h5> </a>
</div>
</div>
</div>
</div>
</div>
</li>
<li class="nav-item dropdown megamenu-li">
<a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carrer</a>
<div class="dropdown-menu megamenu" aria-labelledby="dropdown02">
<div class="row">
<div class="col-sm-6 col-lg-4">
<h5>Image Slider</h5>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active">
<img class="d-block w-100" src="https://source.unsplash.com/250x150/?sig=1" alt="...">
</div>
<div class="carousel-item">
<img class="d-block w-100" src="https://source.unsplash.com/250x150/?sig=2" alt="...">
</div>
<div class="carousel-item">
<img class="d-block w-100" src="https://source.unsplash.com/250x150/?sig=3" alt="...">
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<h5>Links</h5>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
</div>
<div class="col-sm-6 col-lg-5">
<h5>Paragraph</h5>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam impedit itaque minus distinctio possimus reiciendis et repellat. Voluptate, temporibus veniam et praesentium alias, maxime repudiandae aliquid, natus omnis animi iste!</p>
</div>
</div>
</div>
</li>
<li class="nav-item dropdown megamenu-li">
<a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
<div class="dropdown-menu megamenu" aria-labelledby="dropdown02">
<div class="row">
<div class="col-sm-6 col-lg-4">
<h5>Image Slider</h5>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active">
<img class="d-block w-100" src="https://source.unsplash.com/250x150/?sig=1" alt="...">
</div>
<div class="carousel-item">
<img class="d-block w-100" src="https://source.unsplash.com/250x150/?sig=2" alt="...">
</div>
<div class="carousel-item">
<img class="d-block w-100" src="https://source.unsplash.com/250x150/?sig=3" alt="...">
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<h5>Links</h5>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
</div>
<div class="col-sm-6 col-lg-5">
<h5>Paragraph</h5>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam impedit itaque minus distinctio possimus reiciendis et repellat. Voluptate, temporibus veniam et praesentium alias, maxime repudiandae aliquid, natus omnis animi iste!</p>
</div>
</div>
</div>
</li>
</ul>
</div>
</nav>

</header>
<body>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js'></script>
<script>
$(document).ready(function() {
$(".megamenu").on("click", function(e) {
e.stopPropagation();
});
});
</script>