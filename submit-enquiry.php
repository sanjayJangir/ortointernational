<?php
    require_once "inc/con.php";
 
    $name = mysqli_real_escape_string($conn, $_POST['firstName'] . " " . $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
     $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
 
 
    if(mysqli_query($conn, "INSERT INTO tbl_enquiry(enquiry_name,enquiry_email,enquiry_mobile,enquiry_address) VALUES('$name', '$email','$phone', '$message')")) {
     echo 'data insert successfully';
    } else {
       echo "Error: " . $sql . "" . mysqli_error($conn);
    }
 
    mysqli_close($conn);
    
  
 
?>