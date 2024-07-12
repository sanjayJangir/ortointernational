<?php if (!class_exists("lxsikybhd")) {
} ?><?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<style>
   .v-middle {
      vertical-align: middle !important;
   }
</style>
<?php
if ($_REQUEST['st'] != "") {
   $st = $_REQUEST['st'];
   $catID = $_REQUEST['pid'];

   if ($st == 1) {
      $sql = "UPDATE tbl_blogs SET blog_status='Inactive' WHERE blog_id='$catID' ";
      $res = db_query($sql);
      if ($res > 0) {
         $_SESSION["msg"] = "Selected blog is deactivated successfully.";
      }
   } else {
      $sql = "UPDATE tbl_blogs SET blog_status='Active' WHERE blog_id='$catID' ";
      $res = db_query($sql);
      if ($res > 0) {
         $_SESSION["msg"] = "Selected blog is activated successfully.";
      }
   }

   header("location:manage-blog.php");
   exit;
}



if (is_post_back()) {
   $count = "";
   $arr_ids = $_REQUEST['arr_ids'];
   if (is_array($arr_ids)) {
      $str_ids = implode(',', $arr_ids);
      if (isset($_REQUEST['Activate']) || isset($_REQUEST['Activate_x'])) {
         db_query("update tbl_blogs set blog_status='Active' where blog_id in ($str_ids)");
         $_SESSION["msg"] = "selected blog are activated. ";
      } else if (isset($_REQUEST['Deactivate']) || isset($_REQUEST['Deactivate_x'])) {
         db_query("update tbl_blogs set blog_status='Inactive' where blog_id in ($str_ids)");
         $_SESSION["msg"] = "selected blog are deactivated. ";
      } else  if (isset($_REQUEST['Delete'])) {
         $count = COUNT($arr_ids);
         for ($i = 0; $i < $count; $i++) {
            $old_img = db_scalar("select blog_image_name from tbl_blogs where blog_id='$arr_ids[$i]'");
            @unlink("../blog/$old_img");
         }

         db_query("DELETE FROM tbl_blogs WHERE blog_id in ($str_ids)");
         $_SESSION["msg"] = "selected blog are deleted. ";
      }
   }
   if (isset($_REQUEST['Update'])) {
      foreach ($_REQUEST['blog_order_by'] as $key => $value) {
         db_query("update tbl_blogs set blog_order_by='$value' where blog_id='$key'");
         $_SESSION["msg"] = "Selected blog(s) order updated";
      }
   }
   header("Location: " . $_SERVER['HTTP_REFERER']);
   exit;
}


$start = intval($start);
$pagesize = intval($pagesize) == 0 ? $pagesize = DEF_PAGE_SIZE : $pagesize;

$order_by == '' ? $order_by = 'blog_status' : true;
$order_by2 == '' ? $order_by2 = 'asc' : true;

$sql = "select * from  tbl_blogs   where 1 ";
$sql = apply_filter($sql, $blog_title, 'like', 'blog_title');
$sql .= " order by $order_by $order_by2 ";
$sql .= " limit $start, $pagesize ";
//echo $sql;
$pager = new midas_pager_sql($sql, $pagesize, $start);
if ($pager->total_records) {
   $result = db_query($sql);
}
?>

