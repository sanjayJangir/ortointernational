<?php
///////////////////////////// ADMIN/OWNER INFORMATION /////////////////////////////
$sql_comp_detail=db_query("select * from tbl_admin where 1");
 if(mysqli_num_rows($sql_comp_detail)>0){
  $compDATA=mysqli_fetch_array($sql_comp_detail);
}
?>
