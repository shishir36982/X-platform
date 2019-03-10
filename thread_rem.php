<?php


include 'common.php';
$c_id=$_GET['id'];

$user_id=$_SESSION['id'];

$select_query = "DELETE FROM user_thread where th_id = '$c_id'";
mysqli_query($con,"UPDATE threads SET user_joined=user_joined-1 WHERE th_id='$c_id' LIMIT 1");

$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
echo 'unjoined community <a href="post_view.php?id='.$c_id.'">View</a>';
?>
