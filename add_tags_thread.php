<?php


include 'common.php';
$user_id=$_SESSION['id'];
$c_id=$_GET['id'];

$tag1=$_POST['tag1'];
$tag2=$_POST['tag2'];
$tag3=$_POST['tag3'];


$select_query = "INSERT INTO tags_thread (user_id, th_id, tag1,tag2,tag3) VALUES('$user_id', '$c_id', '$tag1','$tag2','$tag3')";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
header('location: post_view.php?id='.$c_id.'');

?>
