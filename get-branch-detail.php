<?php 
include_once 'includes/dbsmain.inc.php';
include_once 'site-main-query.php'; 

$branch_id = $_REQUEST['branch_id'];
$details = db_query("select * from tbl_dealers where category_id='$branch_id' ");
$branch = mysqli_fetch_array($details);
$parent = db_scalar("select category_name from tbl_dealers where category_id='$branch[category_parent_id]'");
$data = array('loc'=>$parent,'address'=>$branch['category_address'],'mobile'=>$branch['category_mobile'],'email'=>$branch['category_email'],'map'=>$branch['category_map']);
echo json_encode($data);
?>
