<?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<?php require_once('../includes/photoshop.php'); ?>
<?php
$subCatID = trim($_REQUEST['subCatID']);
$category_id = trim($_REQUEST['id']);
$categoryID = trim($_GET['category_id']);

/*if($_REQUEST['delImage']!=""){

$delImage=$_REQUEST['delImage'];		
$isDel=db_query("UPDATE  tbl_marketplace SET  category_image_name='' WHERE 1 and category_id = '$categoryID'");	
@unlink("../uploaded_files/$delImage");
//@unlink("../uploaded_files/home_cat_thumb/$delImage");
header("location:addedit-marketplace-district.php?id=$categoryID&subCatID=$subCatID");
}

if($_REQUEST['delImage_banner']!=""){
$isDel_banner=db_query("UPDATE  tbl_marketplace SET category_inner_banner='' WHERE 1 and category_id = '$categoryID'"); 
@unlink("../uploaded_files/$_REQUEST[delImage_banner]");
header("location:addedit-marketplace-district.php?id=$categoryID&subCatID=$subCatID");
}

if($_REQUEST['delVideo']!=""){
$isDel=db_query("UPDATE  tbl_marketplace SET  category_video_name='' WHERE 1 and category_id = '$categoryID'"); 
@unlink("../uploaded_files/video/$_REQUEST[delVideo]");
header("location:addedit-marketplace-district.php?id=$categoryID&subCatID=$subCatID");
}*/

if (is_post_back()) {

   $category_name = sanitize_input($_REQUEST['category_name']);


   $imgNAME = "";
   //*************** UPDATE EXISTING CATEGORY START ************************//
   if ($_REQUEST['id'] != '0') {
      $category_url = ami_crete_url($category_name);

      $dupliDataCount = db_scalar("select count(*) from tbl_marketplace where 1 and category_name='$category_name' and category_id!='$category_id'");
      if ($dupliDataCount == '0') {

         $sql = "update tbl_marketplace set        
        category_name='$category_name',
        category_is_product='No',
        category_url='$category_url',
        category_add_date='$curr_date',
        category_status='$_REQUEST[category_status]'
				where category_id = '$category_id' ";


         db_query($sql);


         $_SESSION["msg"] = "District Updated Successfully !";
      } else {
         $_SESSION["msg"] = "Sorry! District name is already exist";
         $_SESSION["type"] = "error";
      }
      header("Location:addedit-marketplace-district.php?id=$_REQUEST[id]&subCatID=$subCatID");
      exit;
      //*************** UPDATE EXISTING CATEGORY END ************************//
   } else {
      $category_url = ami_crete_url($category_name);
      //*************** INSERT NEW CATEGORY START ************************//


      ////////////****************** IMAGE RESIZING END HERE *****************************//
      $dupliDataCount = db_scalar("select count(*) from tbl_marketplace where 1 and category_name='$category_name'");
      if ($dupliDataCount == '0') {

         $sql = "insert into tbl_marketplace set 
        category_name='$category_name',
				category_parent_id='$subCatID',
				cat_type='subcat',
				category_is_product='No',
        category_order_by='0',
				category_url='$category_url',
				category_add_date='$curr_date',
				category_status='$_REQUEST[category_status]'";
         db_query($sql);
         $_SESSION["msg"] = "District added successfully !";
      } else {
         $_SESSION["msg"] = "Sorry! District name is already exist";
         $_SESSION["type"] = "error";
      }
      header("Location:addedit-marketplace-district.php?id=$_REQUEST[id]&subCatID=$subCatID");
      exit;
      //*************** INSERT NEW CATEGORY END ************************//
   }
}

if ($category_id != '') {
   $result = db_query("select * from tbl_marketplace where category_id = '$category_id'");
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
         <h1>Add/Edit district</h1>
         <small>Add/Edit district content</small>


         <a href="marketplace_district_list.php?catID=<?= $subCatID ?>"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
               <span class="btn-label"><i class="fa fa-chevron-circle-left"></i></span>Go Back
            </button></a>


      </div>


   </section>
   <!-- Main content -->
   <script src="ckeditor/ckeditor.js"></script>
   <section class="content">

      <?php if ($_SESSION["msg"] != "" && $_SESSION["type"] == "") { ?>
         <div class="alert alert-success alert-dismissable fade in text-center" style="background-color:#dff0d8;border:none; color:#000;margin:10px 0 10px 0">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!&nbsp;&nbsp;&nbsp;</strong> <?= $_SESSION["msg"] ?>
         </div>
      <?php
         unset($_SESSION["msg"]);
      } else if ($_SESSION["msg"] != "" && $_SESSION["type"] == "error") { ?>
         <div class="alert alert-danger alert-dismissable fade in text-center" style="background-color:#F32013;border:none; color:white;margin:10px 0 10px 0">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!&nbsp;&nbsp;&nbsp;</strong> <?= $_SESSION["msg"] ?>
         </div>

      <?php
         unset($_SESSION["msg"]);
         unset($_SESSION["type"]);
      } ?>

      <div class="row">
         <!-- Form controls -->
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" data-edit-title='false' data-close='false' data-reload='false'>
               <div class="panel-heading">
                  <div class="btn-group" id="buttonexport">
                     <a href="#">
                        <h4>General Information

                           <i class="fa fa-angle-double-right"></i>

                           <span style="margin-left:5px; font-size:16px;color:#8e32a2c7"><?= db_scalar("SELECT category_name FROM tbl_marketplace WHERE 1 AND category_id='$subCatID'") ?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i><span style="margin-left:5px; font-size:16px;color:#8e32a2c7"><?= db_scalar("SELECT category_name FROM tbl_marketplace WHERE 1 AND category_id='$id'") ?></span>


                        </h4>
                     </a>
                  </div>
               </div>
               <div class="panel-body">
                  <form name="form1" method="post" onsubmit="return formValidation()" enctype="multipart/form-data" class="col-sm-12">





                     <div class="form-group col-lg-8">
                        <label>District Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="category_name" id="category_name" value="<?= $category_name ?>">
                     </div>




                     <div class="form-group col-lg-3">
                        <label>Status</label>

                        <select name="category_status" class="form-control">
                           <option value="Active" <?php if ($category_status == 'Active') { ?> selected="selected" <?php } ?>>Active</option>
                           <option value="Inactive" <?php if ($category_status == 'Inactive') { ?> selected="selected" <?php } ?>>Inactive</option>
                        </select>


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
<textarea class="form-control" rows="3" name="category_meta_title" id="category_meta_title" placeholder="Enter category meta title here" ><?= $category_meta_title ?></textarea>
                              </div>
                              <div class="form-group col-lg-12">
                                 <label>Category Meta Description</label>
<textarea class="form-control" rows="3" placeholder="Enter category meta description here" name="category_meta_description" id="category_meta_description"><?= $category_meta_description ?></textarea>
                              </div>
                              <div class="form-group col-lg-12">
                                 <label>Category Meta Keyword</label>
<textarea class="form-control" rows="3" name="category_meta_keywords" placeholder="Enter category meta keywords here" id="category_meta_keywords"><?= $category_meta_keywords ?></textarea>
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