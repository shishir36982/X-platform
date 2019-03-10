<?php


include 'common.php';
$c_id=$_GET['id'];

$user_id=$_SESSION['id'];

$select_query = "DELETE FROM user_communities where c_id = '$c_id'";
mysqli_query($con,"UPDATE communities SET user_joined=user_joined-1 WHERE c_id='$c_id' LIMIT 1");

$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
header('location: communities.php?id='.$c_id.'');

?>
