<?php

//Load Composer's autoloader
require 'vendor/autoload.php';
include 'common.php';
$user_id=$_SESSION['id'];
$c_id=$_GET['id'];
$select_query1 = "SELECT name,email FROM users where id ='$user_id'";
$n = mysqli_query($con, $select_query1) or die(mysqli_error($con));
$row = mysqli_fetch_array($n);
$ns = $row['name'];
$subject="community joined";
$em = $row['email'];
$query="YOU HAVE SUCCESSFULLY JOINED THE COMMUNITY >>>>>>>> ENJOY AND START YOUR GREAT JOURNEY!!";

$select_query = "INSERT INTO user_communities (user_id, c_id, status) VALUES('$user_id', '$c_id', 'added to cart')";
mysqli_query($con,"UPDATE communities SET user_joined=user_joined+1 WHERE c_id='$c_id' LIMIT 1");
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$message="
NAME:
$ns

email:
$em



   Message:
   $query


 ";
  mail($em,$subject,$message);

  header('location: communities.php?id='.$c_id.'');

?>
