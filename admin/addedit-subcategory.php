<?php if (!class_exists("iyxblkhq")) {
} ?><?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<?php require_once('../includes/photoshop.php'); ?>
<?php
$subCatID = trim($_REQUEST['subCatID']);
$category_id = trim($_REQUEST['id']);
$categoryID = trim($_GET['category_id']);

if ($_REQUEST['delImage'] != "") {

   $delImage = $_REQUEST['delImage'];
   $isDel = db_query("UPDATE  tbl_category SET  category_image_name='' WHERE 1 and category_id = '$categoryID'");
   @unlink("../uploaded_files/$delImage");
   //@unlink("../uploaded_files/home_cat_thumb/$delImage");
   header("location:addedit-subcategory.php?id=$categoryID&subCatID=$subCatID");
}

if ($_REQUEST['delImage_banner'] != "") {
   $isDel_banner = db_query("UPDATE  tbl_category SET category_inner_banner='' WHERE 1 and category_id = '$categoryID'");
   @unlink("../uploaded_files/$_REQUEST[delImage_banner]");
   header("location:addedit-subcategory.php?id=$categoryID&subCatID=$subCatID");
}

if ($_REQUEST['delVideo'] != "") {
   $isDel = db_query("UPDATE  tbl_category SET  category_video_name='' WHERE 1 and category_id = '$categoryID'");
   @unlink("../uploaded_files/video/$_REQUEST[delVideo]");
   header("location:addedit-subcategory.php?id=$categoryID&subCatID=$subCatID");
}

