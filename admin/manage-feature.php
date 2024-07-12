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
$product_id = $_REQUEST['product_id'];
$subcatid = $_REQUEST['subcatid'];
$catid = $_REQUEST['catid'];

if (isset($_REQUEST['Delete'])) {
   if (is_array($_REQUEST['arr_ids'])) {
      $str_ids = implode(',', $arr_ids);
      $data = db_query("select * from tbl_features where id in ($str_ids)");
      while ($row = mysqli_fetch_array($data)) {
         $del_img = "../uploaded_files/" . $row['feature_image_name'];
         @unlink($del_img);
         db_query("delete from tbl_features where id='$row[id]'");
      }
   }
   header("Location: manage-feature.php?product_id=$product_id&subcatid=$subcatid&catid=$catid");
   exit;
}


if (is_post_back()) {
   $arr_ids = $_REQUEST['arr_ids'];
   if (is_array($arr_ids)) {
      $str_ids = implode(',', $arr_ids);
      if (isset($_REQUEST['Activate']) || isset($_REQUEST['Activate_x'])) {
         db_query("update tbl_features set category_status='Active' where id in ($str_ids)");
         $_SESSION["msg"] = "selected categories are activated. ";
      } else if (isset($_REQUEST['Deactivate']) || isset($_REQUEST['Deactivate_x'])) {
         db_query("update tbl_features set category_status='Inactive' where id in ($str_ids)");
         $_SESSION["msg"] = "selected categories are deactivated. ";
      } else if (isset($_REQUEST['set_home']) || isset($_REQUEST['set_home_x'])) {
         db_query("update tbl_features set category_for_home='Yes' where id in ($str_ids)");
         $_SESSION["msg"] = "selected categories is set for home. ";
      } else if (isset($_REQUEST['remove_home']) || isset($_REQUEST['remove_home_x'])) {
         db_query("update tbl_features set category_for_home='No' where id in ($str_ids)");
         $_SESSION["msg"] = "selected categories is removed from home. ";
      }
   }

   header("Location: " . $_SERVER['HTTP_REFERER']);
   exit;
}


$start = intval($start);
$pagesize = intval($pagesize) == 0 ? $pagesize = DEF_PAGE_SIZE : $pagesize;

$sql = "select * from  tbl_features where 1 and product_id='$product_id'";
$sql = apply_filter($sql, $name, 'like', 'name');
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
         <h1>Feature</h1>
         <small>Feature List</small>


         <a href="addedit-feature.php?id=<?= 0 ?>&product_id=<?= $product_id ?>&subcatid=<?= $subcatid ?>&catid=<?= $catid ?>"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
               <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>
               </span>Add Feature
            </button></a>

         <a href="product_list.php?subcatid=<?= $subcatid ?>&catid=<?= $catid ?>" class="btn btn-link" style="float: right;
    font-size: 14px;
    margin: -18px 18px 0 0;
    border: solid thin #337ab785;"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            Go Back</a>

         <span class="count-num">Total : <?= db_scalar("SELECT COUNT(id) FROM tbl_features WHERE 1 AND product_id='$product_id'") ?></span>

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
                  <?= pagesize_dropdown('pagesize', $pagesize); ?>
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
                        <h4>Feature List</h4>
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
                                    <th class="text-center">Name</th>
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

                                          <?php if ($feature_image_name != "") { ?>
                                             <img src="../uploaded_files/<?= $feature_image_name ?>" class="thumbnail" style="width:65px;height:65px; margin-top:0;margin-bottom:0" />
                                          <?php } else { ?>
                                             <img src="assets/dist/img/Noimage.png" class="thumbnail" style="width:65px;height:65px; margin-top:0;margin-bottom:0" />
                                          <?php } ?>
                                       </td>

                                       <td class="text-center v-middle">
                                          <?= $line_raw["name"] ?>
                                       </td>


                                       <td class="text-center v-middle">
                                          <a href="addedit-feature.php?id=<?= $line_raw["id"] ?>&product_id=<?= $product_id ?>&subcatid=<?= $subcatid ?>&catid=<?= $catid ?>"><button type="button" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                                          </a>
                                       </td>


                                       <td class="text-center v-middle"><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?= $id ?>" /></td>

                                    </tr>
                                 <?php
                                 }
                                 ?>

                                 <tr>
                                    <td colspan="8">


                                       <?php if ($_SESSION['sess_admin_type'] == 'Admin') { ?>

                                          <button style="background-color:#CA0000;border:none" type="submit" name="Delete" onClick="return select_chk()" class="btn btn-primary pull-left ml5 ">Delete</button>
                                       <?php } ?>



                                       <!-- <button type="submit" name="set_home" class="btn btn-default pull-left mr5 ml10" >Set For Home</button>

<button type="submit" name="remove_home"  class="btn btn-black pull-left mr5" >Remove From Home</button> -->


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