<?php require_once("header.php");?>
<?php require_once("left-nav.php");?>
<?php
if(isset($_POST['ContactUpdate'])){
    

if(is_uploaded_file($_FILES['favicon']['tmp_name'])){
   if(preg_match("/\.(gif|png|jpg|jpeg)$/",$_FILES['favicon']['name']) ){
    $old_file=db_scalar("select admin_favicon from tbl_admin where admin_user_type='Admin'");
   @unlink("../$old_file");
   $favicon=$_FILES['favicon']['name'];
   $temp3=$_FILES['favicon']['tmp_name'];
   $cur3="../".$favicon;
   move_uploaded_file($temp3,$cur3);
     db_query("update tbl_admin set admin_favicon='$favicon' where admin_user_type='Admin'");
   }else{?>
<script>alert("Please upload correct image");</script>
<?php    
}
}

@extract($_POST);
	$sql="update tbl_admin set 
	             admin_company_name='$admin_company_name',
	             admin_name='$admin_name',
	             admin_email='$admin_email',
	             admin_alt_email='$admin_alt_email',
	             admin_mobile='$admin_mobile',
				 admin_phone='$admin_phone',
				 admin_fax='$admin_fax',
         admin_canonical_link='$admin_canonical_link',
				 admin_address='$admin_address',
				 admin_city='$admin_city',
				 admin_state='$admin_state',
				 admin_country='$admin_country',
				 admin_zip_code='$admin_zip_code',
         admin_time='$_REQUEST[admin_time]',
				 admin_website_url='$admin_website_url'
				 where admin_user_type='Admin'";
				 
	db_query($sql);
	             $_SESSION['msg']="Contact details updated successfully !";
				/* header("location:contact_update.php");
				 exit;*/
              }
			  
 $sql="select * from tbl_admin where admin_user_type='Admin'";
 $result2=db_query($sql);
 $data_new=mysqli_fetch_array($result2);
?>


         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-gears"></i>
               </div>
               <div class="header-title">
                  <h1>General Settings</h1>
                  <small>General Settings</small>
               </div>
               
               
               


            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                  
                  <?php if($_SESSION["msg"]!=""){?>     
                      
<div class="alert alert-success alert-dismissable fade in text-center" style="background-color:#dff0d8;border:none; color:#000;margin:10px 0 10px 0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!&nbsp;&nbsp;&nbsp;</strong> <?=$_SESSION["msg"]?>.
  </div>
<?php 
unset($_SESSION["msg"]);
}?> 

<div class="panel panel-bd lobidrag" data-edit-title='false' data-close='false' data-reload='false'>
<div class="panel-heading">
<div class="btn-group" id="buttonexport">
<a href="#">
<h4>General Settings</h4>
</a>
</div>
</div>
<div class="panel-body">
<form class="col-sm-12" enctype="multipart/form-data" method="post">

<div class="form-group col-lg-4">
<label>Company Name</label>
<input type="text" class="form-control" placeholder="Enter company name" value="<?=$data_new['admin_company_name']?>" name="admin_company_name" id="admin_company_name">
</div>


<div class="form-group col-lg-4">
<label>Contact Name</label>
<input type="text" class="form-control" placeholder="Enter your name" name="admin_name" id="admin_name" value="<?=$data_new['admin_name']?>">
</div>


<div class="form-group col-lg-4">
<label>Email Id</label>
<input type="text" class="form-control" placeholder="Enter email address" name="admin_email" id="admin_email" value="<?=$data_new['admin_email']?>">
</div>


<div class="form-group col-lg-4">
<label>Alternate Email Id</label>
<input type="text" class="form-control" placeholder="Enter alternate email address" name="admin_alt_email" id="admin_alt_email" value="<?=$data_new['admin_alt_email']?>">
</div>
                              
                              
<div class="form-group col-lg-4">
<label>Mobile</label>
<input type="text" class="form-control" placeholder="Enter mobile number" name="admin_mobile" id="admin_mobile" value="<?=$data_new['admin_mobile']?>">
</div>