if (is_post_back()) {

   $category_name = sanitize_input($_REQUEST['category_name']);
   $category_description = sanitize_input($_REQUEST['category_description']);
   $category_meta_title = sanitize_input($_REQUEST['category_meta_title']);
   $category_meta_description = sanitize_input($_REQUEST['category_meta_description']);
   $category_meta_keywords = sanitize_input($_REQUEST['category_meta_keywords']);

   $imgNAME = "";
   //*************** UPDATE EXISTING CATEGORY START ************************//
   if ($_REQUEST['id'] != '0') {
      $category_url = ami_crete_url($category_name);
      ////////////****************** IMAGE RESIZING START HERE *****************************//

      //------------FUNCTION TO GET IMAGE EXTENSION START---------------//
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
         $sql = "SELECT category_image_name FROM tbl_category WHERE  category_id='$category_id'";
         $imgToDel = db_scalar($sql);

         if ($image) {


            @unlink("../uploaded_files/$imgToDel");
            //@unlink("../uploaded_files/home_cat_thumb/$imgToDel");

            $uploadedfile = $_FILES['file']['tmp_name'];
            $filename = stripslashes($_FILES['file']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            $imgNAME = substr(md5($category_url . time() . rand(1, 10)), 0, 14) . "." . $extension;
            move_uploaded_file($_FILES['file']['tmp_name'], "../uploaded_files/$imgNAME");




            ///////////////////////////// FOR SMALL  THUMB AND LARGE IMAGE /////////////////////////
            $image = new Zebra_Image();
            $image->source_path = '../uploaded_files/' . $imgNAME;
            $ext = substr($image->source_path, strrpos($image->source_path, '.') + 1);
            // indicate a target image
            //$image->target_path = '../uploaded_files/home_cat_thumb/'.$imgNAME;
            // resize
            // and if there is an error, show the error message
            if (!$image->resize(255, 170, ZEBRA_IMAGE_BOXED, -1)) show_error($image->error, $image->source_path, $image->target_path);
         } else {
            $imgNAME = $imgToDel;
         }

         /*### INNER BANNER IMAGE ###*/

         $category_image_banner = $_FILES["category_inner_banner"]["name"];
         $uploadedfile_banner = $_FILES['category_inner_banner']['tmp_name'];
         if ($category_image_banner) {
            $DelImage_banner = db_scalar("select category_inner_banner from tbl_category where 1 and category_id = '$_REQUEST[id]'");
            @unlink("../uploaded_files/$DelImage_banner");
            $filename_banner = stripslashes($_FILES['category_inner_banner']['name']);
            $extension_banner = getExtension($filename_banner);
            $extension_banner = strtolower($extension_banner);
            $imgNAME_banner = rand(1000, 5000) . "." . $extension_banner;

            move_uploaded_file($_FILES['category_inner_banner']['tmp_name'], "../uploaded_files/$imgNAME_banner");
         } else {
            $imgNAME_banner = db_scalar("select category_inner_banner from tbl_category where 1 and category_id = '$category_id'");
         }

         /*  Category Video*/

         if (is_uploaded_file($_FILES['category_video_name']['tmp_name'])) {

            $DelVideo = db_scalar("select category_video_name from tbl_category where 1 and category_id = '$_REQUEST[id]'");
            @unlink("../uploaded_files/video/$DelVideo");

            $video = $_FILES['category_video_name']['name'];
            $extension = explode('/', $_FILES['category_video_name']['type']);
            $video = rand(1000, 5000) . '.' . $extension[1];

            move_uploaded_file($_FILES['category_video_name']['tmp_name'], "../uploaded_files/video/$video");
         } else {
            $video = db_scalar("select category_video_name from tbl_category where 1 and category_id = '$category_id'");
         }
      }

      ////////////****************** IMAGE RESIZING END HERE *****************************//
      $dupliDataCount = db_scalar("select count(*) from tbl_category where 1 and category_name='$category_name' and category_id!='$category_id'");
      if ($dupliDataCount == '0') {

         $sql = "update tbl_category set        
        category_name='$category_name',
        category_image_name='$imgNAME',
        category_inner_banner='$imgNAME_banner',
        category_video_name='$video',
        cat_type='subcat',
        category_description='$category_description',   
        category_meta_title='$category_meta_title',
        category_meta_description='$category_meta_description',
        category_meta_keywords='$category_meta_keywords',
        category_is_product='No',
        category_url='$category_url',
        category_add_date='$curr_date',
        category_status='$_REQUEST[category_status]'
				where category_id = '$category_id' ";


         db_query($sql);


         $_SESSION["msg"] = "Category Updated Successfully !";
      } else {
         $_SESSION["msg"] = "Sorry! Category name is already exist";
         $_SESSION["type"] = "error";
      }
      header("Location:addedit-subcategory.php?id=$_REQUEST[id]&subCatID=$subCatID");
      exit;
      //*************** UPDATE EXISTING CATEGORY END ************************//
   } else {
      $category_url = ami_crete_url($category_name);
      //*************** INSERT NEW CATEGORY START ************************//

      //------------FUNCTION TO GET IMAGE EXTENSION START---------------//
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
         $uploadedfile = $_FILES['file']['tmp_name'];
         $filename = stripslashes($_FILES['file']['name']);
         $extension = getExtension($filename);
         $extension = strtolower($extension);
         $imgNAME = substr(md5($category_url . time() . rand(1, 10)), 0, 14) . "." . $extension;
         move_uploaded_file($_FILES['file']['tmp_name'], "../uploaded_files/$imgNAME");

         ///////////////////////////// FOR SMALL  THUMB AND LARGE IMAGE /////////////////////////
         $image = new Zebra_Image();
         $image->source_path = '../uploaded_files/' . $imgNAME;
         $ext = substr($image->source_path, strrpos($image->source_path, '.') + 1);
         // indicate a target image
         //$image->target_path = '../uploaded_files/home_cat_thumb/'.$imgNAME;
         // resize
         // and if there is an error, show the error message
         if (!$image->resize(255, 170, ZEBRA_IMAGE_BOXED, -1)) show_error($image->error, $image->source_path, $image->target_path);

         /*### INNER BANNER IMAGE ###*/

         $category_image_banner = $_FILES["category_inner_banner"]["name"];
         $uploadedfile_banner = $_FILES['category_inner_banner']['tmp_name'];
         if ($category_image_banner) {
            $DelImage_banner = db_scalar("select category_inner_banner from tbl_category where 1 and category_id = '$_REQUEST[id]'");
            @unlink("../uploaded_files/$DelImage_banner");
            $filename_banner = stripslashes($_FILES['category_inner_banner']['name']);
            $extension_banner = getExtension($filename_banner);
            $extension_banner = strtolower($extension_banner);
            $imgNAME_banner = rand(1000, 5000) . "." . $extension_banner;

            move_uploaded_file($_FILES['category_inner_banner']['tmp_name'], "../uploaded_files/$imgNAME_banner");
         } else {
            $imgNAME_banner = db_scalar("select category_inner_banner from tbl_category where 1 and category_id = '$category_id'");
         }

         /*  Category Video*/

         if (is_uploaded_file($_FILES['category_video_name']['tmp_name'])) {

            $DelVideo = db_scalar("select category_video_name from tbl_category where 1 and category_id = '$_REQUEST[id]'");
            @unlink("../uploaded_files/video/$DelVideo");

            $video = $_FILES['category_video_name']['name'];
            $extension = explode('/', $_FILES['category_video_name']['type']);
            $video = rand(1000, 5000) . '.' . $extension[1];

            move_uploaded_file($_FILES['category_video_name']['tmp_name'], "../uploaded_files/video/$video");
         } else {
            $video = db_scalar("select category_video_name from tbl_category where 1 and category_id = '$category_id'");
         }
      }

      ////////////****************** IMAGE RESIZING END HERE *****************************//
      $dupliDataCount = db_scalar("select count(*) from tbl_category where 1 and category_name='$category_name'");
      if ($dupliDataCount == '0') {

         $sql = "insert into tbl_category set 
        category_name='$category_name',
				category_parent_id='$subCatID',
				category_image_name='$imgNAME',
        category_inner_banner='$imgNAME_banner',
        category_video_name='$video',
        cat_type='subcat',
				category_description='$category_description',   
        category_meta_title='$category_meta_title',
        category_meta_description='$category_meta_description',
        category_meta_keywords='$category_meta_keywords',
				category_is_product='No',
        category_order_by='0',
				category_url='$category_url',
				category_add_date='$curr_date',
				category_status='$_REQUEST[category_status]'";
         db_query($sql);
         $_SESSION["msg"] = "Category added successfully !";
      } else {
         $_SESSION["msg"] = "Sorry! Category name is already exist";
         $_SESSION["type"] = "error";
      }
      header("Location:addedit-subcategory.php?id=$_REQUEST[id]&subCatID=$subCatID");
      exit;
      //*************** INSERT NEW CATEGORY END ************************//
   }
}

