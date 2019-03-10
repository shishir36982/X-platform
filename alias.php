<?php
if(!empty($_POST)) {
	include 'common.php';

	$t = $_POST['name'];
  $u = $_POST['createdby'];
	$tag1=$_POST['tag1'];
	$tag2=$_POST['tag2'];
	$tag3=$_POST['tag3'];
	$c = date("Y/m/d");
$select_query = "SELECT name , createdby FROM communities where name='$t' and createdby='$u'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){
   $user_registration_query = "INSERT INTO communities (name,createdby,date,tag1,tag2,tag3) VALUES ('$t','$u','$c','$tag1','$tag2','$tag3')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));

header('location: communities.php?id='.mysqli_insert_id($con).'');

}
else {
		echo "already done";

}
}
?>
