<?php include "header.php" ?>

<?php 
$attachment_data = db_query("select * from tbl_attachments where url='$_REQUEST[attachment_url]'");
$data = mysqli_fetch_array($attachment_data);
 ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?=$data['name']?></h1>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a href="<?=$site_url?>"><li class="breadcrumb-item" aria-current="page">Home</li></a>
    &nbsp; / &nbsp;
    <a href="#"><li class="breadcrumb-item active" aria-current="page"><?=$data['name']?></li></a>
  </ol>
</nav>
  </div>
</div>

<div class="container">
    
<div class="card-deck">
    <div class="row">
  <div class="col-lg-4">
<div class="card" id ="divyacrd">
<a href="#"><img class="card-img-top-divyan" src="<?=$site_url?>/uploaded_files/<?=$data['attachment_image_name']?>" alt="<?=$data['name']?>"></a>
</div>
</div>
  <div class="col-lg-8" id="divyancenter">
<div class="card divyan00" id ="divyan01">
    <h5 class="divyanh5"><?=$data['name']?>
</h5>
   <?=$data['description']?>
</div>   
</div>
</div>
</div>
</div>
<div class="container-fluid pd-5 pt-5 text-center ">
<h3 class="text-uppercase pb-4 font1 font-weight-bold">Excavators</h3>


<ul class="nav nav-tabs md-tabs indigo" id="myTabJust" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
      aria-selected="true">Imperial</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
      aria-selected="false">Metric</a>
  </li>
</ul>
<div class="tab-content card" id="myTabContentJust">
  <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
    <div class="card-deck">
<?=$data['imperial']?>
</div>
  </div>
  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
   <div class="card-deck">
<?=$data['metric']?>
</div>
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