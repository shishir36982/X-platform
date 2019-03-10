<?php
if(!empty($_POST)) {
include 'common.php';
$user_id=$_SESSION['id'];
$select_query1 = "SELECT name FROM users where id ='$user_id'";
$n = mysqli_query($con, $select_query1) or die(mysqli_error($con));
$row = mysqli_fetch_array($n);
$ns = $row['name'];
$t=$_POST['name'];
	$c = date("Y/m/d");
$select_query = "SELECT name , createdby FROM communities where name='$t' and createdby='$ns'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){

   $user_registration_query = "INSERT INTO communities (name,user_id,createdby,date) VALUES ('$t','$user_id','$ns','$c')";
	 mysqli_query($con,"UPDATE users SET comm_created=comm_created+1 WHERE id='$user_id' LIMIT 1");
 	mysqli_query($con,"UPDATE users SET rating=rating+5 WHERE id='$user_id' LIMIT 1");
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
header('location: communities.php?id='.mysqli_insert_id($con).'');



}
else {
		echo "already done";

}
}
?>
