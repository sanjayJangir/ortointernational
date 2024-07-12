<?php require_once("header.php");?>
<?php require_once("left-nav.php");?>
<?php require_once ('../includes/photoshop.php');?>
<?php
$category_id=trim($_REQUEST['id']);
$categoryID = trim($_GET['category_id']);

/*if($_REQUEST['delImage']!=""){

$delImage=$_REQUEST['delImage'];	
$isDel=db_query("UPDATE  tbl_dealers SET  category_image_name='' WHERE 1 and category_id = '$categoryID'");	
@unlink("../uploaded_files/$delImage");
@unlink("../uploaded_files/home_cat_thumb/$delImage");

header("location:addedit-dealer-locator.php?id=$categoryID");
}

if($_REQUEST['delImage_banner']!=""){
$isDel_banner=db_query("UPDATE  tbl_dealers SET category_inner_banner='' WHERE 1 and category_id = '$categoryID'"); 
@unlink("../uploaded_files/$_REQUEST[delImage_banner]");
header("location:addedit-dealer-locator.php?id=$categoryID");
}

if($_REQUEST['delVideo']!=""){
$isDel=db_query("UPDATE  tbl_dealers SET  category_video_name='' WHERE 1 and category_id = '$categoryID'"); 
@unlink("../uploaded_files/video/$_REQUEST[delVideo]");
header("location:addedit-dealer-locator.php?id=$categoryID");
}*/

if(is_post_back()){
//*************** UPDATE EXISTING CATEGORY START ************************//
$category_name=sanitize_input($_REQUEST['category_name']);
$location_name=sanitize_input($_REQUEST['location_name']);
$category_email=sanitize_input($_REQUEST['category_email']);
$category_mobile=sanitize_input($_REQUEST['category_mobile']);
$category_address=sanitize_input($_REQUEST['category_address']);
$branch_name=sanitize_input($_REQUEST['branch_name']);

$imgNAME ="";
if($_REQUEST['id']!='0') {
$category_url=ami_crete_url($category_name);
////////////****************** IMAGE RESIZING START HERE *****************************//

//------------FUNCTION TO GET IMAGE EXTENSION START---------------//
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
//------------FUNCTION TO GET IMAGE EXTENSION END---------------//


////////////****************** IMAGE RESIZING END HERE *****************************//

$sql = "update tbl_dealers set  
category_parent_id='0',     
category_map='$_REQUEST[category_map]',
category_name='$category_name',
location_name='$location_name',
category_email='$category_email',
category_mobile='$category_mobile',
category_address='$category_address',
branch_name='$branch_name',
category_is_product='No',
category_url='$category_url',
category_add_date='$curr_date',
category_status='$_REQUEST[category_status]'
where category_id = '$category_id' ";

db_query($sql);
$_SESSION["msg"]="Location Updated Successfully !";

header("Location:addedit-dealer-locator.php?id=$_REQUEST[id]");
exit;
//*************** UPDATE EXISTING CATEGORY END ************************//
}else{
$category_url=ami_crete_url($category_name);
//*************** INSERT NEW CATEGORY START ************************//

//------------FUNCTION TO GET IMAGE EXTENSION START---------------//
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
//------------FUNCTION TO GET IMAGE EXTENSION END---------------//

////////////****************** IMAGE RESIZING END HERE *****************************//


$sql = "insert into tbl_dealers set 
category_parent_id='0',
category_name='$category_name',
category_map='$_REQUEST[category_map]',
location_name='$location_name',
category_email='$category_email',
category_mobile='$category_mobile',
category_address='$category_address',
branch_name='$branch_name',
category_is_product='No',
category_url='$category_url',
category_add_date='$curr_date',
category_status='$_REQUEST[category_status]'";
db_query($sql);
$_SESSION["msg"]="Location added successfully !";

header("Location:addedit-dealer-locator.php?id=$_REQUEST[id]");
exit;
//*************** INSERT NEW CATEGORY END ************************//
}
}

if($category_id!='') {
$result = db_query("select * from tbl_dealers where category_id = '$category_id'");
if ($line_raw = mysqli_fetch_array($result)) {
@extract($line_raw);
}
}
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>

</div>
<div class="header-title">
<h1>Add/Edit location</h1>
<small>Add/Edit location content</small>


<a href="dealer-locator-list.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
<span class="btn-label" ><i class="fa fa-chevron-circle-left"></i></span>Go Back
</button></a>


</div>


</section>
<!-- Main content -->
<script src="ckeditor/ckeditor.js"></script>            
<section class="content">

