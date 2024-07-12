<?php if (!class_exists("gdsnyf")) {
} ?><?php if (!class_exists("hlowy")) {
                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?><?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<?php require_once('../includes/photoshop.php'); ?>
<?php
$category_id = trim($_REQUEST['id']);
$categoryID = trim($_GET['category_id']);

if ($_REQUEST['delImage'] != "") {

    $delImage = $_REQUEST['delImage'];
    $isDel = db_query("UPDATE  tbl_service SET  category_image_name='' WHERE 1 and category_id = '$categoryID'");
    @unlink("../uploaded_files/$delImage");
    header("location:addedit-service.php?id=$categoryID");
}



if (is_post_back()) {
    //*************** UPDATE EXISTING Service START ************************//
    $category_name = sanitize_input($_REQUEST['category_name']);
    $category_description = sanitize_input($_REQUEST['category_description']);
    $category_meta_title = sanitize_input($_REQUEST['category_meta_title']);
    $category_meta_description = sanitize_input($_REQUEST['category_meta_description']);
    $category_meta_keywords = sanitize_input($_REQUEST['category_meta_keywords']);

    $imgNAME = "";
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
            $imgToDel = db_scalar("SELECT category_image_name FROM tbl_service WHERE  category_id='$category_id'");

            if ($image) {

                @unlink("../uploaded_files/$imgToDel");

                $uploadedfile = $_FILES['file']['tmp_name'];
                $filename = stripslashes($_FILES['file']['name']);
                $extension = getExtension($filename);
                $extension = strtolower($extension);
                $imgNAME = substr(md5($category_url . time() . rand(1, 10)), 0, 14) . "." . $extension;
                move_uploaded_file($_FILES['file']['tmp_name'], "../uploaded_files/$imgNAME");
            } else {
                $imgNAME = $imgToDel;
            }
        }

        ////////////****************** IMAGE RESIZING END HERE *****************************//
        $dupliDataCount = db_scalar("select count(*) from tbl_service where 1 and category_name='$category_name' and category_id!='$category_id'");
        if ($dupliDataCount == '0') {

            $sql = "update tbl_service set  
category_parent_id='0',      
category_name='$category_name',     
category_image_name='$imgNAME',
category_inner_banner='$imgNAME_banner',
category_video_name='$video',
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


            $_SESSION["msg"] = "Service Updated Successfully !";
        } else {
            $_SESSION["msg"] = "Sorry! Service name is already exist";
            $_SESSION["type"] = "error";
        }
        header("Location:addedit-service.php?id=$_REQUEST[id]");
        exit;
        //*************** UPDATE EXISTING Service END ************************//
    } else {
        $category_url = ami_crete_url($category_name);
        //*************** INSERT NEW Service START ************************//

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
            if ($image) {
                $uploadedfile = $_FILES['file']['tmp_name'];
                $filename = stripslashes($_FILES['file']['name']);
                $extension = getExtension($filename);
                $extension = strtolower($extension);
                $imgNAME = substr(md5($category_url . time() . rand(1, 10)), 0, 14) . "." . $extension;
                move_uploaded_file($_FILES['file']['tmp_name'], "../uploaded_files/$imgNAME");
            } else {
                $imgNAME = $imgToDel;
            }
        }

        ////////////****************** IMAGE RESIZING END HERE *****************************//
        $dupliDataCount = db_scalar("select count(*) from tbl_service where 1 and category_name='$category_name'");
        if ($dupliDataCount == '0') {

            $sql = "insert into tbl_service set 
category_parent_id='0',
category_name='$category_name',			
category_image_name='$imgNAME',
category_description='$category_description', 	
category_meta_title='$category_meta_title',
category_meta_description='$category_meta_description',
category_meta_keywords='$category_meta_keywords',
category_is_product='No',
category_url='$category_url',
category_add_date='$curr_date',
category_status='$_REQUEST[category_status]'";
            db_query($sql);
            $_SESSION["msg"] = "Service added successfully !";
        } else {
            $_SESSION["msg"] = "Sorry! Service name is already exist";
            $_SESSION["type"] = "error";
        }
        header("Location:addedit-service.php?id=$_REQUEST[id]");
        exit;
        //*************** INSERT NEW Service END ************************//
    }
}

if ($category_id != '') {
    $result = db_query("select * from tbl_service where category_id = '$category_id'");
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
            <h1>Add/Edit service</h1>
            <small>Add/Edit service content</small>


            <a href="service_list.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
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
                                <h4>General Information</h4>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form name="form1" method="post" onsubmit="return formValidation()" enctype="multipart/form-data" class="col-sm-12">

                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label>Service Image</label>
                                    <?php if ($category_image_name != "") { ?>
                                        <img src="../uploaded_files/<?= $category_image_name ?>" class="form-control" style="width:150px;height:150px" />
                                    <?php } else { ?>
                                        <img src="assets/dist/img/no-image.jpg" class="form-control" style="width:120px;height:150px" />
                                    <?php } ?>

                                    <?php if ($category_image_name != "") { ?>
                                        <div class="col-lg-12 "><a href="addedit-service.php?delImage=<?= $category_image_name ?>&category_id=<?= $category_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class="form-group col-lg-3" style="padding-top:100px">
                                    <input type="file" name="file" id="file" />
                                </div>

                            </div>



                            <div class="form-group col-lg-12">
                                <label>Service Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="category_name" id="category_name" value="<?= $category_name ?>">
                            </div>


                            <div class="form-group col-lg-12">
                                <label>Service Description</label>
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
                                <label>Service Meta Title</label>
                                <textarea class="form-control" rows="3" name="category_meta_title" id="category_meta_title" placeholder="Enter Service meta title here"><?= $category_meta_title ?></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Service Meta Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter Service meta description here" name="category_meta_description" id="category_meta_description"><?= $category_meta_description ?></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Service Meta Keyword</label>
                                <textarea class="form-control" rows="3" name="category_meta_keywords" placeholder="Enter Service meta keywords here" id="category_meta_keywords"><?= $category_meta_keywords ?></textarea>
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