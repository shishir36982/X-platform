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
  $q1=$_POST['q1'];
    $q2=$_POST['q2'];
      $q3=$_POST['q3'];
$select_query = "SELECT name , createdby FROM subcommunities where name='$t' and createdby='$ns'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){

   $user_registration_query = "INSERT INTO subcommunities (name,user_id,createdby,date,custom_ques1,custom_ques2,custom_ques3) VALUES ('$t','$user_id','$ns','$c','$q1','$q2','$q3')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));

echo 'Entry added <a href="subcomm.php?id='.mysqli_insert_id($con).'">View</a>';

}
else {
		echo "already done";

}
}
?>
