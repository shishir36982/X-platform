<?php

$con = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($con));
session_start();
$email = $_POST['email'];
$name = $_POST['name'];
$suggest=$_POST['suggest'];
$phone = $_POST['phone'];



   $user_registration_query = "insert into contact(name, email,phone,suggest) values ('$name', '$email', '$phone', '$suggest')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));

header('location: index1.php?suggestion registered');

?>