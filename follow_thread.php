<?php


include 'common.php';
$user_id=$_SESSION['id'];
$c_id=$_GET['id'];


$select_query = "INSERT INTO user_thread (user_id, th_id, status) VALUES('$user_id', '$c_id', 'added to cart')";
mysqli_query($con,"UPDATE threads SET user_joined=user_joined+1 WHERE th_id='$c_id' LIMIT 1");
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
echo 'community joined <a href="post_view.php?id='.$c_id.'">View</a>';
?>
