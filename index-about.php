<?php 
$index_data = db_query("select * from tbl_site_pages where site_pages_id='47'");
$index = mysqli_fetch_array($index_data);
?>
<div class="container pd-5 pt-5 text-center ">
<h5 class="text-uppercase" style="font-family: VolvoNovumMedium;
text-transform: uppercase;font-size: 20px;line-height: 24px;margin-bottom: 8px;color: #a7a8a9;">
    We Promise To Find You The Right Equipment </h5>
<h2 class="text-capitalize font1 pd-5" style="font-family: VolvoNovumMedium;font-size: 24px;color: #53565a; text-transform: uppercase !important;font-weight: 600;">Browse Machinery Categories</h2>
<?=$index['site_pages_description']?>
</div>