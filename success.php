<?php
include "common.php";
if (isset($_SESSION['email'])) {
header('location: products.php');
}
$user_id=$_SESSION['id'];
$update_name_query = "UPDATE users_items SET status = 'confirmed' WHERE  status = 'added to cart' and user_id='$user_id'";
$update_name_result = mysqli_query($con, $update_name_query) or die(mysqli_error($con));
header('location: products.php');

?>
