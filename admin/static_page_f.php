<?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet" type="text/css" />
<?php
$site_pages_id = $_GET['site_pages_id'];

if ($_REQUEST['delImage'] != "") {
  $isDel = db_query("UPDATE  tbl_site_pages SET  site_pages_image_name='' WHERE 1 and site_pages_id = '$site_pages_id'");
  @unlink("../static_files/$_REQUEST[delImage]");
  header("location:static_page_f.php?site_pages_id=$site_pages_id");
}

if ($_REQUEST['delImage_banner'] != "") {
  $isDel_banner = db_query("UPDATE  tbl_site_pages SET  site_pages_inner_banner='' WHERE 1 and site_pages_id = '$site_pages_id'");
  @unlink("../static_files/$_REQUEST[delImage_banner]");
  header("location:static_page_f.php?site_pages_id=$site_pages_id");
}

if ($_REQUEST['delImage_banner2'] != "") {
  $isDel_banner = db_query("UPDATE  tbl_site_pages SET  site_pages_inner_banner2='' WHERE 1 and site_pages_id = '$site_pages_id'");
  @unlink("../static_files/$_REQUEST[delImage_banner2]");
  header("location:static_page_f.php?site_pages_id=$site_pages_id");
}


if ($_REQUEST['delImage_banner3'] != "") {
  $isDel_banner = db_query("UPDATE  tbl_site_pages SET  site_pages_inner_banner3='' WHERE 1 and site_pages_id = '$site_pages_id'");
  @unlink("../static_files/$_REQUEST[delImage_banner3]");
  header("location:static_page_f.php?site_pages_id=$site_pages_id");
}


if ($_REQUEST['delImage_banner4'] != "") {
  $isDel_banner = db_query("UPDATE  tbl_site_pages SET  site_pages_inner_banner4='' WHERE 1 and site_pages_id = '$site_pages_id'");
  @unlink("../static_files/$_REQUEST[delImage_banner4]");
  header("location:static_page_f.php?site_pages_id=$site_pages_id");
}

if ($_REQUEST['delImage_banner5'] != "") {
  $isDel_banner = db_query("UPDATE  tbl_site_pages SET  site_pages_inner_banner5='' WHERE 1 and site_pages_id = '$site_pages_id'");
  @unlink("../static_files/$_REQUEST[delImage_banner5]");
  header("location:static_page_f.php?site_pages_id=$site_pages_id");
}



if ($_REQUEST['delVideo'] != "") {
  $isDel = db_query("UPDATE  tbl_site_pages SET  site_pages_video_name='' WHERE 1 and site_pages_id = '$site_pages_id'");
  @unlink("..static_files/video/$_REQUEST[delVideo]");
  header("location:static_page_f.php?site_pages_id=$site_pages_id");
}

