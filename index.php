<?php
include "common.php";
if (isset($_SESSION['email'])) {
header('location: index4.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="index0.css" rel="stylesheet" type="text/css"/>

<!------ Include the above in your HEAD tag ---------->
</head>
<?php
include "header.php"
?>
<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
		    <form  class="login-form" method="POST" action="Login_submit.php" >
  <div class="form-group" >
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" name="email" class="form-control" placeholder="">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" name="password" class="form-control" placeholder="">
  </div>


    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button type="submit" class="btn btn-login float-right">Submit</button>
  </div>

</form>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">

    

            </div>

		</div>
	</div>
</div>

<div class="row">

  <div class="col-md-8 banner-sec">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
          <div class="carousel-inner" role="listbox">
  <div class="carousel-item active">
    <img class="d-block img-fluid" src="imgi/addcomm.png" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
      <div class="banner-text">
          <h2>CREATE COMMUNITIES AND SUBCOMMUNITIES</h2>
      </div>
</div>
  </div>
  <div class="carousel-item">
    <img class="d-block img-fluid" src="imgi/communities.png" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
      <div class="banner-text">
          <h2>EXPLORE YOUR COMMUNITY</h2>
      </div>
  </div>
  </div>

          </div>

  </div>
</div>
<div class="col-md-4 login-sec">
    <h2 class="text-center">CREATE AND DISCUSS</h2>
  <p>  <h5 class="text-center">

</div>
</div>
<div class="row">
  <div class="col-md-4 login-sec">
      <h2 class="text-center">CUSTOMIZE communities WITH GREAT FEATURES</h2>

  </div>
  <div class="col-md-8 banner-sec">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
          <div class="carousel-inner" role="listbox">
  <div class="carousel-item active">
    <img class="d-block img-fluid" src="imgi/communities.png" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
      <div class="banner-text">
          <h2>subcommunity,chat room & add thread</h2>
      </div>
</div>
  </div>


          </div>

  </div>
</div>

</div>
<div class="row">

  <div class="col-md-8 banner-sec">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
          <div class="carousel-inner" role="listbox">
  <div class="carousel-item active">
    <img class="d-block img-fluid" src="imgi/users.png" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
      <div class="banner-text">
          <h2>USERS classified into many parameters</h2>
      </div>
</div>
  </div>


          </div>

  </div>
</div>
<div class="col-md-4 login-sec">
    <h2 class="text-center">USERS : CHECK WHAT CREATORS AND USERS ARE LIKE </h2>

</div>
</div>

</div>
</section>







    </body>
</html>
