<?php 
include_once 'includes/dbsmain.inc.php'; ?>
<?php include_once 'site-main-query.php'; ?>
<?php 
date_default_timezone_set("asia/kolkata");
$currDate=date('Y-m-d');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<?php 
function sanitize_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($GLOBALS['dbcon'],$data);
  return $data;
}

    if(isset($_REQUEST['submit'])){
     $name = $email = $mobile = $source = $msg = $subject = $tr = '';
    

        $name=sanitize_data($_REQUEST['name']);
        $email=sanitize_data($_REQUEST['email']);
        $mobile=sanitize_data($_REQUEST['phone']);
        $msg=sanitize_data($_REQUEST['message']);
        //$current_url=$_REQUEST['current_url'];
        //$source=$_REQUEST['source'];
        
if(!empty($name) && !empty($email) && !empty($mobile) && !empty($msg)){

        $sql = "INSERT INTO tbl_enquiry SET enquiry_name='$name',enquiry_email='$email',enquiry_mobile='$mobile',enquiry_add_date='$currDate'";
        db_query($sql);


       ///////////////****** Mailer to client start here **********************//////////////
$hostName = $_SERVER['HTTP_HOST'];            
$msgmail="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title>$compDATA[admin_company_name]</title>
 </head>
<body>      
   <table align='center' cellSpacing='0' cellPadding='0' width='87%' border='1' style='border:1px solid #e61938'>
  <tbody>
    <tr>
      <td vAlign='top' style='background-color:#e61938; padding:10px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#ffffff; text-align:center; font-weight:bold;' colspan='3' >Enquiry From $hostName</td>
    </tr>
     <tr>
      <td width='30%' vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Name </strong> </td>
      <td vAlign='top' width='70%' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$name</td>
    </tr>    
    <tr>
      <td vAlign='top'  style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Email-Id </strong> </td>
      <td vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$email</td>
    </tr>    
   
      <tr>
      <td vAlign='top'  style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Mobile No </strong> </td>
      <td vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$mobile</td>
    </tr> 
  
   <tr>
      <td vAlign='top'  style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Source </strong> </td>
      <td vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$source</td>
    </tr>

    <tr>
      <td vAlign='top'  style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#003366; background-color:#F9E2DD;padding:10px;' ><strong>Detail </strong> </td>
      <td vAlign='top' style='font-family:Verdana, Arial, Helvetica, sans-serif;padding:10px;'>$msg</td>
    </tr>    
  </tbody>
</table>
</body>
</html>";

$toEmail = $compDATA['admin_email'];
$subject = "Enquiry from $hostName";
        $from=$compDATA['admin_email'];
        $Headers1 = "From: $name<$from>\n";
        $Headers1 .= "X-Mailer: PHP/". phpversion();
        $Headers1 .= "X-Priority: 3 \n";
        $Headers1 .= "MIME-version: 1.0\n";
        $Headers1 .= "Content-Type: text/html; charset=iso-8859-1\n"; 
        
if($email){
@mail("$toEmail", "$subject", "$msgmail","$Headers1");
 ?>
<script type="text/javascript">
    alert("Form Submitted successfully, we will contact you soon!");
    window.location.href='<?=$current_url?>';
    
</script>
 <?php
}

}else{?>
    <script type="text/javascript">
    alert("Please fill all the fields!");
    window.location.href='<?=$current_url?>';
    
</script>
<?php }
}     

?>