<?php if($_SESSION["msg"]!="" && $_SESSION["type"]==""){?>               
<div class="alert alert-success alert-dismissable fade in text-center" style="background-color:#dff0d8;border:none; color:#000;margin:10px 0 10px 0">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success!&nbsp;&nbsp;&nbsp;</strong> <?=$_SESSION["msg"]?>
</div>
<?php 
unset($_SESSION["msg"]);
} else if($_SESSION["msg"]!="" && $_SESSION["type"]=="error"){?>
<div class="alert alert-danger alert-dismissable fade in text-center" style="background-color:#F32013;border:none; color:white;margin:10px 0 10px 0">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error!&nbsp;&nbsp;&nbsp;</strong> <?=$_SESSION["msg"]?>
</div>

<?php 
unset($_SESSION["msg"]);
unset($_SESSION["type"]);
}?>     

<div class="row">
<!-- Form controls -->
<div class="col-sm-12">
<div class="panel panel-bd lobidrag" data-edit-title='false' data-close='false' data-reload='false'>
<div class="panel-heading">
<div class="btn-group" id="buttonexport">
<a href="#">
<h4>General Information</h4>
</a>
</div>
</div>
<div class="panel-body">
<form name="form1" method="post" onsubmit="return formValidation()" enctype="multipart/form-data" class="col-sm-12" >


<div class="form-group col-lg-6">
 <label>Location Name</label>
<input type="text" class="form-control" placeholder="Enter Location Name" name="location_name" id="location_name"  value="<?=$location_name?>">
</div>

<div class="form-group col-lg-4">
   <label>Dealer Name</label>
<input type="text" class="form-control" placeholder="Enter Name" name="category_name" id="category_name"  value="<?=$category_name?>">
</div>

<div class="form-group col-lg-2">
   <label>Dealer Mobile No</label>
<input type="text" class="form-control" placeholder="Enter Mobile No" name="category_mobile" id="category_mobile"  value="<?=$category_mobile?>">
</div>

<div class="form-group col-lg-3">
   <label>Dealer Email</label>
<input type="text" class="form-control" placeholder="Enter Email" name="category_email" id="category_email"  value="<?=$category_email?>">
</div>

<div class="form-group col-lg-3">
 <label>Branch Name</label>  
  <input name="branch_name" id="branch_name" class="form-control" value="<?=$branch_name?>" />
</div> 
                                       
<div class="form-group col-lg-3">
 <label>Dealer Map Link</label>  
  <input name="category_map" id="category_map" class="form-control" value="<?=$category_map?>" />
</div>                          
     
<div class="form-group col-lg-3">
<label>Status</label>

<select name="category_status" class="form-control" >
<option value="Active" <?php if($category_status=='Active'){ ?> selected="selected" <?php } ?>>Active</option>
<option value="Inactive" <?php if($category_status=='Inactive'){ ?> selected="selected" <?php } ?>>Inactive</option>
</select>
</div>                             

<div class="form-group col-lg-5">
 <label>Dealer Address</label>
<textarea class="form-control" rows="3" name="category_address" placeholder="Enter Address here" id="category_address"><?=$category_address?></textarea>
</div>

<!-- <div class="col-lg-12" style="padding:0;background-color:#e8f1f3;margin:20px 0 50px 0">
     <div class="btn-group" id="buttonexport">
        <a href="#" >
           <h4 style="color:#000;font-weight:600;padding:5px">SEO Related Information</h4>
        </a>
     </div>
  </div>                             
       
       
        <div class="form-group col-lg-12">
           <label>Category Meta Title</label>
<textarea class="form-control" rows="3" name="category_meta_title" id="category_meta_title" placeholder="Enter category meta title here" ><?=$category_meta_title?></textarea>
        </div>
        <div class="form-group col-lg-12">
           <label>Category Meta Description</label>
<textarea class="form-control" rows="3" placeholder="Enter category meta description here" name="category_meta_description" id="category_meta_description"><?=$category_meta_description?></textarea>
        </div>
        <div class="form-group col-lg-12">
           <label>Category Meta Keyword</label>
<textarea class="form-control" rows="3" name="category_meta_keywords" placeholder="Enter category meta keywords here" id="category_meta_keywords"><?=$category_meta_keywords?></textarea>
        </div>
-->                              
        
       
        <div class="col-lg-12 reset-button">
                                           
           <button type="submit" class="btn btn-add">Submit</button>
          
        </div>
     </form>
  </div>
</div>
</div>
</div>
</section>
<!-- /.content -->
</div>
<?php require_once("footer.php"); ?>
