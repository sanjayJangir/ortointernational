<?php 
include_once 'includes/dbsmain.inc.php'; ?>
<?php include_once 'site-main-query.php'; ?>
<?php 
date_default_timezone_set("asia/kolkata");
$currDate=date('Y-m-d');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

function sanitize_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($GLOBALS['dbcon'],$data);
  return $data;
}


if(isset($_REQUEST['submit'])){
     $name = $lastname= $email = $phone = $message='';
      $name=sanitize_data($_REQUEST['firstname']).  sanitize_data($_REQUEST['lastname']);
        $email=sanitize_data($_REQUEST['email']);
        $phone=sanitize_data($_REQUEST['phone']);
        $message=sanitize_data($_REQUEST['message']);
 

date_default_timezone_set("asia/kolkata");
$currDate=date('Y-m-d');
$sql = "INSERT INTO tbl_enquiry SET enquiry_name='$name',enquiry_email='$email',enquiry_mobile='$phone',enquiry_address='$message',enquiry_add_date='$currDate'";
        db_query($sql);

if($sql)
{
    echo '<script>alert("Your Enqury submitted")</script>';
    echo "<script>window.location.href='index.php'</script>";
    
$msg="Query Sent. We will contact you shortly";
}
else 
{
     echo '<script>alert("Your Enqury not  submitted")</script>';
$error="Something went wrong. Please try again";
}

}




?>