<?php
include 'common.php';
$user_id=$_SESSION['id'];
$select_query1 = "SELECT name,email FROM users where id ='$user_id'";
$n = mysqli_query($con, $select_query1) or die(mysqli_error($con));
$row = mysqli_fetch_array($n);
$ns = $row['name'];
$em = $row['email'];
$expire = time()+60*60*24*30;
setcookie('name', $ns, $expire, '/');
setcookie('email', $em, $expire, '/');


$a=$_GET['id'];

$d= $_POST['suggest'];
$e = date("Y/m/d");




mysqli_query($con,"INSERT INTO suggest (th_id,user_id,name,email,content,date) VALUES ('$a','$user_id', '$ns', '$em', '$d', '$e')");


	echo 'Entry posted <a href="post_view.php?id='.$a.'">View</a>';?>
