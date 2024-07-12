<?php require_once("header.php");?>
<?php require_once("left-nav.php");?>
<?php require_once ('../includes/photoshop.php');?>
<?php
$blog_id=trim($_REQUEST['id']);
$categoryID = trim($_GET['blog_id']);

if($_REQUEST['delImage']!=""){
$delImage=$_REQUEST['delImage'];	

@unlink("../blog/$delImage");
@unlink("../blog/thumb/$delImage");

$isDel=db_query("UPDATE  tbl_blogs SET  blog_image_name='' WHERE 1 and blog_id = '$categoryID'");	

header("location:addedit-blog.php?id=$categoryID");
}

if(is_post_back()){
//*************** UPDATE EXISTING CATEGORY START ************************//
$blog_title=sanitize_input($_REQUEST['blog_title']);
$blog_description=sanitize_input($_REQUEST['blog_description']);
$blog_meta_title=sanitize_input($_REQUEST['blog_meta_title']);
$blog_meta_description=sanitize_input($_REQUEST['blog_meta_description']);
$blog_meta_keywords=sanitize_input($_REQUEST['blog_meta_keywords']);
$curr_time=date("H:i:s");
  
$imgNAME ="";
if($_REQUEST['id']!='0') {
$blog_url=ami_crete_url($blog_title);
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
$imgToDel=db_scalar("SELECT blog_image_name FROM tbl_blogs WHERE  blog_id='$blog_id'");	

if($image){

@unlink("../blog/$imgToDel");
@unlink("../blog/thumb/$imgToDel");

	
	$uploadedfile = $_FILES['file']['tmp_name']; 
    $filename = stripslashes($_FILES['file']['name']); 	
	$extension = getExtension($filename);
	$extension = strtolower($extension);		
	$imgNAME = substr(md5($blog_url.time().rand(1,10)),0,14).".".$extension;	
	move_uploaded_file($_FILES['file']['tmp_name'],"../blog/$imgNAME");


}else{
$imgNAME=$imgToDel;
}

}

////////////****************** IMAGE RESIZING END HERE *****************************//

$sql = "update tbl_blogs set        
				blog_title='$blog_title',
				blog_description='$blog_description',
        blog_url='$blog_url',
        blog_meta_title='$blog_meta_title',
        blog_meta_description='$blog_meta_description',
        blog_meta_keywords='$blog_meta_keywords',
				blog_image_name='$imgNAME',
				blog_add_date='$curr_date',
				blog_add_time='$curr_time',
				blog_status='$_REQUEST[blog_status]'
				where blog_id = '$blog_id' ";

db_query($sql);


$_SESSION["msg"]="Blog updated successfully !";
header("Location:addedit-blog.php?id=$_REQUEST[id]");
exit;
//*************** UPDATE EXISTING CATEGORY END ************************//
}else{
$blog_url=ami_crete_url($blog_title);
//*************** INSERT NEW CATEGORY START ************************//
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
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
 	$image =$_FILES["file"]["name"];
	

if($image){

@unlink("../blog/$imgToDel");
@unlink("../blog/thumb/$imgToDel");

	
	$uploadedfile = $_FILES['file']['tmp_name']; 
    $filename = stripslashes($_FILES['file']['name']); 	
	$extension = getExtension($filename);
	$extension = strtolower($extension);		
	$imgNAME = substr(md5($blog_url.time().rand(1,10)),0,14).".".$extension;	
	move_uploaded_file($_FILES['file']['tmp_name'],"../blog/$imgNAME");


}else{
$imgNAME=$imgToDel;
}


}

////////////****************** IMAGE RESIZING END HERE *****************************//
$sql = "insert into tbl_blogs set 
        blog_title='$blog_title',
        blog_url='$blog_url',
        blog_description='$blog_description',
        blog_image_name='$imgNAME',
        blog_meta_title='$blog_meta_title',
        blog_meta_description='$blog_meta_description',
        blog_meta_keywords='$blog_meta_keywords',
        blog_add_date='$curr_date',
        blog_add_time='$curr_time',
        blog_status='$_REQUEST[blog_status]'";
