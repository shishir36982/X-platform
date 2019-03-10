<?php


include 'common.php';
$user_id=$_SESSION['id'];
$c_id=$_GET['id'];

$tag1=$_POST['tag1'];
$tag2=$_POST['tag2'];
$tag3=$_POST['tag3'];


$select_query = "INSERT INTO comm_tags (user_id, c_id, tag1,tag2,tag3) VALUES('$user_id', '$c_id', '$tag1','$tag2','$tag3')";
$select_query0 = "INSERT INTO user_tags (user_id, tags) VALUES('$user_id', '$tag1')";
$select_query1 = "INSERT INTO user_tags (user_id, tags) VALUES('$user_id', '$tag2')";
$select_query2 = "INSERT INTO user_tags (user_id, tags) VALUES('$user_id', '$tag3')";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$select_query_result0 = mysqli_query($con, $select_query0) or die(mysqli_error($con));
$select_query_result1 = mysqli_query($con, $select_query1) or die(mysqli_error($con));
$select_query_result2 = mysqli_query($con, $select_query2) or die(mysqli_error($con));
echo 'tags added <a href="communities.php?id='.$c_id.'">View</a>';
header('location: communities.php?id='.$c_id.'');

?>