<div class="form-group col-lg-4">
<label>Phone</label>
<input type="text" class="form-control" placeholder="Enter phone number" name="admin_phone" id="admin_phone" value="<?=$data_new['admin_phone']?>">
</div>
                              
<div class="form-group col-lg-4">
<label>Fax</label>
<input type="text" class="form-control" placeholder="Enter fax number" name="admin_fax" id="admin_fax" value="<?=$data_new['admin_fax']?>">
</div>
                              
   
<div class="form-group col-lg-4">
<label>City</label>
<input type="text" class="form-control" placeholder="Enter your city name" name="admin_city" id="admin_city" value="<?=$data_new['admin_city']?>">
</div>


<div class="form-group col-lg-4">
<label>State</label>
<input type="text" class="form-control" placeholder="Enter your state name" name="admin_state" id="admin_state" value="<?=$data_new['admin_state']?>">
</div>


<div class="form-group col-lg-4">
<label>Country</label>
<input type="text" class="form-control" placeholder="Enter your country name" name="admin_country" id="admin_country" value="<?=$data_new['admin_country']?>">
</div>
                              
                              
<div class="form-group col-lg-4">
<label>Zip Code</label>
<input type="text" class="form-control" placeholder="Enter your zip code" name="admin_zip_code" id="admin_zip_code" value="<?=$data_new['admin_zip_code']?>" >
</div>


<div class="form-group col-lg-4">
<label>Website URL <a href="#" data-toggle="tooltip" title="i.e. : http://www.abc.com"><i class="fa fa-question-circle"></i></a></label>
<input type="text" class="form-control" placeholder="Enter your website url" name="admin_website_url" value="<?=$data_new['admin_website_url']?>" id="admin_website_url">
</div>

<div class="form-group col-lg-4">
<label>Upload Favicon</label>
<input type="file" class="form-control" name="favicon" id="favicon">
</div>

<div class="form-group col-lg-4">
<?php 
if(!empty($data_new['admin_favicon'])){?>
<img src="../<?=$data_new['admin_favicon']?>" class="thumbnail" style="width:65px;height:65px; margin-top:0;margin-bottom:0" />
<?php }else{?>
<img src="assets/dist/img/Noimage.png" class="thumbnail" style="width:65px;height:65px; margin-top:0;margin-bottom:0" />
<?php }?>
</div>


<div class="form-group col-lg-4">
<label>Canonical Link</label>
<input type="text" class="form-control" name="admin_canonical_link" id="admin_canonical_link" value="<?=$data_new['admin_canonical_link']?>" placeholder="Enter Canonical Link">
</div>
                              
<div class="form-group col-lg-4">
  <label>Timing</label>
<input type="text" class="form-control" name="admin_time" id="admin_time" value="<?=$data_new['admin_time']?>" placeholder="Enter Time">
</div>                                                        

<div class="form-group col-lg-12">
 <label>Address</label>
 <textarea class="form-control" placeholder="Enter your address" name="admin_address" id="admin_address"><?=$data_new['admin_address']?></textarea>
 
<a href="google-map.php?admin=<?=$data_new['admin_id']?>&view=yes"  target="_blank" class="btn btn-link pull-right"><i class="fa fa-eye"></i> View Google Map</a>

<a href="google-map.php?admin=<?=$data_new['admin_id']?>"  target="_blank" class="btn btn-link pull-right"><i class="fa fa-plus"></i> Add Google Map</a> 

<!-- <br>
<a href="#" onclick="window.open('multiple_address.php','mywindow','width=900,height=500');">Multiple Address?</a>  -->                                
</div>

                              
                              
                              
                              <div class="col-lg-12 reset-button text-center" >
                              <button type="submit" name="ContactUpdate"  class="btn btn-add">Save</button>
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
<script type="text/javascript">
function nospaces(t){
if(t.value.match(/\s/g)){
alert('Sorry, you are not allowed to enter any spaces');
t.value=t.value.replace(/\s/g,'');
}
}
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>