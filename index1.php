<?php
include "common.php";
if (isset($_SESSION['email'])) {
header('location: products.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

      
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <style>
            .row_style{
                margin-top:10px;
            }
        </style>
        <title>N</title>
    </head>
    <body>
<?php
        include 'header.php';
        ?><br>

        <div id="banner_image">
           <div class="container">
  <h2>STUDENT UNIVERSE</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/4.png" alt="entertainment" style="width:100%;">
        <div class="carousel-caption">
          <h3>entertainment</h3>
          <p>Student life needs entertainemnt , entertainemnt and entertainemnt</p>
        </div>
      </div>

      <div class="item">
        <img src="img/img-22.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>SHOP</h3>
          <p>DIVE into products for student life</p>
        </div>
      </div>
    
      <div class="item">
        <img src="img/about-img.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>BLOGGING</h3>
          <p>Relive the orld for students with us!!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
        </div>
    <?php
        include 'footer.php';
        ?>
    </body>
</html>