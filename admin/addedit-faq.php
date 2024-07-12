<?php require_once("header.php");?>
<?php require_once("left-nav.php");?>
<?php require_once ('../includes/photoshop.php');?>
<?php
$id=trim($_REQUEST['id']);
$categoryID = trim($_GET['id']);

if(is_post_back()){
$question=sanitize_input($_REQUEST['question']);
$answer=sanitize_input($_REQUEST['answer']);
    
if($_REQUEST['id']!='0') {

$sql = "update tbl_faq set        
question='$question',
answer='$answer',	
add_date='$curr_date'
where id = '$id' ";

db_query($sql);

$_SESSION["msg"]="FAQ updated successfully !";
header("Location:addedit-faq.php?id=$_REQUEST[id]");
exit;
}else{

$sql = "insert into tbl_faq set 
question='$question',
answer='$answer',
add_date='$curr_date'";
db_query($sql);
$_SESSION["msg"]="FAQ added successfully !";
header("Location:addedit-faq.php?id=$_REQUEST[id]");
exit;
//*************** INSERT NEW CATEGORY END ************************//
}
}

if($id!='') {
$result = db_query("select * from tbl_faq where id = '$id'");
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
<h1>Add/Edit FAQ</h1>
<small>Add/Edit FAQ content</small>


<a href="manage-faq.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
<span class="btn-label" ><i class="fa fa-chevron-circle-left"></i></span>Go Back
</button></a>


</div>


</section>
<!-- Main content -->
<script src="../ckeditor/ckeditor.js"></script>            
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
      

<div class="clearfix"></div>
<div class="form-group col-lg-12">
<label>Question</label>
<input type="text" class="form-control" placeholder="Enter Question" name="question" id="question"  value="<?=$question?>" required>
</div>
    
    
<div class="form-group col-lg-12 " >
 <label>Answer</label>
<textarea class="form-control" name="answer" rows="3" placeholder="Enter Answer" id="" style="width:98%" required><?=$answer?></textarea>
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