if (is_post_back()) {
  $site_pages_description = sanitize_input($_REQUEST['site_pages_description']);
  $site_pages_description2 = sanitize_input($_REQUEST['site_pages_description2']);
  $site_pages_description3 = sanitize_input($_REQUEST['site_pages_description3']);
  $site_pages_description4 = sanitize_input($_REQUEST['site_pages_description4']);
  $site_pages_description5 = sanitize_input($_REQUEST['site_pages_description5']);
  $site_pages_meta_title = sanitize_input($_REQUEST['site_pages_meta_title']);
  $site_pages_meta_keyword = sanitize_input($_REQUEST['site_pages_meta_keyword']);
  $site_pages_meta_description = sanitize_input($_REQUEST['site_pages_meta_description']);

  if ($site_pages_name == 'Home') {
    $pg_url = 'index';
  } else {
    $pg_url = ami_crete_url($site_pages_name);
  }
  $ordBY = db_scalar("select MAX(site_pages_order_by) from tbl_site_pages where 1");
  $ordBY = $ordBY + 1;
  if ($site_pages_id != '') {
    ////////////****************** IMAGE RESIZING START HERE *****************************//
    //**********  *****************//
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
    $image = $_FILES["file"]["name"];
    $uploadedfile = $_FILES['file']['tmp_name'];
    if ($image) {
      $DelImage = db_scalar("select site_pages_image_name from tbl_site_pages where 1 and site_pages_id = '$_REQUEST[site_pages_id]'");
      @unlink("../static_files/$DelImage");
      $filename = stripslashes($_FILES['file']['name']);
      $extension = getExtension($filename);
      $extension = strtolower($extension);
      $imgNAME = rand(1000, 5000) . "." . $extension;

      move_uploaded_file($_FILES['file']['tmp_name'], "../static_files/$imgNAME");
    } else {
      $imgNAME = db_scalar("select site_pages_image_name from tbl_site_pages where 1 and site_pages_id = '$site_pages_id'");
    }

    /*### INNER BANNER IMAGE 1 ###*/

    $image_banner = $_FILES["site_pages_inner_banner"]["name"];
    $uploadedfile_banner = $_FILES['site_pages_inner_banner']['tmp_name'];
    if ($image_banner) {
      $DelImage_banner = db_scalar("select site_pages_inner_banner from tbl_site_pages where 1 and site_pages_id = '$_REQUEST[site_pages_id]'");
      @unlink("../static_files/$DelImage_banner");
      $filename_banner = stripslashes($_FILES['site_pages_inner_banner']['name']);
      $extension_banner = getExtension($filename_banner);
      $extension_banner = strtolower($extension_banner);
      $imgNAME_banner = rand(1000, 5000) . "." . $extension_banner;

      move_uploaded_file($_FILES['site_pages_inner_banner']['tmp_name'], "../static_files/$imgNAME_banner");
    } else {
      $imgNAME_banner = db_scalar("select site_pages_inner_banner from tbl_site_pages where 1 and site_pages_id = '$site_pages_id'");
    }

    /*### INNER BANNER IMAGE 2 ###*/

    $image_banner2 = $_FILES["site_pages_inner_banner2"]["name2"];
    $uploadedfile_banner2 = $_FILES['site_pages_inner_banner2']['tmp_name2'];
    if ($image_banner2) {
      $DelImage_banner = db_scalar("select site_pages_inner_banner2 from tbl_site_pages where 1 and site_pages_id = '$_REQUEST[site_pages_id]'");
      @unlink("../static_files/$DelImage_banner2");
      $filename_banner2 = stripslashes($_FILES['site_pages_inner_banner2']['name']);
      $extension_banner2 = getExtension($filename_banner2);
      $extension_banner2 = strtolower($extension_banner2);
      $imgNAME_banner2 = rand(1000, 5000) . "." . $extension_banner2;

      move_uploaded_file($_FILES['site_pages_inner_banner2']['tmp_name2'], "../static_files/$imgNAME_banner2");
    } else {
      $imgNAME_banner2 = db_scalar("select site_pages_inner_banner2 from tbl_site_pages where 1 and site_pages_id = '$site_pages_id'");
    }




    /*### INNER BANNER IMAGE 3 ###*/

    $image_banner3 = $_FILES["site_pages_inner_banner3"]["name"];
    $uploadedfile_banner3 = $_FILES['site_pages_inner_banner3']['tmp_name'];
    if ($image_banner3) {
      $DelImage_banner3 = db_scalar("select site_pages_inner_banner3 from tbl_site_pages where 1 and site_pages_id = '$_REQUEST[site_pages_id]'");
      @unlink("../static_files/$DelImage_banner3");
      $filename_banner3 = stripslashes($_FILES['site_pages_inner_banner3']['name']);
      $extension_banner3 = getExtension($filename_banner3);
      $extension_banner3 = strtolower($extension_banner3);
      $imgNAME_banner3 = rand(1000, 5000) . "." . $extension_banner3;

      move_uploaded_file($_FILES['site_pages_inner_banner3']['tmp_name'], "../static_files/$imgNAME_banner3");
    } else {
      $imgNAME_banner3 = db_scalar("select site_pages_inner_banner3 from tbl_site_pages where 1 and site_pages_id = '$site_pages_id'");
    }

    /*### INNER BANNER IMAGE 4 ###*/

    $image_banner4 = $_FILES["site_pages_inner_banner4"]["name4"];
    $uploadedfile_banner4 = $_FILES['site_pages_inner_banner4']['tmp_name4'];
    if ($image_banner4) {
      $DelImage_banner4 = db_scalar("select site_pages_inner_banner4 from tbl_site_pages where 1 and site_pages_id = '$_REQUEST[site_pages_id]'");
      @unlink("../static_files/$DelImage_banner4");
      $filename_banner4 = stripslashes($_FILES['site_pages_inner_banner4']['name4']);
      $extension_banner4 = getExtension($filename_banner4);
      $extension_banner4 = strtolower($extension_banner4);
      $imgNAME_banner4 = rand(1000, 5000) . "." . $extension_banner4;

      move_uploaded_file($_FILES['site_pages_inner_banner4']['tmp_name4'], "../static_files/$imgNAME_banner4");
    } else {
      $imgNAME_banner4 = db_scalar("select site_pages_inner_banner4 from tbl_site_pages where 1 and site_pages_id = '$site_pages_id'");
    }

    /*### INNER BANNER IMAGE 5 ###*/

    $image_banner5 = $_FILES["site_pages_inner_banner5"]["name"];
    $uploadedfile_banner5 = $_FILES['site_pages_inner_banner5']['tmp_name'];
    if ($image_banner5) {
      $DelImage_banner5 = db_scalar("select site_pages_inner_banner5 from tbl_site_pages where 1 and site_pages_id = '$_REQUEST[site_pages_id]'");
      @unlink("../static_files/$DelImage_banner5");
      $filename_banner5 = stripslashes($_FILES['site_pages_inner_banner5']['name']);
      $extension_banner5 = getExtension($filename_banner5);
      $extension_banner5 = strtolower($extension_banner5);
      $imgNAME_banner5 = rand(1000, 5000) . "." . $extension_banner5;

      move_uploaded_file($_FILES['site_pages_inner_banner5']['tmp_name'], "../static_files/$imgNAME_banner5");
    } else {
      $imgNAME_banner5 = db_scalar("select site_pages_inner_banner5 from tbl_site_pages where 1 and site_pages_id = '$site_pages_id'");
    }



    if (is_uploaded_file($_FILES['site_pages_video_name']['tmp_name'])) {

      $video = $_FILES['site_pages_video_name']['name'];
      $extension = explode('/', $_FILES['site_pages_video_name']['type']);
      $video = rand(1000, 5000) . '.' . $extension[1];

      move_uploaded_file($_FILES['site_pages_video_name']['tmp_name'], "../static_files/video/$video");
    } else {
      $video = db_scalar("select site_pages_video_name from tbl_site_pages where 1 and site_pages_id = '$site_pages_id'");
    }

    ////////////****************** IMAGE RESIZING END HERE *****************************//
    $sqlupdate = "update tbl_site_pages set 
                     site_pages_name='$_REQUEST[site_pages_name]', 
             site_pages_title='$_REQUEST[site_pages_title]',
             site_pages_title2='$_REQUEST[site_pages_title2]',
              site_pages_title3='$_REQUEST[site_pages_title3]',
               site_pages_title4='$_REQUEST[site_pages_title4]',
                site_pages_title5='$_REQUEST[site_pages_title5]',
             site_pages_image_name='$imgNAME',
             site_pages_inner_banner='$imgNAME_banner',
             site_pages_inner_banner2='$imgNAME_banner2',
              site_pages_inner_banner3='$imgNAME_banner3',
               site_pages_inner_banner4='$imgNAME_banner4',
                site_pages_inner_banner5='$imgNAME_banner5',
             site_pages_video_name='$_REQUEST[site_pages_video_name]',
             site_pages_meta_title = '$site_pages_meta_title',
             site_pages_link='$_REQUEST[site_pages_link]',
             site_pages_meta_description='$site_pages_meta_description',
             site_pages_meta_keyword='$site_pages_meta_keyword',
             site_pages_description='$site_pages_description',
             site_pages_description2='$site_pages_description2',
             site_pages_description3='$site_pages_description3',
             site_pages_description4='$site_pages_description4',
             site_pages_description5='$site_pages_description5',
             site_pages_show_in_header='$_REQUEST[show_in_header]',
             site_pages_show_in_footer='$_REQUEST[show_in_footer]',
             site_pages_add_date='$curr_date',
             site_pages_status='$_REQUEST[site_pages_status]'  
             where site_pages_id = '$_REQUEST[site_pages_id]' ";


    db_query($sqlupdate);
    set_session_msg("Page Updated Successfully !");
  } else {
    //*************** INSERT NEW CATEGORY START ************************//
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
    $image = $_FILES["file"]["name"];
    $uploadedfile = $_FILES['file']['tmp_name'];
    if ($image) {
      $filename = stripslashes($_FILES['file']['name']);
      $extension = getExtension($filename);
      $extension = strtolower($extension);
      $imgNAME = $pg_url . "." . $extension;


      move_uploaded_file($_FILES['file']['tmp_name'], "../static_files/$imgNAME");
    }

    ////////////****************** IMAGE RESIZING END HERE *****************************//
    $dupliDataCount = db_scalar("select count(*) from tbl_site_pages where 1 and site_pages_name='$_REQUEST[site_pages_name]'");
    if ($dupliDataCount == '0') {
      $sqlinsert = "insert into tbl_site_pages set 
              site_pages_name='$_REQUEST[site_pages_name]', 
             site_pages_title='$_REQUEST[site_pages_title]',
               site_pages_title2='$_REQUEST[site_pages_title2]',
               site_pages_title3='$_REQUEST[site_pages_title3]',
               site_pages_title4='$_REQUEST[site_pages_title4]',
               site_pages_title5='$_REQUEST[site_pages_title5]',
             site_pages_description2='$site_pages_description2',
             site_pages_description3='$site_pages_description3',
             site_pages_description4='$site_pages_description4',
             site_pages_description5='$site_pages_description5',
             site_pages_image_name='$imgNAME',
             site_pages_inner_banner2='$imgNAME_banner2',
              site_pages_inner_banner3='$imgNAME_banner3',
              site_pages_inner_banner4='$imgNAME_banner4',
              site_pages_inner_banner5='$imgNAME_banner5', 
             site_pages_video_name='$video',
             site_pages_meta_title = '$site_pages_meta_title',
             site_pages_link='$_REQUEST[site_pages_link]',
             site_pages_meta_description='$site_pages_meta_description',
             site_pages_meta_keyword='$site_pages_meta_keyword',
             site_pages_description='$site_pages_description',
             site_pages_show_in_header='$_REQUEST[show_in_header]',
             site_pages_show_in_footer='$_REQUEST[show_in_footer]',
             site_pages_add_date='$curr_date',
             site_pages_status='$_REQUEST[site_pages_status]' ";
      db_query($sqlinsert);
      set_session_msg("Page Added Successfully !");
    } else {
      set_session_msg("Sorry! page name is already exist !");
    }
  }
  header("Location: static_page_list.php");
  exit;
}
if ($site_pages_id != '') {
  $sql = "select * from tbl_site_pages where site_pages_id = '$site_pages_id'";
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
      <h1>Edit Page</h1>
      <small>Edit Page Content</small>


      <a href="static_page_list.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
          <span class="btn-label"><i class="fa fa-chevron-circle-left"></i></span>Go Back
        </button></a>


    </div>


  </section>
  <script type="text/javascript">
    function formValidation() {
      if (document.getElementById('site_pages_link').value == 0) {
        alert("Select page link !");
        document.getElementById('site_pages_link').focus();
        return false;
      }

    }
  </script>
  <!-- Main content -->
  <script src="ckeditor/ckeditor.js"></script>
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
            <form name="form1" method="post" onsubmit="return formValidation()" enctype="multipart/form-data" class="col-sm-12">
              <div class="form-group col-lg-6">
                <label>Page Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="site_pages_name" id="site_pages_name" value="<?= $site_pages_name ?>">
              </div>
              <div class="form-group col-lg-6">
                <label>Page Link</label>
                <!-- <input type="text" class="form-control" placeholder="Enter Title" name="site_pages_title" id="site_pages_title" value="<?= $site_pages_title ?>" > -->
                <select name="site_pages_link" id="site_pages_link" class="form-control">
                  <option value="">Select Page Link</option>
                  <option value="index.php" <?php if ($site_pages_link == 'index') { ?> selected="selected" <?php } ?>>index.php</option>
                  <option value="about.php" <?php if ($site_pages_link == 'about') { ?> selected="selected" <?php } ?>>about.php</option>
                  <option value="ourteam.php" <?php if ($site_pages_link == 'ourteam') { ?> selected="selected" <?php } ?>>ourteam.php</option>
                  <option value="communityevents.php" <?php if ($site_pages_link == 'communityevents') { ?> selected="selected" <?php } ?>>communityevents.php</option>
                  <option value="business.php" <?php if ($site_pages_link == 'business') { ?> selected="selected" <?php } ?>>business.php</option>
                  <option value="StartUpVisa.php" <?php if ($site_pages_link == 'StartUpVisa') { ?> selected="selected" <?php } ?>>StartUpVisa.php</option>
                  <option value="OwnerOperator.php" <?php if ($site_pages_link == 'OwnerOperator.php') { ?> selected="selected" <?php } ?>>OwnerOperator.php</option>
                  <option value="pnb.php" <?php if ($site_pages_link == 'pnb.php') { ?> selected="selected" <?php } ?>>pnb.php</option>
                  <option value="Visit.php" <?php if ($site_pages_link == 'Visit.php') { ?> selected="selected" <?php } ?>>Visit.php</option>
                  <option value="Work.php" <?php if ($site_pages_link == 'Work.php') { ?> selected="selected" <?php } ?>>Work.php</option>
                  <option value="FamilySponsorship.php" <?php if ($site_pages_link == 'FamilySponsorship.php') { ?> selected="selected" <?php } ?>>FamilySponsorship.php</option>
                  <option value="Study.php" <?php if ($site_pages_link == 'Study.php') { ?> selected="selected" <?php } ?>>Study.php</option>
                  <option value="Immigrate.php" <?php if ($site_pages_link == 'Immigrate.php') { ?> selected="selected" <?php } ?>>Immigrate.php</option>
                  <option value="Settlement-Services.php" <?php if ($site_pages_link == 'Settlement-Services.php') { ?> selected="selected" <?php } ?>>Settlement-Services.php</option>
                  <option value="Commitment.php" <?php if ($site_pages_link == 'Commitment.php') { ?> selected="selected" <?php } ?>>Commitment.php</option>
                  <option value="employers-settlement-service.php" <?php if ($site_pages_link == 'employers-settlement-service.php') { ?> selected="selected" <?php } ?>>employers-settlement-service.php</option>
                  <option value="recruitment.php" <?php if ($site_pages_link == 'recruitment.php') { ?> selected="selected" <?php } ?>>recruitment.php</option>
                  <option value="Immigration.php" <?php if ($site_pages_link == 'Immigration.php') { ?> selected="selected" <?php } ?>>Immigration.php</option>
                  <option value="review.php" <?php if ($site_pages_link == 'review.php') { ?> selected="selected" <?php } ?>>review.php</option>
                  <option value="contact.php" <?php if ($site_pages_link == 'contact.php') { ?> selected="selected" <?php } ?>>contact.php</option>
                  <option value="OwnerOperator.php" <?php if ($site_pages_link == 'OwnerOperator.php') { ?> selected="selected" <?php } ?>>OwnerOperator.php</option>
                  <option value="book-appointment.php" <?php if ($site_pages_link == 'book-appointment.php') { ?> selected="selected" <?php } ?>>book-appointment.php</option>
                </select>


              </div>

              <?php if ($site_pages_link == 'index.php' || $site_pages_link == 'pnb.php' || $site_pages_link == 'book-appointment.php' || $site_pages_link == 'Immigration.php' ||  $site_pages_link == 'contact.php' || $site_pages_link == 'employers-settlement-service.php' ||  $site_pages_link == 'recruitment.php' || $site_pages_link == 'Settlement-Services.php' || $site_pages_link == 'Commitment.php' || $site_pages_link == 'about.php' || $site_pages_link == 'FamilySponsorship.php' || $site_pages_link == 'Visit.php' || $site_pages_link == 'Work.php' || $site_pages_link == 'ourteam.php' || $site_pages_link == 'communityevents.php' ||  $site_pages_link == 'business.php' || $site_pages_link == 'StartUpVisa.php' ||  $site_pages_link == "OwnerOperator.php" || $site_pages_link == 'events-and-news-letter' || $site_pages_link == 'client-testimonial' || $site_pages_link == 'career' || $site_pages_link == 'Study.php' || $site_pages_link == 'Immigrate.php' || $site_pages_link == 'company-overview' || $site_pages_link == 'workshop') { ?>

                <div class="form-group col-lg-3">
                  <label>Page Image 1</label>
                  <?php if ($site_pages_image_name != "") { ?>
                    <img src="../static_files/<?= $site_pages_image_name ?>" class="form-control" style="width:170px;height:200px" />
                  <?php } else { ?>
                    <img src="assets/dist/img/no-image.jpg" class="form-control" style="width:170px;height:200px" />
                  <?php } ?>

                  <?php if ($site_pages_image_name != "") { ?>
                    <div class="col-lg-12 "><a href="static_page_f.php?delImage=<?= $site_pages_image_name ?>&site_pages_id=<?= $site_pages_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
                    </div>
                  <?php } ?>

                </div>

                <div class="form-group col-lg-3" style="padding-top:100px">
                  <input type="file" name="file" id="file" />
                </div>

                <!-- *************** -->

                <!-- <div class="form-group col-lg-4">
<label> Video</label>
<?php if ($site_pages_video_name != "") {
                  $ext = explode('.', $line_raw['site_pages_video_name']); ?><br>
<video width="300" height="200" controls>
  <source src="../static_files/video/<?= $line_raw['site_pages_video_name'] ?>" type="video/<?= $ext[1] ?>">
</video>
<?php } else { ?>
<img src="assets/dist/img/no-video.png" class="form-control" style="width:170px;height:200px" />
<?php } ?>

<?php if ($site_pages_video_name != "") { ?>
<div class="col-lg-12 " ><a href="static_page_f.php?delVideo=<?= $site_pages_video_name ?>&site_pages_id=<?= $site_pages_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline" >Remove Video</a>                  
</div>
<?php } ?>

</div> -->

                <div class="form-group col-lg-6" style="padding-top:100px">
                  <label>Enter Video Link</label>
                  <input type="text" class="form-control" name="site_pages_video_name" id="site_pages_video_name" placeholder="E.g: OTKA2JodaDU" value="<?= $line_raw['site_pages_video_name'] ?>" />
                </div>




                <?php
                if ($site_pages_link == 'about') { ?>
                  <div class="form-group col-lg-3">
                    <label>Page Image</label>
                    <?php if ($site_pages_image_name != "") { ?>
                      <img src="../static_files/<?= $site_pages_image_name ?>" class="form-control" style="width:170px;height:200px" />
                    <?php } else { ?>
                      <img src="assets/dist/img/no-image.jpg" class="form-control" style="width:170px;height:200px" />
                    <?php } ?>

                    <?php if ($site_pages_image_name != "") { ?>
                      <div class="col-lg-12 "><a href="static_page_f.php?delImage=<?= $site_pages_image_name ?>&site_pages_id=<?= $site_pages_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
                      </div>
                    <?php } ?>

                  </div>

                  <div class="form-group col-lg-3" style="padding-top:100px">
                    <input type="file" name="file" id="file" />
                  </div>

                  <div class="form-group col-lg-6" style="padding-top:100px">
                    <label>Enter Video Link</label>
                    <input type="text" class="form-control" name="site_pages_video_name" id="site_pages_video_name" placeholder="E.g: OTKA2JodaDU" value="<?= $line_raw['site_pages_video_name'] ?>" />
                  </div>


                <?php } ?>

                <div class="form-group col-lg-12">
                  <label>Page Title 1</label>
                  <textarea class="form-control" rows="3" name="site_pages_title" id="site_pages_title" placeholder="Enter page  title here"><?= $site_pages_title ?></textarea>
                </div>
                <div class="form-group col-lg-12">
                  <label>Page Content 1</label>
                  <textarea class="form-control" name="site_pages_description" rows="3" id="editor1"><?= $site_pages_description ?></textarea>
                </div>

                <script>
                  // Replace the <textarea id="editor"> with an CKEditor
                  // instance, using default configurations.
                  CKEDITOR.replace('editor1');
                </script>

                <div class="form-group col-lg-12">
                  <label>Page Title 2</label>
                  <textarea class="form-control" rows="3" name="site_pages_title2" id="site_pages_title2" placeholder="Enter page  title here"><?= $site_pages_title2 ?></textarea>
                </div>
                <div class="form-group col-lg-12">
                  <label>Page Content 2</label>
                  <textarea class="form-control" name="site_pages_description2" rows="3" id="editor2"><?= $site_pages_description2 ?></textarea>
                </div>
          </div>
          <script>
            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace('editor2');
          </script>

          <!-- **INNER BANNER FOR REGISTRATION PAGE** -->
          <?php
                if ($line_raw['site_pages_link'] == 'index.php' || $line_raw['site_pages_link'] == 'book-appointment.php' || $line_raw['site_pages_link'] == 'contact.php' || $line_raw['site_pages_link'] == 'about.php' || $line_raw['site_pages_link'] == 'Immigration.php' || $line_raw['site_pages_link'] == 'recruitment.php' || $line_raw['site_pages_link'] == 'about.php' || $line_raw['site_pages_link'] == 'Immigrate.php' || $line_raw['site_pages_link'] == 'employers-settlement-service.php' || $line_raw['site_pages_link'] == 'Commitment.php' || $line_raw['site_pages_link'] == 'Settlement-Services.php' || $line_raw['site_pages_link'] == 'Visit.php' || $line_raw['site_pages_link'] == 'communityevents.php' || $line_raw['site_pages_link'] == 'Work.php' || $line_raw['site_pages_link'] == 'Study.php' || $line_raw['site_pages_link'] == 'FamilySponsorship.php') { ?>
            <div class="row">
              <div class="form-group col-lg-9">
                <label>Page Image 2</label>
                <?php if ($site_pages_inner_banner != "") { ?>
                  <img src="../static_files/<?= $site_pages_inner_banner ?>" class="form-control" style="width:600px;height:300px" />
                <?php } else { ?>
                  <img src="assets/dist/img/no-banner.png" class="form-control" style="width:600px;height:300px" />
                <?php } ?>

                <?php if ($site_pages_inner_banner != "") { ?>
                  <div class="col-lg-12 "><a href="static_page_f.php?delImage_banner=<?= $site_pages_inner_banner ?>&site_pages_id=<?= $site_pages_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
                  </div>
              <?php }
                } ?>

              </div>

              <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
              <div class="form-group col-lg-3" style="padding-top:100px">
                <span style="color: red;font-weight: bold;">Size must be: 1519 x 380</span><br>
                <input type="file" name="site_pages_inner_banner" id="site_pages_inner_banner" />
              </div>
            </div>


            <div class="form-group col-lg-12">
              <label>Page Title 3</label>
              <textarea class="form-control" rows="3" name="site_pages_title3" id="site_pages_title3" placeholder="Enter page  title here"><?= $site_pages_title3 ?></textarea>
            </div>
            <div class="form-group col-lg-12">
              <label>Page Content 3</label>
              <textarea class="form-control" name="site_pages_description3" rows="3" id="editor3"><?= $site_pages_description3 ?></textarea>
            </div>
        </div>
        <script>
          // Replace the <textarea id="editor"> with an CKEditor
          // instance, using default configurations.
          CKEDITOR.replace('editor3');
        </script>

        <!-- **INNER BANNER FOR REGISTRATION PAGE** -->
        <?php
                if ($line_raw['site_pages_link'] == 'index.php' || $line_raw['site_pages_link'] == 'about.php' || $line_raw['site_pages_link'] == 'book-appointment.php'  || $line_raw['site_pages_link'] == 'contact.php'  || $line_raw['site_pages_link'] == 'Immigration.php' || $line_raw['site_pages_link'] == 'recruitment.php' || $line_raw['site_pages_link'] == 'Commitment.php' || $line_raw['site_pages_link'] == 'employers-settlement-service.php' || $line_raw['site_pages_link'] == 'Settlement-Services.php' || $line_raw['site_pages_link'] == 'Visit.php' || $line_raw['site_pages_link'] == 'Immigrate.php'   || $line_raw['site_pages_link'] == 'Work.php'  || $line_raw['site_pages_link'] == 'communityevents.php' || $line_raw['site_pages_link'] == 'our-products' || $line_raw['site_pages_link'] == 'Study.php' || $line_raw['site_pages_link'] == 'FamilySponsorship.php') { ?>
          <div class="row">

            <div class="form-group col-lg-9">
              <label>Page Image 3</label>
              <?php if ($site_pages_inner_banner3 != "") { ?>
                <img src="../static_files/<?= $site_pages_inner_banner3 ?>" class="form-control" style="width:600px;height:300px" />
              <?php } else { ?>
                <img src="assets/dist/img/no-banner.png" class="form-control" style="width:600px;height:300px" />
              <?php } ?>

              <?php if ($site_pages_inner_banner3 != "") { ?>
                <div class="col-lg-12 "><a href="static_page_f.php?delImage_banner3=<?= $site_pages_inner_banner3 ?>&site_pages_id=<?= $site_pages_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
                </div>
            <?php }
                } ?>

            </div>

            <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
            <div class="form-group col-lg-3" style="padding-top:100px">
              <span style="color: red;font-weight: bold;">Size must be: 1519 x 380</span><br>
              <input type="file" name="site_pages_inner_banner3" id="site_pages_inner_banner3" />
            </div>
          </div>


          <div class="form-group col-lg-12">
            <label>Page Title 4</label>
            <textarea class="form-control" rows="3" name="site_pages_title4" id="site_pages_title4" placeholder="Enter page  title here"><?= $site_pages_title4 ?></textarea>
          </div>
          <div class="form-group col-lg-12">
            <label>Page Content 4</label>
            <textarea class="form-control" name="site_pages_description4" rows="3" id="editor4"><?= $site_pages_description4 ?></textarea>
          </div>
      </div>
      <script>
        // Replace the <textarea id="editor"> with an CKEditor
        // instance, using default configurations.
        CKEDITOR.replace('editor4');
      </script>

      <!-- **INNER BANNER FOR REGISTRATION PAGE** -->
      <?php
                if ($line_raw['site_pages_link'] == 'index.php' ||  $line_raw['site_pages_link'] == 'contact.php' || $line_raw['site_pages_link'] == 'book-appointment.php' || $line_raw['site_pages_link'] == 'about.php' || $line_raw['site_pages_link'] == 'Immigration.php' || $line_raw['site_pages_link'] == 'Commitment.php' || $line_raw['site_pages_link'] == 'recruitment.php' || $line_raw['site_pages_link'] == 'employers-settlement-service.php' || $line_raw['site_pages_link'] == 'Settlement-Services.php' ||  $line_raw['site_pages_link'] == 'Visit.php' || $line_raw['site_pages_link'] == 'Immigrate.php'  || $line_raw['site_pages_link'] == 'Work.php' || $line_raw['site_pages_link'] == 'communityevents.php' || $line_raw['site_pages_link'] == 'our-products' || $line_raw['site_pages_link'] == 'Study.php' || $line_raw['site_pages_link'] == 'FamilySponsorship.php') { ?>
        <div class="row">
          <div class="form-group col-lg-9">
            <label>Page Image 4</label>
            <?php if ($site_pages_inner_banner4 != "") { ?>
              <img src="../static_files/<?= $site_pages_inner_banner4 ?>" class="form-control" style="width:600px;height:300px" />
            <?php } else { ?>
              <img src="assets/dist/img/no-banner.png" class="form-control" style="width:600px;height:300px" />
            <?php } ?>

            <?php if ($site_pages_inner_banner4 != "") { ?>
              <div class="col-lg-12"><a href="static_page_f.php?delImage_banner4=<?= $site_pages_inner_banner4 ?>&site_pages_id=<?= $site_pages_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
              </div>
          <?php }
                } ?>

          </div>

          <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
          <div class="form-group col-lg-3" style="padding-top:100px">
            <span style="color: red;font-weight: bold;">Size must be: 1519 x 380</span><br>
            <input type="file" name="site_pages_inner_banner4" id="site_pages_inner_banner4" />
          </div>
        </div>


        <div class="form-group col-lg-12">
          <label>Page Title 5</label>
          <textarea class="form-control" rows="3" name="site_pages_title5" id="site_pages_title5" placeholder="Enter page  title here"><?= $site_pages_title5 ?></textarea>
        </div>
        <div class="form-group col-lg-12">
          <label>Page Content 5</label>
          <textarea class="form-control" name="site_pages_description5" rows="3" id="editor5"><?= $site_pages_description5 ?></textarea>
        </div>
    </div>
    <script>
      // Replace the <textarea id="editor"> with an CKEditor
      // instance, using default configurations.
      CKEDITOR.replace('editor5');
    </script>

    <!-- **INNER BANNER FOR REGISTRATION PAGE** -->
    <?php
                if ($line_raw['site_pages_link'] == 'index.php' || $line_raw['site_pages_link'] == 'about.php' || $line_raw['site_pages_link'] == 'book-appointment.php' ||  $line_raw['site_pages_link'] == 'contact.php' || $line_raw['site_pages_link'] == 'Immigration.php' || $line_raw['site_pages_link'] == 'Commitment.php' || $line_raw['site_pages_link'] == 'recruitment.php' || $line_raw['site_pages_link'] == 'employers-settlement-service.php' || $line_raw['site_pages_link'] == 'Settlement-Services.php' || $line_raw['site_pages_link'] == 'Visit.php' || $line_raw['site_pages_link'] == 'Immigrate.php' || $line_raw['site_pages_link'] == 'Work.php' || $line_raw['site_pages_link'] == 'communityevents.php' || $line_raw['site_pages_link'] == 'our-products' || $line_raw['site_pages_link'] == 'Study.php' || $line_raw['site_pages_link'] == 'FamilySponsorship.php') { ?>
      <div class="row">
        <div class="form-group col-lg-9">
          <label>Page Image 5</label>
          <?php if ($site_pages_inner_banner5 != "") { ?>
            <img src="../static_files/<?= $site_pages_inner_banner5 ?>" class="form-control" style="width:600px;height:300px" />
          <?php } else { ?>
            <img src="assets/dist/img/no-banner.png" class="form-control" style="width:600px;height:300px" />
          <?php } ?>

          <?php if ($site_pages_inner_banner5 != "") { ?>
            <div class="col-lg-12 "><a href="static_page_f.php?delImage_banner5=<?= $site_pages_inner_banner5 ?>&site_pages_id=<?= $site_pages_id ?>" style="font-weight:600;margin-left:15px;text-decoration:underline">Remove Image</a>
            </div>
        <?php }
                } ?>

        </div>

        <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
        <div class="form-group col-lg-3" style="padding-top:100px">
          <span style="color: red;font-weight: bold;">Size must be: 1519 x 380</span><br>
          <input type="file" name="site_pages_inner_banner5" id="site_pages_inner_banner5" />
        </div>
      </div>

    <?php } ?>
    <div class=" row">
      <div class="form-group col-lg-3">
        <select name="site_pages_status" class="form-control">
          <option value="Active" <?php if ($site_pages_status == 'Active') { ?> selected="selected" <?php } ?>>Active</option>
          <option value="Inactive" <?php if ($site_pages_status == 'Inactive') { ?> selected="selected" <?php } ?>>Inactive</option>
        </select>


      </div>

      <div class="form-group col-lg-3">
        <select name="show_in_header" class="form-control">
          <option value="">Header</option>
          <option value="Yes" <?php if ($site_pages_show_in_header == 'Yes') { ?> selected="selected" <?php } ?>>Show in header</option>
          <option value="No" <?php if ($site_pages_show_in_header == 'No') { ?> selected="selected" <?php } ?>>Not show in header</option>
        </select>


      </div>
      <div class="form-group col-lg-3">
        <select name="show_in_footer" class="form-control">
          <option value="">Footer</option>
          <option value="Yes" <?php if ($site_pages_show_in_footer == 'Yes') { ?> selected="selected" <?php } ?>>Show in footer</option>
          <option value="No" <?php if ($site_pages_show_in_footer == 'No') { ?> selected="selected" <?php } ?>>Not show in footer</option>
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
        <label>Page Meta Title</label>
        <textarea class="form-control" rows="3" name="site_pages_meta_title" id="site_pages_meta_title" placeholder="Enter page meta title here"><?= $site_pages_meta_title ?></textarea>
      </div>
      <div class="form-group col-lg-12">
        <label>Page Meta Description</label>
        <textarea class="form-control" rows="3" placeholder="Enter page meta description here" name="site_pages_meta_description" id="site_pages_meta_description"><?= $site_pages_meta_description ?></textarea>
      </div>
      <div class="form-group col-lg-12">
        <label>Page Meta Keyword</label>
        <textarea class="form-control" rows="3" name="site_pages_meta_keyword" placeholder="Enter page meta keywords here" id="site_pages_meta_keyword"><?= $site_pages_meta_keyword ?></textarea>
      </div>



      <div class="col-lg-12 reset-button">

        <button type="submit" class="btn btn-add">Update</button>

      </div>
    </div>

    </form>
</div>

</div>
</section>
<!-- /.content -->
</div>
<?php require_once("footer.php"); ?>