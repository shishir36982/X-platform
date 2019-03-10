<?php
function check_joined($c_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];
    $select_query = "SELECT * FROM user_communities WHERE c_id='$c_id' AND user_id ='$user_id' and status='added to cart'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched >= 1){
    return 1;
}
else{
    return 0;
}
}
function check_followed($c_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];
    $select_query = "SELECT * FROM user_thread WHERE th_id='$c_id' AND user_id ='$user_id' and status='added to cart'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched >= 1){
    return 1;
}
else{
    return 0;
}
}
function check_tags_added($c_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];

      $select_query = "SELECT * FROM comm_tags WHERE c_id='$c_id'    ";
      $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);


if($total_rows_fetched >= 1 ){
    return 1;
}
else{
    return 0;
}
}
function check_tags_added_thread($c_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];

    $select_query = "SELECT * FROM tags_thread WHERE th_id='$c_id'   ";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

//$total_rows_fetched = mysqli_num_rows($select_query_result);
$total_rows_fetched = mysqli_num_rows($select_query_result);

if(($total_rows_fetched >= 1) ){
    return 1;
}
else{
    return 0;
}
}
function check_question($c_id,$th_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];

    $select_query = "SELECT * FROM questions WHERE q_id='$c_id' and th_id= '$th_id'  ";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$as = mysqli_fetch_array($select_query_result);

//$total_rows_fetched = mysqli_num_rows($select_query_result);
$total_rows_fetched = mysqli_num_rows($select_query_result);

if($as == $_SESSION['id'] ){
    return 1;
}
else{
    return 0;
}
}
function check_replies($c_id,$th_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];

    $select_query = "SELECT * FROM replies WHERE r_id='$c_id' and th_id= '$th_id'  ";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$as = mysqli_fetch_array($select_query_result);

//$total_rows_fetched = mysqli_num_rows($select_query_result);
$total_rows_fetched = mysqli_num_rows($select_query_result);

if($as == $_SESSION['id'] ){
    return 1;
}
else{
    return 0;
}
}
function check_suggest($c_id,$th_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];

    $select_query = "SELECT * FROM suggest WHERE s_id='$c_id' and th_id= '$th_id'  ";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$as = mysqli_fetch_array($select_query_result);

//$total_rows_fetched = mysqli_num_rows($select_query_result);
$total_rows_fetched = mysqli_num_rows($select_query_result);

if($as == $_SESSION['id'] ){
    return 1;
}
else{
    return 0;
}
}
function check_joined_sub($c_id){
$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
  $user_id=$_SESSION['id'];
    $select_query = "SELECT * FROM user_subcommunities WHERE sc_id='$c_id' AND user_id ='$user_id' and status='added to cart'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched >= 1){
    return 1;
}
else{
    return 0;
}
}
?>
