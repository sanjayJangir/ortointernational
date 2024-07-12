<?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<?php require_once('../includes/photoshop.php'); ?>
<style>
   .v-middle {
      vertical-align: middle !important;

   }

   div#formdiv {
      background: #8e32a23b;
      padding: 15px;
   }

   div#formdiv input {
      background: #3f3c3c;
      border: solid thin #3f3c3c;
      color: #fff;
      padding: 5px 8px 5px 8px;
      border-radius: 5px;
      font-weight: 600;
   }

   div#formdiv input[type="button"] {
      background: #FF5722;
      border: solid thin #FF5722;
      color: #fff;
      padding: 5px 8px 5px 8px;
      border-radius: 5px;
      font-weight: 600;
   }

   div#formdiv input[type="submit"] {
      background: #FF5722;
      border: solid thin #FF5722;
      color: #fff;
      padding: 5px 8px 5px 8px;
      border-radius: 5px;
      font-weight: 600;
   }
</style>
<?php
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

$branch_id = $_REQUEST['branch_id'];
$delImageID = $_REQUEST['DelID'];
if (!empty($delImageID)) {
   $imageToDel = db_scalar("select branch_image_name from tbl_branch_gallery where 1 and id='$delImageID'");
   @unlink('../branch_gallery/' . $imageToDel);
   $sqldel = "delete from tbl_branch_gallery where 1 and id='$delImageID'";
   db_query($sqldel);
   set_session_msg("Image Deleted Successfully !");
   header("Location: branch_image_list.php?branch_id=$_REQUEST[branch_id]");
   exit;
}
if (is_post_back()) {
   if (isset($_POST['submit'])) {
      for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
         $imgName = $_FILES['file']['name'][$i];
         $gTitle = $_POST['title'][$i];

         //**** Change Duplicate Image name Start Here****//
         $uploadedfile = $_FILES['file']['tmp_name'][$i];
         $filename = stripslashes($_FILES['file']['name'][$i]);
         $extension = getExtension($filename);
         $extension = strtolower($extension);
         $imgNAME = substr(md5($imgName . time() . rand(1, 10)), 0, 14) . "." . $extension;

         if (move_uploaded_file($_FILES['file']['tmp_name'][$i], "../branch_gallery/$imgNAME")) {
            $sql = "insert into tbl_branch_gallery set 
branch_parent_id='$branch_id',
branch_image_name='$imgNAME',
add_date='$curr_date'";
            db_query($sql);
         }
      }
      set_session_msg("Image uploaded successfully !");
      header("Location: branch_image_list.php?branch_id=$_REQUEST[branch_id]");
      exit;
   }
}
?>
<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-list" aria-hidden="true"></i>
      </div>
      <div class="header-title">
         <h1>Branch Image</h1>
         <small>Branch Image List</small>
         <a href="manage-branch-gallery.php" class="btn btn-link" style="float: right;font-size: 14px;margin: -20px 18px 0 0; border: solid thin #337ab785;"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            Go Back</a>


         <span class="count-num">Total : <?= db_scalar("SELECT COUNT(id) FROM tbl_branch_gallery WHERE branch_parent_id='$_REQUEST[branch_id]'") ?></span>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">

         <?php if ($_SESSION["msg"] != "") { ?>
            <div class="alert alert-success alert-dismissable fade in text-center" style="background-color:#dff0d8;border:none; color:#000;margin:10px 0 0 0">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Success!&nbsp;&nbsp;&nbsp;</strong> <?= $_SESSION["msg"] ?>
            </div>
         <?php
            unset($_SESSION["msg"]);
         } ?>


         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" data-edit-title='false' data-close='false' data-reload='false'>

               <div class="panel-heading">
                  <div class="btn-group" id="buttonexport">
                     <a href="#">
                        <h4>Branch Image List</h4>
                     </a>
                  </div>
               </div>

               <div class="panel-body">

                  <div class="table-responsive">
                     <?php
                     $sql_fetch = db_query("select * from tbl_branch_gallery where 1 and branch_parent_id='" . $_REQUEST['branch_id'] . "'");
                     $cntDATA = mysqli_num_rows($sql_fetch);
                     if ($cntDATA > 0) {
                        while ($DATA = mysqli_fetch_array($sql_fetch)) {
                           @extract($DATA);
                     ?>
                           <div class="col-lg-2 text-center" style="margin-bottom:10px">
                              <img src="../branch_gallery/<?= $DATA['branch_image_name'] ?>" class="img-thumbnail" width="140" height="140" />

                              <div class="col-lg-12 text-center" style="margin-top:10px"><a href="branch_image_list.php?DelID=<?= $DATA['id'] ?>&branch_id=<?= $_REQUEST['branch_id'] ?>"><i class="fa fa-trash fa-2x" style="color:#F00"></i></a></div>
                           </div>
                     <?php }
                     } ?>
                     <div class="cb"></div>
                  </div>
                  <table width="55%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableForm" style="border:1px solid  #8e32a23b; margin-top:20px; margin-bottom:10px;">
                     <tr>
                        <td class="tdLabel" style="padding:8px;">
                           <div id="maindiv">
                              <div id="formdiv">
                                 <form enctype="multipart/form-data" action="" method="post">
                                    <div id="filediv">
                                       <input name="file[]" type="file" id="file" />
                                    </div>
                                    <br />
                                    <input type="button" id="add_more" class="upload" value="Add More Files" />
                                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload" />
                                 </form>
                                 <br />
                              </div>
                           </div>
                        </td>
                     </tr>
                  </table>
                  </table>




               </div>



            </div>
         </div>
      </div>
</div>
<!-- customer Modal1 -->
<div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3><i class="fa fa-file-text-o m-r-5"></i> Update Page</h3>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal">
                     <fieldset>
                        <!-- Text input-->
                        <div class="col-md-4 form-group">
                           <label class="control-label">Customer Name:</label>
                           <input type="text" placeholder="Customer Name" class="form-control">
                        </div>
                        <!-- Text input-->
                        <div class="col-md-4 form-group">
                           <label class="control-label">Email:</label>
                           <input type="email" placeholder="Email" class="form-control">
                        </div>
                        <!-- Text input-->
                        <div class="col-md-4 form-group">
                           <label class="control-label">Mobile</label>
                           <input type="number" placeholder="Mobile" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                           <label class="control-label">Address</label><br>
                           <textarea name="address" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                           <label class="control-label">type</label>
                           <input type="text" placeholder="type" class="form-control">
                        </div>
                        <div class="col-md-12 form-group user-form-group">
                           <div class="pull-right">
                              <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                              <button type="submit" class="btn btn-add btn-sm">Save</button>
                           </div>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<!-- Customer Modal2 -->

<!-- /.modal -->
</section>
<!-- /.content -->
</div>
<?php require_once("footer.php"); ?>
<script src="scriptari.js"></script>