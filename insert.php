<?php
include "common.php";

require_once __DIR__ . '/vendor/autoload.php';

$myOptions = array('strictness' => 'permissive', 'also_check' => array('foobar','bhenchod','madarchod'));
$filter = new \JCrowe\BadWordFilter\BadWordFilter($myOptions);


$u=$_SESSION['id'];

$s=mysqli_query($con,"select * from users where id='$u'");

$row=mysqli_fetch_assoc($s);

$ns=$row['name'];

$c_id=$_REQUEST['c_id'];

$msg = mysqli_real_escape_string($con,$_REQUEST['msg']);

mysqli_query($con,"INSERT INTO logs (c_id,u_id,username, msg) VALUES ('$c_id','$u','$ns', '$msg')");


$result1 = mysqli_query($con,"SELECT * FROM logs where c_id = '$c_id' ORDER BY id DESC ");


while($extract = mysqli_fetch_array($result1)) {

  $cleanString = $filter->clean($extract['msg']);	
echo "<a href=profile.php?id=$u>" . $extract['username'] . "</a> : <span>" . $cleanString . "</span><br />";

}
