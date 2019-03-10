<?php
include "common.php";
if (isset($_SESSION['email'])) {
header('location: products.php');
}
$password= $_GET['old_password'];
$passwords=$_GET['passwords'];
if($password==$passwords){
$new_password = $_GET['new_password'];
$user_id = $_SESSION['email'];
$update_name_query = "UPDATE users SET password = '$new_password' WHERE email = '$user_id'";
$update_name_result = mysqli_query($con, $update_name_query) or die(mysqli_error($con));
echo "password updated";
}
else{
    header('location: settings.php?password_error=password not match');
}
?>
    