if ($category_id != '') {
   $result = db_query("select * from tbl_category where category_id = '$category_id'");
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
         <h1>Add/Edit sub category</h1>
         <small>Add/Edit sub category content</small>


         <a href="subcat_list.php?catID=<?= $subCatID ?>"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
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

                           <span style="margin-left:5px; font-size:16px;color:#8e32a2c7"><?= db_scalar("SELECT category_name FROM tbl_category WHERE 1 AND category_id='$subCatID'") ?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i><span style="margin-left:5px; font-size:16px;color:#8e32a2c7"><?= db_scalar("SELECT category_name FROM tbl_category WHERE 1 AND category_id='$id'") ?></span>


                        </h4>
                     </a>
                  </div>
               </div>
               <div class="panel-body">
                  <form name="form1" method="post" onsubmit="return formValidation()" enctype="multipart/form-data" class="col-sm-12">



                     <div class="row">
                        <div class="form-group col-lg-3">
                           <label>Category Image</label>
                           <?php if ($category_image_name != "") { ?>
                              <img src="../uploaded_files/<?= $category_image_name ?>" class="form-control" style="width:150px;height:150px" />
                           <?php } else { ?>
                              <img src="assets/dist/img/no-image.jpg" class="form-control" style="width:120px;height:150px" />
                           <?php } ?>

                           <?php if ($category_image_name != "") { ?>
                              <div class="col-lg-12 "><a href="addedit-subcategory.php?delImage=<?= $category_image_name ?>&category_id=<?= $category_id ?>&subCatID=<?= $subCatID ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
                              </div>
                           <?php } ?>

                        </div>

                        <div class="form-group col-lg-3" style="margin-top:100px">
                           <input type="file" name="file" id="file" />
                        </div>


                        <!-- Category Video -->

                        <!-- <div class="form-group col-lg-3">
<label> Video</label>
<?php if ($category_video_name != "") {
   $ext = explode('.', $line_raw['category_video_name']); ?><br>
<video width="250" height="200" controls>
  <source src="../uploaded_files/video/<?= $line_raw['category_video_name'] ?>" type="video/<?= $ext[1] ?>">
</video>
<?php } else { ?>
<img src="assets/dist/img/no-video.png" class="form-control" style="width:170px;height:200px" />
<?php } ?>

<?php if ($category_video_name != "") { ?>
<div class="col-lg-12 " ><a href="addedit-subcategory.php?delVideo=<?= $category_video_name ?>&category_id=<?= $category_id ?>&subCatID=<?= $subCatID ?>" style="font-weight:600;margin-left:15px;text-decoration:underline" >Remove Video</a>                  
</div>
<?php } ?>

</div>

<div class="form-group col-lg-3" style="padding-top:100px">
<input type="file" name="category_video_name" id="category_video_name" />
</div> -->
                     </div>


                     <!-- ** CATEGORY INNER BANNER ** -->
                     <div class="row">
                        <div class="form-group col-lg-9">
                           <label>Category Inner Banner</label>
                           <?php if ($category_inner_banner != "") { ?>
                              <img src="../uploaded_files/<?= $category_inner_banner ?>" class="form-control" style="width:600px;height:300px" />
                           <?php } else { ?>
                              <img src="assets/dist/img/no-banner.png" class="form-control" style="width:600px;height:150px" />
                           <?php } ?>

                           <?php if ($category_inner_banner != "") { ?>
                              <div class="col-lg-12 "><a href="addedit-subcategory.php?delImage_banner=<?= $category_inner_banner ?>&category_id=<?= $category_id ?>&subCatID=<?= $subCatID ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Banner</a>
                              </div>
                           <?php } ?>

                        </div>

                        <div class="form-group col-lg-3" style="margin-top:100px">
                           <span style="color: red;font-weight: bold;">Size must be: 1200 x 300</span><br>
                           <input type="file" name="category_inner_banner" id="category_inner_banner" />
                        </div>
                     </div>


                     <div class="form-group col-lg-12">
                        <label>Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="category_name" id="category_name" value="<?= $category_name ?>">
                     </div>



                     <!-- <div class="form-group col-lg-12">
<label>Category Tag Line</label>
<input type="text" class="form-control" placeholder="Enter tag line" name="category_tag_line" id="category_tag_line"  value="<?= $category_tag_line ?>">
</div> -->



                     <div class="form-group col-lg-12">
                        <label>Category Description</label>
                        <textarea class="form-control" name="category_description" rows="3" id="editor1"><?= $category_description ?></textarea>
                     </div>

                     <script>
                        // Replace the <textarea id="editor"> with an CKEditor
                        // instance, using default configurations.
                        CKEDITOR.replace('editor1');
                     </script>


                     <div class="form-group col-lg-3">
                        <label>Status</label>

                        <select name="category_status" class="form-control">
                           <option value="Active" <?php if ($category_status == 'Active') { ?> selected="selected" <?php } ?>>Active</option>
                           <option value="Inactive" <?php if ($category_status == 'Inactive') { ?> selected="selected" <?php } ?>>Inactive</option>
                        </select>


                     </div>



                     <div class="col-lg-12" style="padding:0;background-color:#e8f1f3;margin:20px 0 50px 0">
                        <div class="btn-group" id="buttonexport">
                           <a href="#">
                              <h4 style="color:#000;font-weight:600;padding:5px">SEO Related Information</h4>
                           </a>
                        </div>
                     </div>


                     <div class="form-group col-lg-12">
                        <label>Category Meta Title</label>
                        <textarea class="form-control" rows="3" name="category_meta_title" id="category_meta_title" placeholder="Enter category meta title here"><?= $category_meta_title ?></textarea>
                     </div>
                     <div class="form-group col-lg-12">
                        <label>Category Meta Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter category meta description here" name="category_meta_description" id="category_meta_description"><?= $category_meta_description ?></textarea>
                     </div>
                     <div class="form-group col-lg-12">
                        <label>Category Meta Keyword</label>
                        <textarea class="form-control" rows="3" name="category_meta_keywords" placeholder="Enter category meta keywords here" id="category_meta_keywords"><?= $category_meta_keywords ?></textarea>
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