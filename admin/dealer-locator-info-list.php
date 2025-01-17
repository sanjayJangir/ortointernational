<?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<style>
   .v-middle {
      vertical-align: middle !important;
   }

   span.home-lbl {
      background: #FFEB3B;
      padding: 1px 15px 1px 15px;
      font-size: 11px;
      font-weight: 600;
      color: red;
      border: solid thin #f0df4d;
      position: relative;
      top: 5px;
   }
</style>
<?php
$catID = $_REQUEST['catID'];
?>
<?php
if ($_REQUEST['st'] != "") {
   $st = $_REQUEST['st'];
   $subcatID = $_REQUEST['pid'];

   if ($st == 1) {
      $sql = "UPDATE tbl_dealers SET category_status='Inactive' WHERE category_id='$subcatID' ";
      $res = db_query($sql);
      if ($res > 0) {
         $_SESSION["msg"] = "Selected dealer is deactivated successfully.";
      }
   } else {
      $sql = "UPDATE tbl_dealers SET category_status='Active' WHERE category_id='$subcatID' ";
      $res = db_query($sql);
      if ($res > 0) {
         $_SESSION["msg"] = "Selected dealer is activated successfully.";
      }
   }

   header("location:dealer-locator-info-list.php?catID=$catID");
   exit;
}



if (is_post_back()) {
   $arr_ids = $_REQUEST['arr_ids'];
   if (is_array($arr_ids)) {
      $str_ids = implode(',', $arr_ids);
      if (isset($_REQUEST['Activate']) || isset($_REQUEST['Activate_x'])) {
         db_query("update tbl_dealers set category_status='Active' where category_id in ($str_ids)");
         $_SESSION["msg"] = "Selected dealers are activated. ";
      } else if (isset($_REQUEST['Deactivate']) || isset($_REQUEST['Deactivate_x'])) {
         db_query("update tbl_dealers set category_status='Inactive' where category_id in ($str_ids)");
         $_SESSION["msg"] = "Selected dealers are deactivated. ";
      } else if (isset($_REQUEST['Delete']) || isset($_REQUEST['Delete_x'])) {
         $data = db_query("select * from tbl_dealers where category_id in ($str_ids)");
         while ($row = mysqli_fetch_array($data)) {
            @unlink("../dealer/$row[category_image_name]");
            db_query("delete from tbl_dealers where category_id='$row[category_id]'");
         }
         $_SESSION["msg"] = "Selected dealers is deleted. ";
      }
   }
   if (isset($_REQUEST['Update'])) {
      foreach ($_REQUEST['category_order_by'] as $key => $value) {
         db_query("update tbl_dealers set category_order_by='$value' where category_id='$key'");
      }
      $_SESSION["msg"] = "Selected dealer order is set.";
   }
   header("Location: " . $_SERVER['HTTP_REFERER']);
   exit;
}


$start = intval($start);
$pagesize = intval($pagesize) == 0 ? $pagesize = DEF_PAGE_SIZE : $pagesize;

$order_by == '' ? $order_by = 'category_status' : true;
$order_by2 == '' ? $order_by2 = 'asc' : true;

$sql = "select * from  tbl_dealers where 1 AND category_parent_id='$catID'";
$sql = apply_filter($sql, $category_name, 'like', 'category_name');
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
         <i class="fa fa-list" aria-hidden="true"></i>

      </div>
      <div class="header-title">
         <h1>Dealer</h1>
         <small>Dealer List</small>

         <a href="dealer-locator-list.php?catID=<?= $subCatID ?>"><button id="btn-go-back" type="button" class="btn btn-labeled btn-info m-b-5" style="float: right;"><span class="btn-label">
                  <i class="fa fa-chevron-circle-left"></i></span>Go Back</button></a>


         <a href="addedit-dealer-locator-info.php?id=0&subCatID=<?= $catID ?>"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
               <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>
               </span>Add Dealer
            </button></a>

         <span class="count-num">Total : <?= db_scalar("SELECT COUNT(category_id) FROM tbl_dealers WHERE 1 AND category_parent_id='$catID'") ?></span>

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
                        <h4>District List <i class="fa fa-angle-double-right"></i>

                           <span style="margin-left:5px; font-size:16px;color:#8e32a2c7"><?= db_scalar("SELECT category_name FROM tbl_dealers WHERE 1 AND category_id='$catID'") ?></span>

                        </h4>
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Mobile No</th>
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


                                       <td class="text-center v-middle"><?= $line_raw["category_name"] ?></td>

                                       <td class="text-center v-middle"><?= $line_raw['category_email'] ?></td>

                                       <td class="text-center v-middle"><?= $line_raw['category_mobile'] ?></td>

                                       <td class="text-center v-middle">
                                          <?php if ($line_raw["category_status"] == "Active") { ?>
                                             <a href="dealer-locator-info-list.php?st=1&pid=<?= $line_raw["category_id"] ?>&catID=<?= $catID ?>"><span class="label-custom label label-default">Active</span></a>
                                          <?php } else { ?>
                                             <a href="dealer-locator-info-list.php?st=0&pid=<?= $line_raw["category_id"] ?>&catID=<?= $catID ?>"><span class="label-danger label label-default">Inactive</span></a>
                                          <?php } ?>

                                       </td>


                                       <td class="v-middle" align="center">
                                          <input type="text" name="category_order_by[<?= $category_id ?>]" id="category_order_by[<?= $category_id ?>]" value="<?= $category_order_by ?>" class="form-control" style="width:40px" />
                                       </td>



                                       <td class="text-center v-middle">
                                          <a href="addedit-dealer-locator-info.php?id=<?= $line_raw["category_id"] ?>&subCatID=<?= $catID ?>"><button type="button" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                                          </a>
                                       </td>


                                       <td class="text-center v-middle"><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?= $category_id ?>" /></td>

                                    </tr>
                                 <?php
                                 }
                                 ?>

                                 <tr>
                                    <td colspan="8">


                                       <?php if ($_SESSION['sess_admin_type'] == 'Admin') { ?>

                                          <button style="background-color:#CA0000;border:none" type="submit" name="Delete" onClick="return select_chk()" class="btn btn-primary pull-left ml5 ">Delete</button>



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

      <!-- /.modal -->
      <!-- Modal -->
      <!-- Customer Modal2 -->

      <!-- /.modal -->
   </section>
   <!-- /.content -->
</div>
<?php require_once("footer.php"); ?>