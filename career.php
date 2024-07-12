<?php include "header.php" ?>
<?php 
$page_data = db_query("select * from tbl_site_pages where site_pages_link='career'");
$page = mysqli_fetch_array($page_data);
?>
<div class="container-fluid">
<!--<nav aria-label="breadcrumb">-->
<!--<ol class="breadcrumb">-->
<!--<li class="breadcrumb-item"><a href="<?=$site_url?>">Home</a></li>-->
<!--<li class="breadcrumb-item active" aria-current="page"><?=$page['site_pages_name']?></li>-->
<!--</ol>-->
<!--</nav>-->
</div>
<div class="container-fluid" id="divyancont" style="background-image:url('<?=$site_url?>/static_files/<?=$page[site_pages_inner_banner]?>')">
</div>

<div class="container text-center" style="padding: 54px;font-family: 'VolvoBroadProDigital';">
<h5 class="text-uppercase" style="font-size: 40px;"><?=$page['site_pages_name']?> </h5>
</div>

<div class="container">

<div class="row">
<div class="col-lg-6">
<a href="#"><img src="<?=$site_url?>/static_files/<?=$page['site_pages_image_name']?>"></a>
<?=$page['site_pages_description']?>
</div>
<div class="col-lg-6">

<!-- Form with header -->
<div class="card">
<form method="post" action="<?=htmlspecialchars($site_url.'/enquiry-submit.php');?>" name="contact-enq">
<input type="hidden" name="current_url" id="current_url" value="<?=$actual_link?>">
<input type="hidden" name="source" id="source" value="<?=$source?>">  
<div class="card-body">
<!-- Header -->
<div class="form-header blue accent-1">
<h3 class="mt-2"> Join Us</h3>
</div>
<p class="dark-grey-text">If You Have Any Query.</p>
<!-- Body -->
<div class="md-form">
<i class="fa fa-user prefix grey-text"></i>
<input type="text" id="form-name" class="form-control" name="name">
<label for="form-name">Your name</label>
</div>
<div class="md-form">
<i class="fa fa-envelope prefix grey-text"></i>
<input type="text" id="form-email" class="form-control" name="email">
<label for="form-email">Your email</label>
</div>
<div class="md-form">
  <i class="fa fa-tag prefix grey-text"></i>
  <input type="text" id="form-Subject" class="form-control" name="phone">
  <label for="form-Subject">Phone</label>
</div>
<div class="md-form">
    <input type="file" id="myFile" name="filename">
  </div>

<div class="md-form">
  <input type="text" id="captcha" class="form-control" name="captcha" maxlength="4" />
  <label for="form-Subject">Captcha</label>
    <input type="text" readonly id="txtCaptcha" style="background-image:url('<?=$site_url?>/images/cap.png'); text-align:center; border:none;font-weight:bold; font-family:Modern;font-size: 20px;" class="form-control"/>
  <!--<label for="form-Subject">Code</label>-->
    <i style="color:darkgrey;font-size:19px;cursor: pointer;" class="fa fa-refresh" onclick="DrawCaptcha();"></i>
</div>

<div class="text-center">
  <button class="btn btn-light-blue waves-effect waves-light" name="submit">Submit</button>
</div>
</div>
</form>
</div>
<!-- Form with header -->

</div>
</div>
</div>

<div class="parallax">
    <div class="container-fluid">
<div class="row">
<div class="col-12 pt-5" style="padding: 0px;">
<div class="divyanbackg1">
<center>
<h2 class="divyhhh">GET IN TOUCH</h2>
<p class="divyanpara99">Want to order or learn more? Send us a message.</p>
<button type="button" class="btn btn-primary divyabtnnn" onclick="window.location.href='<?=$site_url?>/contact-us.html';">Get In Touch</button></center>

</div>
</div>
</div>   
</div>
</div>
<?php include "footer.php" ?>