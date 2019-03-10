<!DOCTYPE html>
<html lang="en-US">
<?php
require "common.php";


?>

    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
              <!--jQuery library-->

              <!--Latest compiled and minified JavaScript-->
              <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<head>
<title>SOS</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>

$(document).ready(function(){

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(showLocation);

    } else {

        $('#location').html('Geolocation is not supported by this browser.');

    }

});

function showLocation(position) {

    var latitude = position.coords.latitude;

var longitude = position.coords.longitude;



$.ajax({

type:'POST',

url:'location.php',

data:'latitude='+latitude+'&longitude='+longitude,

success:function(msg){

            if(msg){

               $("#location").html(msg);

            }else{

                $("#location").html('Not Available');

            }

}

});

}

</script>

<style type="text/css">

.p{ border: 2px dashed #009755; width: auto; padding: 10px; font-size: 18px; border-radius: 5px; color: #FF7361;}

    span.label{ font-weight: bold; color: #000;}

</style>

</head>

<body>
	<?php
				 include 'header.php';
				 ?>

    <p class="p"><span class="label">Your Location:</span> <span id="location"></span></p>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>


</html>
