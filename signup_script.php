<?php


//Load Composer's autoloader
require 'vendor/autoload.php';

$con = mysqli_connect("localhost", "id7919418_shi", "123456", "id7919418_xplatform") or die(mysqli_error($con));
session_start();

$email = $_POST['email'];
$name = $_POST['name'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$profession = $_POST['profession'];
$tag1 = $_POST['tag1'];
$tag2 = $_POST['tag2'];
$tag3 = $_POST['tag3'];
$password = $_POST['password'];
$subject = "XPLATFORM";
$query = "you are registered! explore the world of ml powered discussion platform";
$address=$_POST['country'];
$defaultimage="default.jpg";
$select_query = "SELECT id, email FROM users where email='$email' and password='$password'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$msg="{$name} ,you are registered on X-platform";
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){
	$user_registration_query = "insert into users(name, email,password, contact, age,country,profession,tag1,tag2,tag3,imagepath) values ('$name', '$email','$password', '$phone', '$age', '$address','$profession','$tag1','$tag2','$tag3','$defaultimage')";
	$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
mail($email,"x-platform registered",$msg);
    if(isset($_FILES["file"])){
		$_SESSION['id'] = mysqli_insert_id($con);


			$value = $_SESSION['id'];
			$file = $_FILES['file'];
			$fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

			$fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($fileActualExt, $allowed)){

                if($fileError === 0){
                    if($fileSize < 1000000){
						                $filenamenew=$value.".".$fileActualExt;					
                            $fileDestination = 'profilepictures/'.$filenamenew;
                            if (move_uploaded_file($fileTmpName, $fileDestination)){

						  $sql = "UPDATE users SET imagepath = '$filenamenew' WHERE id = '$value';";
							$submitsql = mysqli_query($con, $sql) or die(mysqli_error($con));


						}


					}
				}
            }


	}
	$_SESSION['email'] = $email;
	$_SESSION['id'] = mysqli_insert_id($con);
	header('location: index4.php');

}else {
header('location: index.php?email_error=already registered');
}
?>
