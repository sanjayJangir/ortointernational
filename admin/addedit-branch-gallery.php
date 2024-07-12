<?php require_once("header.php");?>
<?php require_once("left-nav.php");?>

<link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet" type="text/css"/>
<?php
$id = $_GET['id'];

if($_REQUEST['delImage']!=""){
$isDel=db_query("UPDATE  tbl_branch_gallery SET branch_image_name='' WHERE 1 and id = '$id'");	
@unlink("../branch_gallery/$_REQUEST[delImage]");
header("location:addedit-branch-gallery.php?id=$id");
}

if(is_post_back()) {
$branch_name=sanitize_input($_REQUEST['branch_name']);
$branch_url=ami_crete_url($branch_name);

if($id!='') {

function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
//------------FUNCTION TO GET IMAGE EXTENSION END---------------//
$image =$_FILES["file"]["name"];
$uploadedfile = $_FILES['file']['tmp_name']; 
if ($image) { 	
$DelImage=db_scalar("select branch_image_name from tbl_branch_gallery where 1 and id = '$id'");
@unlink("../branch_gallery/$DelImage");
$filename = stripslashes($_FILES['file']['name']); 	
$extension = getExtension($filename);
$extension = strtolower($extension);		
$imgNAME = $branch_url.rand(11111,55555).".".$extension;

move_uploaded_file($_FILES['file']['tmp_name'],"../branch_gallery/$imgNAME");
}else{
$imgNAME=db_scalar("select branch_image_name from tbl_branch_gallery where 1 and id = '$id'");
}

////////////****************** IMAGE RESIZING END HERE *****************************//
$sqlupdate = "update tbl_branch_gallery set 
     branch_name='$branch_name', 
	 branch_image_name='$imgNAME',
	 add_date='$curr_date',
	 branch_url='$branch_url'
	 where id = '$id' ";
     db_query($sqlupdate);
	
	 set_session_msg("Branch gallery updated successfully !");
	 header("Location: addedit-branch-gallery.php?id=$id");
     exit;
}else{
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
$image =$_FILES["file"]["name"];
$uploadedfile = $_FILES['file']['tmp_name']; 
if ($image) { 	
$filename = stripslashes($_FILES['file']['name']); 	
$extension = getExtension($filename);
$extension = strtolower($extension);
$imgNAME = $branch_url.rand(11111,55555).".".$extension;		


move_uploaded_file($_FILES['file']['tmp_name'],"../branch_gallery/$imgNAME");
}

////////////****************** IMAGE RESIZING END HERE *****************************//
$sqlinsert = "insert into tbl_branch_gallery set 
     branch_name='$branch_name', 
	 branch_image_name='$imgNAME',
	 branch_url='$branch_url',
	 add_date='$curr_date' ";
     db_query($sqlinsert);
	
	 set_session_msg("Branch gallery added successfully !");
	 
header("Location: addedit-branch-gallery.php");
exit;
}


}
if($id!=''){
$sql="select * from tbl_branch_gallery where id = '$id'";	
$result = db_query($sql);
if ($line_raw = mysqli_fetch_array($result)) {
$line = ms_form_value($line_raw);
@extract($line);
}
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-file-text"></i>
</div>
<div class="header-title">
<h1>Edit Branch Gallery</h1>
<small>Edit Branch Gallery Content</small>


<a href="manage-branch-gallery.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
<span class="btn-label" ><i class="fa fa-chevron-circle-left"></i></span>Go Back
</button></a>


</div>


</section>
<!-- Main content -->
<script src="../ckeditor/ckeditor.js"></script>            
<section class="content">
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
<label>Branch gallery</label>
<?php if($branch_image_name!=""){ ?>
<img src="../branch_gallery/<?=$branch_image_name?>" class="form-control" style="width:360px;height:200px" />
<?php }else{?>
<img src="assets/dist/img/no-image.jpg" class="form-control" style="width:360px;height:200px" />
<?php }?>

<?php if($branch_image_name!=""){ ?>
<div class="col-lg-12 " ><a href="addedit-branch-gallery.php?delImage=<?=$branch_image_name?>&id=<?=$id?>" style="font-weight:600;margin-left:15px;text-decoration:underline;margin-top:20px" >Remove Image</a>                  
</div>
<?php }?>

</div>

<div class="form-group col-lg-6" style="padding-top:100px">
<input type="file" name="file" id="file" />

<!-- <p class="img-size">Widh : 1356px, Height : 650px</p> -->
</div>


         
        
<div class="form-group col-lg-12">
<label>Branch Name</label>
<input type="text" class="form-control" placeholder="Enter Branch Name" name="branch_name" id="branch_name" value="<?=$branch_name?>" required>
</div>
                    

<div class="col-lg-12 reset-button">
                                 
 <button type="submit" class="btn btn-add">Update</button>

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
