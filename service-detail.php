<?php include "header.php" ?>
<?php 
$service = db_query("select * from tbl_service where category_url='$_REQUEST[service_name]'");
$data = mysqli_fetch_array($service);
?>
<!--<nav aria-label="breadcrumb">-->
<!--  <ol class="breadcrumb">-->
<!--    <li class="breadcrumb-item"><a href="<?=$site_url?>">Home</a></li>-->
<!--    <li class="breadcrumb-item active" aria-current="page"><?=$data['category_name']?></li>-->
<!--  </ol>-->
<!--</nav>-->
<div class="container" id="divyancont">
  <div class="row">
      <div class="col-lg-12 col-12">
       <div class="divyanservice">   
    <p class="lead">CRAWLER EXCAVATORS ATTACHMENTS</p>
    <h1 class="display-4" id="meta8">THE ULTIMATE <br>COMBINATION
</h1>
    </div>
  </div>
  </div>
</div>

<div class="container text-center" style="padding: 54px;">
<h5 class="text-uppercase">VOLVO HAS THE RIGHT ATTACHMENT FOR THE JOB </h5>
<p class="font1">
A Volvo excavator and bucket together with a factory fitted quick coupler delivers the ultimate combination of high productivity, safety, precise control and reduced fuel consumption. Experience a new way of working and get the job done with Volvo.
</p>
<h5 class="text-capitalize">Please note that the attachments offering for machine models may vary in different markets.</h5>
</div>

<div class="container">
    
<div class="card-deck">
    <div class="row">
  <div class="col-lg-5">
<div class="card" id ="divyacrd">
<a href="category.php"><img class="card-img-top-divyan2" src="<?=$site_url?>/uploaded_files/<?=$data['category_image_name']?>" alt="<?=$compDATA['admin_company_name']?>"></a>
</div>
</div>
  <div class="col-lg-7" id="divyancenter">
<div class="card divyan00" id ="divyan01">
<?=$data['category_description']?>
</div>   
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