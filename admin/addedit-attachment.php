<?php require_once("header.php");?>
<?php require_once("left-nav.php");?>
<?php require_once ('../includes/photoshop.php');?>
<?php
$id = $_REQUEST['id'];
$product_id = $_REQUEST['product_id'];
$subcatid = $_REQUEST['subcatid'];
$catid = $_REQUEST['catid'];

if($_REQUEST['delImage']!=""){

$delImage=$_REQUEST['delImage'];	
$isDel=db_query("UPDATE tbl_attachments SET attachment_image_name='' WHERE 1 and id = '$id'");
@unlink("../uploaded_files/$delImage");
header("location:addedit-attachment.php?id=$id&product_id=$product_id&subcatid=$subcatid&catid=$catid");
}


if(is_post_back()){
//*************** UPDATE EXISTING CATEGORY START ************************//
$name=sanitize_input($_REQUEST['name']);
$description=sanitize_input($_REQUEST['description']);
$meta_title=sanitize_input($_REQUEST['meta_title']);
$meta_keyword=sanitize_input($_REQUEST['meta_keyword']);
$meta_description=sanitize_input($_REQUEST['meta_description']);

$imperial=sanitize_input($_REQUEST['imperial']);
$metric=sanitize_input($_REQUEST['metric']);

$imgNAME ="";
if($_REQUEST['id']!='0') {
$url=ami_crete_url($name);
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
if($_SERVER["REQUEST_METHOD"] == "POST") {

$image =$_FILES["file"]["name"];
$imgToDel=db_scalar("SELECT attachment_image_name FROM tbl_attachments WHERE  id='$id'");	

if($image){

@unlink("../uploaded_files/$imgToDel");


$uploadedfile = $_FILES['file']['tmp_name']; 
$filename = stripslashes($_FILES['file']['name']); 	
$extension = getExtension($filename);
$extension = strtolower($extension);		
$imgNAME = substr(md5($url.time().rand(1,10)),0,14).".".$extension;	
move_uploaded_file($_FILES['file']['tmp_name'],"../uploaded_files/$imgNAME");

}else{
$imgNAME=$imgToDel;
}


}


$sql = "update tbl_attachments set  
product_id='$product_id',      
name='$name',     
attachment_image_name='$imgNAME',
description='$description',   
url='$url',
add_date='$curr_date',
meta_title='$meta_title',
meta_keyword='$meta_keyword',
imperial='$imperial',
metric='$metric',
meta_description='$meta_description' where id = '$id' ";

db_query($sql);
$_SESSION["msg"]="Attachement Updated Successfully !";
header("Location:addedit-attachment.php?id=$id&product_id=$product_id&subcatid=$subcatid&catid=$catid");
exit;
//*************** UPDATE EXISTING CATEGORY END ************************//
}else{
$url=ami_crete_url($name);
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
if($_SERVER["REQUEST_METHOD"] == "POST"){
$image =$_FILES["file"]["name"];
if($image){
$uploadedfile = $_FILES['file']['tmp_name']; 
$filename = stripslashes($_FILES['file']['name']); 	
$extension = getExtension($filename);
$extension = strtolower($extension);		
$imgNAME = substr(md5($url.time().rand(1,10)),0,14).".".$extension;	
move_uploaded_file($_FILES['file']['tmp_name'],"../uploaded_files/$imgNAME");
}else{
$imgNAME=$imgToDel;
}

}


$sql = "insert into tbl_attachments set 
product_id='$product_id',
name='$name',			
attachment_image_name='$imgNAME',
description='$description', 	
url='$url',
meta_title='$meta_title',
meta_keyword='$meta_keyword',
meta_description='$meta_description',
imperial='$imperial',
metric='$metric',
add_date='$curr_date'";
db_query($sql);
$_SESSION["msg"]="Attachement added successfully !";

header("Location:addedit-attachment.php?id=$id&product_id=$product_id&subcatid=$subcatid&catid=$catid");
exit;
//*************** INSERT NEW CATEGORY END ************************//
}
}

if($id!=0) {
$result = db_query("select * from tbl_attachments where id = '$id'");
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
<h1>Add/Edit Attachment</h1>
<small>Add/Edit Attachment content</small>


<a href="manage-attachment.php?product_id=<?=$product_id?>&subcatid=<?=$subcatid?>&catid=<?=$catid?>"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
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

<div class="row">                                                         
<div class="form-group col-lg-3">
<label>Attachment Image</label>
<?php if($attachment_image_name!=""){ ?>
<img src="../uploaded_files/<?=$attachment_image_name?>" class="form-control" style="width:150px;height:150px" />
<?php }else{?>
<img src="assets/dist/img/no-image.jpg" class="form-control" style="width:120px;height:150px" />
<?php }?>

<?php if($attachment_image_name!=""){ ?>
<div class="col-lg-12 " ><a href="addedit-attachment.php?delImage=<?=$attachment_image_name?>&id=<?=$id?>&product_id=<?=$product_id?>&subcatid=<?=$subcatid?>&catid=<?=$catid?>" style="font-weight:600;margin-left:15px;text-decoration:underline" >Remove Image</a>                  
</div>
<?php }?>

</div>

<div class="form-group col-lg-3" style="margin-top:100px">
<input type="file" name="file" id="file" />
</div>

</div>


<div class="form-group col-lg-9">
<label>Attachment Name</label>
<input type="text" class="form-control" placeholder="Enter Name" name="name" id="name"  value="<?=$name?>">
</div>


<div class="form-group col-lg-12">
<label>Attachment Description</label>
<textarea class="form-control" name="description" rows="3" id="editor1"><?=$description?></textarea>
</div>
<script>
CKEDITOR.replace( 'editor1');
</script>                
   
<div class="form-group col-lg-6">
<label>Imperial</label>
<textarea class="form-control" name="imperial" rows="3" id="imperial"><?=$imperial?></textarea>
</div>
<script>
CKEDITOR.replace( 'imperial');
</script>

<div class="form-group col-lg-6">
<label>Metric</label>
<textarea class="form-control" name="metric" rows="3" id="metric"><?=$metric?></textarea>
</div>
<script>
CKEDITOR.replace( 'metric');
</script>

<div class="col-lg-12" style="padding:0;background-color:#e8f1f3;margin:20px 0 50px 0">
<div class="btn-group" id="buttonexport">
<a href="#" >
<h4 style="color:#000;font-weight:600;padding:5px">SEO Related Information</h4>
</a>
</div>
</div>                             
     
     
<div class="form-group col-lg-12">
<label>Attachment Meta Title</label>
<textarea class="form-control" rows="3" name="meta_title" id="meta_title" placeholder="Enter Attachment meta title here" ><?=$meta_title?></textarea>
</div>
<div class="form-group col-lg-12">
<label>Attachment Meta Description</label>
<textarea class="form-control" rows="3" placeholder="Enter Attachment meta description here" name="meta_description" id="meta_description"><?=$meta_description?></textarea>
</div>
<div class="form-group col-lg-12">
<label>Attachment Meta Keyword</label>
<textarea class="form-control" rows="3" name="meta_keyword" placeholder="Enter Attachment meta keywords here" id="meta_keyword"><?=$meta_keyword?></textarea>
</div>
      
      
     
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