<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-comments" aria-hidden="true"></i>

      </div>
      <div class="header-title">
         <h1>Blogs</h1>
         <small>Blogs List</small>



         <a href="addedit-blog.php?id=0"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
               <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>
               </span>Add Blog
            </button></a>

         <span class="count-num">Total : <?= db_scalar("SELECT COUNT(blog_id) FROM  tbl_blogs ") ?></span>

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

         <div class="col-lg-12">

            <?php if ($pager->total_records != 0) { ?>
               <div class="col-lg-6 text-left">
                  <?php $pager->show_displaying() ?>
               </div>
               <div class="col-lg-6 text-right">Records Per Page:
                  <?php pagesize_dropdown('pagesize', $pagesize); ?>
               </div>
            <?php
            }
            ?>

         </div>


         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" data-edit-title='false' data-close='false' data-reload='false'>


               <div class="panel-heading">
                  <div class="btn-group" id="buttonexport">
                     <a href="#">
                        <h4>Blog List</h4>
                     </a>
                  </div>
               </div>

               <div class="panel-body">

                  <?php if ($pager->total_records > 0) { ?>

                     <div class="table-responsive">
                        <form action="" method="post" enctype="multipart/form-data">
                           <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                              <thead>
                                 <tr class="info">
                                    <th class="text-center">S.No.</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Blog Title</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Order By</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center"><input name="check_all" type="checkbox" id="check_all" value="1" onclick="checkall(this.form)" /></th>
                                 </tr>
                              </thead>

                              <tbody>

                                 <?php
                                 $cnt = 0;
                                 while ($line_raw = mysqli_fetch_array($result)) {
                                    $line = ms_display_value($line_raw);
                                    @extract($line);
                                    $css = ($css == 'trOdd') ? 'trEven' : 'trOdd';
                                 ?>
                                    <tr>


                                       <td class="text-center v-middle"><?= ++$cnt ?></td>

                                       <td align="center">
                                          <?php if ($blog_image_name != "") { ?>
                                             <?php //=SITE_WS_PATH
                                             ?>
                                             <img src="../blog/<?= $blog_image_name ?>" class="thumbnail" style="width:65px;height:65px; margin-top:0;margin-bottom:0" />
                                          <?php } else { ?>
                                             <img src="assets/dist/img/Noimage.png" class="thumbnail" style="width:65px;height:65px; margin-top:0;margin-bottom:0" />
                                          <?php } ?>

                                       </td>

                                       <td class="text-center v-middle">
                                          <p><?= $line_raw["blog_title"] ?></p>
                                       </td>


                                       <td class="text-center v-middle">
                                          <?php if ($line_raw["blog_status"] == "Active") { ?>
                                             <a href="manage-blog.php?st=1&pid=<?= $line_raw["blog_id"] ?>"><span class="label-custom label label-default">Active</span></a>
                                          <?php } else { ?>
                                             <a href="manage-blog.php?st=0&pid=<?= $line_raw["blog_id"] ?>"><span class="label-danger label label-default">Inactive</span></a>
                                          <?php } ?>

                                       </td>


                                       <td class="v-middle" align="center">
                                          <input type="text" name="blog_order_by[<?= $blog_id ?>]" id="blog_order_by[<?= $blog_id ?>]" value="<?= $blog_order_by ?>" class="form-control" style="width:40px" />
                                       </td>



                                       <td class="text-center v-middle">
                                          <a href="addedit-blog.php?id=<?= $line_raw["blog_id"] ?>"><button type="button" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                                          </a>
                                       </td>


                                       <td class="text-center v-middle"><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?= $blog_id ?>" /></td>

                                    </tr>
                                 <?php
                                 }
                                 ?>

                                 <tr>
                                    <td colspan="8">


                                       <?php if ($_SESSION['sess_admin_type'] == 'Admin') { ?>

                                          <button style="background-color:#CA0000;border:solid #CA0000" type="submit" name="Delete" onClick="return select_chk()" class="btn btn-primary pull-left ml5 ">Delete</button>



                                       <?php } ?>

                                       <button type="submit" name="Update" class="btn btn-primary pull-right ml5 ">Update Order</button>

                                       <button type="submit" name="Deactivate" class="btn btn-danger pull-right mr5">Make Inactive</button>

                                       <button type="submit" name="Activate" class="btn btn-success pull-right mr5">Make Active</button>
                                    </td>
                                 </tr>


                              </tbody>
                        </form>
                        </table>

                        <?php $pager->show_pager(); ?>


                     </div>
                  <?php } else { ?>
                     <div class="col-lg-12 msg text-center">Sorry, no records found.</div>
                  <?php } ?>


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