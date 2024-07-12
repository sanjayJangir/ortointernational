<?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<?php require_once('../includes/photoshop.php'); ?>
<?php
$subCatID = trim($_REQUEST['subCatID']);
$category_id = trim($_REQUEST['id']);
$categoryID = trim($_GET['category_id']);

if ($_REQUEST['delImage'] != "") {
   $delImage = $_REQUEST['delImage'];
   $isDel = db_query("UPDATE  tbl_dealers SET  category_image_name='' WHERE 1 and category_id = '$categoryID'");
   @unlink("../dealer/$delImage");
   header("location:addedit-dealer-locator-info.php?id=$categoryID&subCatID=$subCatID");
}

if (is_post_back()) {

   $category_name = sanitize_input($_REQUEST['category_name']);
   $category_email = sanitize_input($_REQUEST['category_email']);
   $category_mobile = sanitize_input($_REQUEST['category_mobile']);
   $category_address = sanitize_input($_REQUEST['category_address']);
   $branch_name = sanitize_input($_REQUEST['branch_name']);

   $imgNAME = "";
   //*************** UPDATE EXISTING CATEGORY START ************************//
   if ($_REQUEST['id'] != '0') {
      $category_url = ami_crete_url($category_name);

      function getExtension($str)
      {
         $i = strrpos($str, ".");
         if (!$i) {
            return "";
         }
         $l = strlen($str) - $i;
         $ext = substr($str, $i + 1, $l);
         return $ext;
      }
      //------------FUNCTION TO GET IMAGE EXTENSION END---------------//
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $image = $_FILES["file"]["name"];
         $imgToDel = db_scalar("SELECT category_image_name FROM tbl_dealers WHERE  category_id='$category_id'");
         if ($image) {
            @unlink("../dealer/$imgToDel");
            $uploadedfile = $_FILES['file']['tmp_name'];
            $filename = stripslashes($_FILES['file']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            $imgNAME = substr(md5($category_url . time() . rand(1, 10)), 0, 14) . "." . $extension;
            move_uploaded_file($_FILES['file']['tmp_name'], "../dealer/$imgNAME");
         } else {
            $imgNAME = $imgToDel;
         }
      }


      $sql = "update tbl_dealers set   
category_map='$_REQUEST[category_map]',     
category_name='$category_name',
category_image_name='$imgNAME',
category_email='$category_email',
category_mobile='$category_mobile',
category_address='$category_address',
category_is_product='No',
category_url='$category_url',
category_add_date='$curr_date',
branch_name='$branch_name',
category_status='$_REQUEST[category_status]'
where category_id = '$category_id' ";


      db_query($sql);


      $_SESSION["msg"] = "Dealer Updated Successfully !";

      header("Location:addedit-dealer-locator-info.php?id=$_REQUEST[id]&subCatID=$subCatID");
      exit;
      //*************** UPDATE EXISTING CATEGORY END ************************//
   } else {
      $category_url = ami_crete_url($category_name);
      //*************** INSERT NEW CATEGORY START ************************//

      function getExtension($str)
      {
         $i = strrpos($str, ".");
         if (!$i) {
            return "";
         }
         $l = strlen($str) - $i;
         $ext = substr($str, $i + 1, $l);
         return $ext;
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $image = $_FILES["file"]["name"];
         if ($image) {
            $uploadedfile = $_FILES['file']['tmp_name'];
            $filename = stripslashes($_FILES['file']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            $imgNAME = substr(md5($category_url . time() . rand(1, 10)), 0, 14) . "." . $extension;
            move_uploaded_file($_FILES['file']['tmp_name'], "../dealer/$imgNAME");
         } else {
            $imgNAME = $imgToDel;
         }
      }

      ////////////****************** IMAGE RESIZING END HERE *****************************//


      $sql = "insert into tbl_dealers set 
category_map='$_REQUEST[category_map]',
category_name='$category_name',
category_image_name='$imgNAME',
category_email='$category_email',
category_mobile='$category_mobile',
category_address='$category_address',
category_parent_id='$subCatID',
cat_type='subcat',
category_is_product='No',
category_order_by='0',
branch_name='$branch_name',
category_url='$category_url',
category_add_date='$curr_date',
category_status='$_REQUEST[category_status]'";
      db_query($sql);
      $_SESSION["msg"] = "Dealer added successfully !";

      header("Location:addedit-dealer-locator-info.php?id=$_REQUEST[id]&subCatID=$subCatID");
      exit;
      //*************** INSERT NEW CATEGORY END ************************//
   }
}

if ($category_id != '') {
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
         <h1>Add/Edit Dealer Info</h1>
         <small>Add/Edit Dealer Info content</small>


         <a href="dealer-locator-info-list.php?catID=<?= $subCatID ?>"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
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

                           <span style="margin-left:5px; font-size:16px;color:#8e32a2c7"><?= db_scalar("SELECT category_name FROM tbl_dealers WHERE 1 AND category_id='$subCatID'") ?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i><span style="margin-left:5px; font-size:16px;color:#8e32a2c7"><?= db_scalar("SELECT category_name FROM tbl_dealers WHERE 1 AND category_id='$id'") ?></span>


                        </h4>
                     </a>
                  </div>
               </div>
               <div class="panel-body">
                  <form name="form1" method="post" onsubmit="return formValidation()" enctype="multipart/form-data" class="col-sm-12">

                     <div class="row">
                        <div class="form-group col-lg-3">
                           <label>Brand Image</label>
                           <?php if ($category_image_name != "") { ?>
                              <img src="../dealer/<?= $category_image_name ?>" class="form-control" style="width:150px;height:150px" />
                           <?php } else { ?>
                              <img src="assets/dist/img/no-image.jpg" class="form-control" style="width:120px;height:150px" />
                           <?php } ?>

                           <?php if ($category_image_name != "") { ?>
                              <div class="col-lg-12 "><a href="addedit-dealer-locator-info.php?delImage=<?= $category_image_name ?>&category_id=<?= $category_id ?>&subCatID=<?= $subCatID ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
                              </div>
                           <?php } ?>
                        </div>
                        <div class="form-group col-lg-3" style="margin-top:100px">
                           <input type="file" name="file" id="file" />
                        </div>
                     </div>


                     <div class="form-group col-lg-4">
                        <label>Dealer Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="category_name" id="category_name" value="<?= $category_name ?>">
                     </div>

                     <div class="form-group col-lg-2">
                        <label>Dealer Mobile No</label>
                        <input type="text" class="form-control" placeholder="Enter Mobile No" name="category_mobile" id="category_mobile" value="<?= $category_mobile ?>">
                     </div>

                     <div class="form-group col-lg-4">
                        <label>Dealer Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="category_email" id="category_email" value="<?= $category_email ?>">
                     </div>

                     <div class="form-group col-lg-2">
                        <label>Status</label>
                        <select name="category_status" class="form-control">
                           <option value="Active" <?php if ($category_status == 'Active') { ?> selected="selected" <?php } ?>>Active</option>
                           <option value="Inactive" <?php if ($category_status == 'Inactive') { ?> selected="selected" <?php } ?>>Inactive</option>
                        </select>
                     </div>

                     <div class="row">
                        <div class="form-group col-lg-5">
                           <label>Dealer Address</label>
                           <textarea class="form-control" rows="3" name="category_address" placeholder="Enter Address here" id="category_address"><?= $category_address ?></textarea>
                        </div>

                        <div class="form-group col-lg-3">
                           <label>Branch Name</label>
                           <input name="branch_name" id="branch_name" class="form-control" value="<?= $branch_name ?>" />
                        </div>

                        <div class="form-group col-lg-4">
                           <label>Dealer Map Link</label>
                           <input name="category_map" id="category_map" class="form-control" value="<?= $category_map ?>" />
                        </div>
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