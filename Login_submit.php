<?php


//Load Composer's autoloader
require 'vendor/autoload.php';
require 'common.php';
$query="you have successfully logged in XPLATFORM -A ML _based discussion platform...Enjoy!!!";
$email = $_POST['email'];
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
  header('location: index.php?email_error=enter correct email');
}
$password = $_POST['password'];
if (strlen($password) < 6) {
  header('location: index.php?password_error=enter correct password');
}
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);
$select_query = "SELECT id , email FROM users where email='$email' and password='$password'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

if(mysqli_num_rows($select_query_result) == 0){
    header('location: signup.php?password_error=no user registered');
}
else {
    $row = mysqli_fetch_array($select_query_result);

    $_SESSION['email'] = $email;
$_SESSION['id'] =$row['id'];

  header('location: index4.php');

}
?>
