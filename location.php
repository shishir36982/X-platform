<?php
  include 'common.php';
  require 'vendor/autoload.php';

//if latitude and longitude are submitted



if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){

  //Send request and receive json data by latitude and longitude

  $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';

  $json = @file_get_contents($url);

  $data = json_decode($json);

  $status = $data->status;

  if($status=="OK"){

      //Get address from json data

      $location = $data->results[0]->formatted_address;

  }else{

      $location =  '';

  }

  //Print address
$lon=$_POST['longitude'];
$lat = $_POST['latitude'];
  echo $location;
  echo $_POST['latitude'];
  echo $_POST['longitude'];

}



    //send request and receive json data by latitude and longitude


    //if request status is successful




    //return address to ajax





    //Load Composer's autoloader


  $user_id=$_SESSION['id'];
  $select_query2 = "SELECT name,email FROM users where id = '$user_id'";
  $select_query_result2 = mysqli_query($con, $select_query2) or die(mysqli_error($con));
  $row0 = mysqli_fetch_array($select_query_result2);

    $select_query1 = "SELECT name,email FROM users";
    $n = mysqli_query($con, $select_query1) or die(mysqli_error($con));

    	$c = date("Y/m/d");
    $query="SOMEONE NEEDS HELP ,{$row0['name']} {$row0['email']}at {$location} {$lat} {$lon}";
$subject="help";
    $select_query = "INSERT INTO sos (user_id,location, lat,lon, date) VALUES('$user_id','$location' ,'$lat','$lon' ,'$c')";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($n)) {
    $message = "
    NAME:
  {$row['name']}

    email:
    {$row['email']}



       Message:
       $query


     ";
     $em=$row['email'];
         mail($em,$subject,$message);

  }






?>