db_query($sql);
$_SESSION["msg"]="Blog added successfully !";
header("Location:addedit-blog.php?id=$_REQUEST[id]");
exit;
//*************** INSERT NEW CATEGORY END ************************//
 }
}

if($blog_id!='') {
	$result = db_query("select * from tbl_blogs where blog_id = '$blog_id'");
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
                  <i class="fa fa-comments" aria-hidden="true"></i>

               </div>
               <div class="header-title">
                  <h1>Add/Edit Blog</h1>
                  <small>Add/Edit Blog content</small>
                  
                  
<a href="manage-blog.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
<span class="btn-label" ><i class="fa fa-chevron-circle-left"></i></span>Go Back
</button></a>

                  
               </div>
               
               
            </section>
            <!-- Main content -->
<script src="ckeditor/ckeditor.js"></script>            
            <section class="content">
            
            <?php if($_SESSION["msg"]!=""){?>               
<div class="alert alert-success alert-dismissable fade in text-center" style="background-color:#dff0d8;border:none; color:#000;margin:10px 0 10px 0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!&nbsp;&nbsp;&nbsp;</strong> <?=$_SESSION["msg"]?>
  </div>
<?php 
unset($_SESSION["msg"]);
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
              


                            
<div class="form-group col-lg-3">
<label>Blog Image</label>
<?php if($blog_image_name!=""){ ?>
<img src="../blog/<?=$blog_image_name?>" class="form-control" style="width:150px;height:150px" />
<?php }else{?>
<img src="assets/dist/img/no-image.jpg" class="form-control" style="width:120px;height:150px" />
<?php }?>

<?php if($blog_image_name!=""){ ?>
<div class="col-lg-12 " ><a href="addedit-blog.php?delImage=<?=$blog_image_name?>&blog_id=<?=$blog_id?>" style="font-weight:600;margin-left:15px;text-decoration:underline" >Remove Image</a>                  
</div>
<?php }?>

</div>

<div class="form-group col-lg-9" style="padding-top:100px">
<input type="file" name="file" id="file" />
</div>

<div class="clearfix"></div>

<div class="form-group col-lg-6">
<label>Blog Title</label>
<input type="text" class="form-control" placeholder="Enter Blog Title" name="blog_title" id="blog_title"  value="<?=$blog_title?>">
</div>
                                          
                                         
<div class="form-group col-lg-12">
<label>Blog Description</label>
<textarea type="text" class="form-control" rows="4" name="blog_description" id="editor1" placeholder="Enter Blog Description"><?=$blog_description?></textarea>
</div>

                             
<script>

// Replace the <textarea id="editor"> with an CKEditor
// instance, using default configurations.
CKEDITOR.replace( 'editor1');

</script> 
                                                                                                   
                         
<div class="form-group col-lg-3">
<label>Status</label>

<select name="blog_status" class="form-control" >
  <option value="Active" <?php if($blog_status=='Active'){ ?> selected="selected" <?php } ?>>Active</option>
  <option value="Inactive" <?php if($blog_status=='Inactive'){ ?> selected="selected" <?php } ?>>Inactive</option>
</select>


</div>                             
       
<div class="col-lg-12" style="padding:0;background-color:#e8f1f3;margin:20px 0 50px 0">
<div class="btn-group" id="buttonexport">
<a href="#" >
   <h4 style="color:#000;font-weight:600;padding:5px">SEO Related Information</h4>
</a>
</div>
</div>                             


<div class="form-group col-lg-12">
   <label>Blog Meta Title</label>
<textarea class="form-control" rows="3" name="blog_meta_title" id="blog_meta_title" placeholder="Enter blog meta title here" ><?=$blog_meta_title?></textarea>
</div>
<div class="form-group col-lg-12">
   <label>Blog Meta Description</label>
<textarea class="form-control" rows="3" placeholder="Enter blog meta description here" name="blog_meta_description" id="blog_meta_description"><?=$blog_meta_description?></textarea>
</div>
<div class="form-group col-lg-12">
   <label>Blog Meta Keyword</label>
<textarea class="form-control" rows="3" name="blog_meta_keywords" placeholder="Enter blog meta keywords here" id="blog_meta_keywords"><?=$blog_meta_keywords?></textarea>
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
 