<?php include "header.php" ?>
<?php 
$page_data = db_query("select * from tbl_site_pages where site_pages_link='vision-and-mission'");
$page = mysqli_fetch_array($page_data);
?>
<div class="container">
<!--<nav aria-label="breadcrumb">-->
<!--<ol class="breadcrumb">-->
<!--<li class="breadcrumb-item"><a href="<?=$site_url?>">Home</a></li>-->
<!--<li class="breadcrumb-item active" aria-current="page"><?=$page['site_pages_name']?></li>-->
<!--</ol>-->
<!--</nav>-->
</div>
<!--<div class="container" id="divyancont" style="background-image:url('<?=$site_url?>/static_files/<?=$page[site_pages_inner_banner]?>')">-->
<!--</div>-->

<div class="container text-center" style="padding: 54px;">
<h5 class="text-uppercase" style="font-size: 40px;    font-family: 'VolvoBroadProDigital';"><?=$page['site_pages_name']?> </h5>
</div>

<div class="container">

<div class="row">
<div class="col-lg-5"><img src="<?=$site_url?>/img/mission.jpg" alt="<?=$compDATA['admin_company_name']?>" style="position: relative;
    top: 4%;padding: 16px;">
</div>
<div class="col-lg-7" style="margin:auto;">
<p><span style="font-size:24px"><span style="color:#000000; font-family:VolvoNovumRegular !important"><strong style="font-family: 'VolvoBroadProDigital';
    font-size: 41px;
    color: #494848;
    font-weight: 200;">MISSION </strong></span></span></p>

<ul>
	<li><span style="color:#000000"><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Premium class products and parts to customers. </span></span></span></li>
	<li><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Alpha is committed to serve its customers through well trained, competent personnel using latest technology / systems to enhance customer delight.</span></span></li>
	<li><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> To care for our employees and provide excellent work culture &amp; environment facilitating their best performance consistently.</span></span></li>
	<li><span style="color:#000000"><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Maintain culture of Stress free , Honest ,candid and just communication.&nbsp;</span></span></span></li>
</ul>
</div>

<div class="col-lg-5"><img src="<?=$site_url?>/img/mision2.jpg" alt="<?=$compDATA['admin_company_name']?>" style="position: relative;
    top: 4%;padding: 16px;">
</div>
<div class="col-lg-7" style="margin:auto;">
<p><span style="font-size:24px"><span style="color:#000000; font-family:VolvoNovumRegular !important"><strong style="font-family: 'VolvoBroadProDigital';
    font-size: 41px;
    color: #494848;
    font-weight: 200;">VISION</strong></span></span></p>
<ul>
	<li><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Nurturing a network of satisfied customers and building mutual loyalty, transparency, trust and Value.</span></span></li>
	<li><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> To be the leader in the Construction , Mining , Infrastructure and related industry through high quality products &amp; services delivering solutions to meet challenges for our valued customers.</span></span></li>
</ul>
</div>

<div class="col-lg-5"><img src="<?=$site_url?>/img/core-01.jpg" alt="<?=$compDATA['admin_company_name']?>" style="position: relative;
    top: 4%;padding: 16px;">
</div>

<div class="col-lg-7" style="margin:auto;">
<p><span style="font-size:24px"><span style="color:#000000; font-family:VolvoNovumRegular !important"><strong style="font-family: 'VolvoBroadProDigital';
    font-size: 41px;
    color: #494848;
    font-weight: 200;">CORE VALUES</strong></span></span></p>
<ul>
	<li><span style="color:#000000"><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Respect for all&nbsp;</span></span></span></li>
	<li><span style="color:#000000"><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Passion&nbsp;</span></span></span></li>
	<li><span style="color:#000000"><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Excellence&nbsp;</span></span></span></li>
	<li><span style="color:#000000"><span style="color:#000000"><span style="font-size:medium"><i class="fa fa-angle-double-right" id="dirt" aria-hidden="true"></i> Honesty &amp; Integrity </span></span></span></li>
</ul>
</div>

<!--<p><?=$page['site_pages_description']?></p>-->
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