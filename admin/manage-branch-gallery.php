<?php require_once("header.php"); ?>
<?php require_once("left-nav.php"); ?>
<style>
    .v-middle {
        vertical-align: middle !important;
    }
</style>
<?php
$DelID = $_GET["DelID"];
if ($DelID != "") {
    //DELETE MORE IMAGES
    $more_images = db_query("select * from tbl_branch_gallery where branch_parent_id='$DelID'");
    while ($data = mysqli_fetch_array($more_images)) {
        $del = "../branch_gallery/" . $data['branch_image_name'];
        @unlink($del);
        db_query("delete from tbl_branch_gallery where id='$data[id]'");
    }

    $imgDel = db_scalar("SELECT branch_image_name FROM tbl_branch_gallery WHERE id='$DelID'");
    $sql = "delete from tbl_branch_gallery where id='$DelID'";
    db_query($sql);
    @unlink("../branch_gallery/$imgDel");
    header("location:manage-branch-gallery.php");
    exit;
}

if (is_post_back()) {
    $arr_ids = $_REQUEST['arr_ids'];
    $Arr_size = sizeof($arr_ids);
    if (is_array($arr_ids)) {
        $str_ids = implode(',', $arr_ids);
        /*if(isset($_REQUEST['Delete']) || isset($_REQUEST['Delete_x']) ) {
db_query("delete from  tbl_branch_gallery where id in ($str_ids)");
}*/

        if (isset($_REQUEST['Delete']) || isset($_REQUEST['Delete_x'])) {


            for ($i = 0; $i < $Arr_size; $i++) {
                $qc_del = db_scalar("select branch_image_name from tbl_branch_gallery where id='$arr_ids[$i]'");
                @unlink("../branch_gallery/$qc_del");
                db_query("delete from tbl_branch_gallery where id='$arr_ids[$i]' ");
            }
        } else if (isset($_REQUEST['Activate']) || isset($_REQUEST['Activate_x'])) {
            $res = db_query("update  tbl_branch_gallery set header_flash_status = 'Active' where id in ($str_ids)");

            if ($res > 0) {
                $_SESSION["msg"] = "Selected gallery image is actived successfully.";
            }
        } else if (isset($_REQUEST['Deactivate']) || isset($_REQUEST['Deactivate_x'])) {
            $res = db_query("update  tbl_branch_gallery set header_flash_status = 'Inactive' where id in ($str_ids)");

            if ($res > 0) {
                $_SESSION["msg"] = "Selected gallery image is deactivated successfully.";
            }
        } else if (isset($_REQUEST['show_in_header']) || isset($_REQUEST['show_in_header_x'])) {
            db_query("update  tbl_branch_gallery set site_pages_show_in_header='Yes' where id in ($str_ids)");
        } else if (isset($_REQUEST['show_in_header_r']) || isset($_REQUEST['show_in_header_r_x'])) {
            db_query("update  tbl_branch_gallery set site_pages_show_in_header='No' where id in ($str_ids)");
        } else if (isset($_REQUEST['show_in_footer']) || isset($_REQUEST['show_in_footer_x'])) {
            db_query("update  tbl_branch_gallery set site_pages_show_in_footer='Yes' where id in ($str_ids)");
        } else if (isset($_REQUEST['show_in_footer_r']) || isset($_REQUEST['show_in_footer_r_x'])) {
            db_query("update  tbl_branch_gallery set site_pages_show_in_footer='No' where id in ($str_ids)");
        }
    }
    if (isset($_REQUEST['Update'])) {
        foreach ($site_pages_order_by as $key => $value) {
            db_query("update tbl_branch_gallery set site_pages_order_by='$value' where id='$key'");
        }
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

$start = intval($start);
$pagesize = intval($pagesize) == 0 ? $pagesize = DEF_PAGE_SIZE : $pagesize;

$sql = "select * from  tbl_branch_gallery where branch_parent_id=0";
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
            <i class="fa fa-picture-o" aria-hidden="true"></i>

        </div>
        <div class="header-title">
            <h1>Branch Gallery</h1>
            <small>Branch Gallery List</small>


            <a href="addedit-branch-gallery.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
                    <span class="btn-label"><i class="fa fa-plus" aria-hidden="true"></i>
                    </span>Add New
                </button></a>


        </div>




    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <?php if ($_SESSION["msg"] != "") { ?>
                <div class="alert alert-success alert-dismissable fade in text-center" style="background-color:#dff0d8;border:none; color:#000;margin:10px 0 0 0">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!&nbsp;&nbsp;&nbsp;</strong> <?= $_SESSION["msg"] ?>.
                </div>
            <?php
                unset($_SESSION["msg"]);
            } ?>

            <div class="col-lg-12">

                <?php if ($pager->total_records > 0) { ?>
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
                                <h4>Branch Gallery List</h4>
                            </a>
                        </div>
                    </div>






                    <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <?php if ($pager->total_records > 0) { ?>
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="info">
                                                <th class="text-center">S.No.</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Branch</th>
                                                <th class="text-center">More Images</th>
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

                                                    <td class="text-center v-middle"><a href="<?= SITE_WS_PATH ?>" target="_blank"><img src="../branch_gallery/<?= $branch_image_name ?>" height="100" width="200" style="border:solid thin #ccc;padding:5px;"></a></td>

                                                    <td class="text-center v-middle"><?= $line_raw["branch_name"] ?></td>

                                                    <td class="v-middle" align="center">
                                                        <a href="branch_image_list.php?branch_id=<?= $line_raw["id"] ?>">
                                                            <button type="button" class="btn btn-labeled btn-pink m-b-5">
                                                                <span class="btn-label"><i class="fa fa-image"></i></span>Upload Images
                                                            </button>
                                                        </a>
                                                    </td>

                                                    <td class="text-center v-middle">
                                                        <a href="addedit-branch-gallery.php?id=<?= $line_raw["id"] ?>"><button type="button" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                                                        </a>


                                                        <a href="manage-branch-gallery.php?DelID=<?= $line_raw["id"] ?>"><button type="button" class="btn 
btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                        </a>


                                                    </td>
                                                    <td class="text-center v-middle"><input name="arr_ids[]" type="checkbox" id="arr_ids[]" value="<?= $id ?>" /></td>

                                                </tr>
                                            <?php
                                            }
                                            ?>

                                            <tr>
                                                <td colspan="7">

                                                    <!--<button type="submit" name="Delete" class="btn btn-success pull-right mr5 label-danger" onClick="return select_chk()">Delete</button>-->

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



<script language="javascript">
    function select_chk() {
        var chks = document.getElementsByName('arr_ids[]');
        var hasChecked = false;
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                hasChecked = true;
                break;
            }
        }
        if (hasChecked == false) {
            alert("Please Select At Least One.");
            return false;
        }
    }
</script>
<?php require_once("footer.php"); ?>