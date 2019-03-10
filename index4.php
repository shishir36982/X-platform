<?php
include "common.php";
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Regression\SVR;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\Classification\NaiveBayes;
use Phpml\SupportVectorMachine\Kernel;
$user_id=$_SESSION['id'] ;
if (!isset($_SESSION['email'])) {
header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <!--Latest compiled and minified JavaScript-->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .row_style{
            margin-top:10px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOme</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link href="index.css" rel="stylesheet" type="text/css"/>
    <link href="css/blog-home.css" rel="stylesheet">
	   <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

<!-- Navigation -->
<?php include 'header.php'?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Xplatform-experimental</h1>
              <span class="subheading"></span>
          </div>
        </div>
      </div>
    </header>
    <?php
        $user_id = $_SESSION['id'];
        $samples0=array(array());
        $targets0=array();
    $result1 = mysqli_query($con,"select * from user_thread");
     $result3 = mysqli_query($con,"SELECT * FROM threads , users,tags_thread where  users.id='$user_id' and tags_thread.tag1 = users.tag1 or tags_thread.tag2 = users.tag2 or tags_thread.tag3 = users.tag3   ORDER BY date DESC ");
    $i=0;

    while($row = mysqli_fetch_assoc($result1)) {

    $samples0[$i][0] = $row['user_id'];


    $targets0[$i] = $row['th_id'];


    $i = $i + 1;


    }

    $classifier = new NaiveBayes();
$classifier->train($samples0, $targets0);
    $pred0=$classifier->predict([$user_id]) ;
    $result9 = mysqli_query($con,"SELECT * FROM threads where th_id='$pred0 'ORDER BY date DESc");
$row9=mysqli_fetch_assoc($result9);
    ?>
    <div class="container">

      <div class="row">

        <div class="col-md-4">
          <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header"><h3>THREAD TO FOLLOW</h3></div>
            <div class="card-body">
              <h2 class="card-title"><?php echo '<h5>'.$row9['title'].'</h5>';?></h2>
            </div>
            <?php echo '<a href="post_view.php?id='.$row9['th_id'].'" class="btn btn-primary">Read More</a> | ';
       ?>
          </div>
          <h3 class="my-4">FROM COMMUNITIES YOU JOINED
            <small></small>
          </h3>

          <?php


         $result = mysqli_query($con,"SELECT * FROM threads , user_communities where user_communities.user_id='$user_id' and threads.c_id = user_communities.c_id ORDER BY date DESc limit 5");

         if(!mysqli_num_rows($result)) {
         echo 'No posts yet.';
         } else {
         while($row = mysqli_fetch_assoc($result)) {?>
          <div class="card mb-4">
             <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
             <div class="card-body">
               <h2 class="card-title"><?php echo '<h2>'.$row['title'].'</h2>';?></h2>
               <p class="card-text"><?php 	$body = substr($row['body'], 0, 300);
         echo nl2br($body).'...<br/>';?></p>


              <?php echo '<a href="post_view.php?id='.$row['th_id'].'" class="btn btn-primary">Read More</a> | ';
         ?>
            </div>
            <div class="card-footer text-muted">




            </div>
          </div>

<?php
}}

$result1 = mysqli_query($con,"select * from user_thread");
 $result3 = mysqli_query($con,"SELECT * FROM threads , users,tags_thread where  users.id='$user_id' and tags_thread.tag1 = users.tag1 or tags_thread.tag2 = users.tag2 or tags_thread.tag3 = users.tag3   ORDER BY date DESC ");
$i=0;

while($row = mysqli_fetch_assoc($result1)) {

$samples0[$i][0] = $row['user_id'];


$targets0[$i] = $row['th_id'];


$i = $i + 1;


}

$classifier = new NaiveBayes;
$classifier->train($samples0, $targets0);
$pred5=$classifier->predict([$user_id]) ;
$c=date("y/m/d");
$result5 = mysqli_query($con,"SELECT * FROM threads where th_id='$pred5' and date='$c' ORDER BY date DESc");
$row5=mysqli_fetch_assoc($result5);
?>
</div>
<div class="col-md-4">
  <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
    <div class="card-header"><h5>THREAD TO FOLLOW</h5></div>
    <div class="card-header"><h6>TRENDING TODAY</h6></div>
    <div class="card-body">
      <h2 class="card-title"><?php echo '<h2>'.$row5['title'].'</h2>';?></h2>
    </div>
    <?php echo '<a href="post_view.php?id='.$row5['th_id'].'" class="btn btn-secondary">Read More</a> | ';
?>
  </div>

  <h3 >threads YOU FOLLOW
    <small></small>
  </h3>

  <?php


 $result = mysqli_query($con,"SELECT * FROM threads , user_thread where user_thread.user_id='$user_id' and threads.th_id = user_thread.th_id ORDER BY date DESC limit 5");

 if(!mysqli_num_rows($result)) {
 echo 'No posts yet.';
 } else {
 while($row = mysqli_fetch_assoc($result)) {?>
  <div class="card mb-4">
     <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
     <div class="card-body">
       <h2 class="card-title"><?php echo '<h2>'.$row['title'].'</h2>';?></h2>
       <p class="card-text"><?php 	$body = substr($row['body'], 0, 200);
 echo nl2br($body).'...<br/>';?></p>


      <?php echo '<a href="post_view.php?id='.$row['th_id'].'" class="btn btn-primary">Read More</a> | ';
 ?>
    </div>
    <div class="card-footer text-muted">




    </div>
  </div>

<?php
}}?>
</div>
<script>
        $(document).ready(function() {

            $('input.search').typeahead({
                name: 'search',
                remote: 'search_suggest.php?query=%QUERY'

            });

        })
    </script>
<div class="col-md-4">
  <a href="index3.php" type="button" class="btn btn-SUCCESS" style="width:100%">ADD community</a> <br><br>
<a href="communities.php?id=1" type="button" class="btn btn-danger" style="width:100%">SOS community</a>

  <div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
       <form method="POST" action="search.php">
      <div class="input-group">
        <input type="text" name="search" class="form-control"  class="search"  placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
      </form>
      </div>
    </div>
  </div>
<?php
$result8 = mysqli_query($con,"SELECT * FROM communities  ORDER BY user_joined DESc limit 5");
?>
 <div class="card my-4">
    <h5 class="card-header">Top Communities</h5>
    <div class="card-body">
  <?php  while($row8=mysqli_fetch_assoc($result8)){?>
      <div class="card">

         <div class="card-body">
           <h2 class="card-title"><?php echo '<h2>'.$row8['name'].'</h2>';?></h2>



          <?php echo '<a href="communities.php?id='.$row8['c_id'].'" class="btn btn-primary">Read More</a>  ';
     ?>
        </div>

      </div>

  <?php  }?>

  </div>

</div>
<?php
$samples=array(array());
$targets=array();

$result6 = mysqli_query($con,"SELECT * FROM threads");
$i=0;
$j=0;
while($row = mysqli_fetch_assoc($result6)) {

$samples[$i][0] = $row['user_joined'];
$samples[$i][1] = $row['total_reply'];

$targets[$i] = $row['th_id'];


$i = $i + 1;


}
print $samples[0][1];
$classifier = new NaiveBayes;
$classifier->train($samples, $targets);

$samplesc=array(array());
$targetsc=array();

$resultc = mysqli_query($con,"SELECT * FROM communities");
$i=0;
$j=0;
while($rowc = mysqli_fetch_assoc($resultc)) {

$samplesc[$i][0] = $rowc['user_joined'];
$samplesc[$i][1] = $rowc['replies_ct'];

$targetsc[$i] = $rowc['c_id'];


$i = $i + 1;


}

$classifierc = new NaiveBayes;
$classifierc->train($samplesc, $targetsc);

 ?>
<div class="card my-4">
   <h5 class="card-header">Trending Community</h5>
   <div class="card-body">
     <?php
     for( $i = 0; $i<1; $i++ ) {
             $predictc=$classifierc->predict([rand(0,3),rand(0,3)]);

             $result7 = mysqli_query($con,"SELECT * FROM communities where c_id = '$predictc' ORDER BY date DESC ");
             $row7=mysqli_fetch_assoc($result7);?>

                <div class="card-body">
                  <h2 class="card-title"><?php echo '<h2>'.$row7['name'].'</h2>';?></h2>


                 <?php echo '<a href="communities.php?id='.$row7['c_id'].'" class="btn btn-primary">Read More</a> | ';
            ?>
               </div>


           <?php   }
    ?>
 </div>

</div>
<div class="card my-4">
   <h5 class="card-header">Trending THREADS</h5>
   <?php
   for( $i = 0; $i<1; $i++ ) {
           $predict=$classifier->predict([15,rand(0,3)]);
           $result5 = mysqli_query($con,"SELECT * FROM threads where th_id = '$predict' ORDER BY date DESC ");
           $row5=mysqli_fetch_assoc($result5);?>
           <div class="card mb-4">
              <div class="card-body">
                <h2 class="card-title"><?php echo '<h2>'.$row5['title'].'</h2>';?></h2>


               <?php echo '<a href="post_view.php?id='.$row5['th_id'].'" class="btn btn-primary">Read More</a> | ';
          ?>
             </div>
           </div>

         <?php   }
  ?>

</div></div></div>
<br><br><br>

<?php
$samples=array(array());
$targets=array();

$result3 = mysqli_query($con,"SELECT * FROM threads , users,tags_thread where  users.id='$user_id' and tags_thread.tag1 = users.tag1 or tags_thread.tag2 = users.tag2 or tags_thread.tag3 = users.tag3 or tags_thread.tag1 = users.tag3 or tags_thread.tag2 = users.tag1  or tags_thread.tag1=users.tag2   ORDER BY date DESC ");
$i=0;
$j=0;
while($row = mysqli_fetch_assoc($result3)) {

$samples[$i][0] = $row['user_joined'];
$samples[$i][1] = $row['total_reply'];

$targets[$i] = $row['th_id'];


$i = $i + 1;


}

$classifier = new NaiveBayes;
$classifier->train($samples, $targets);
?>


<h3>suggested...only for YOU
  <small></small>
</h3>
<div class="row">


<div class="col-4">
  <h3>light discussion</h3>
  <?php
  for( $i = 0; $i<2; $i++ ) {
          $pred=$classifier->predict([0,rand(0,3)]);
          $result = mysqli_query($con,"SELECT * FROM threads where th_id = '$pred' ORDER BY date DESC ");
          $row=mysqli_fetch_assoc($result);?>
          <div class="card mb-4">
             <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
             <div class="card-body">
               <h2 class="card-title"><?php echo '<h2>'.$row['title'].'</h2>';?></h2>
               <p class="card-text"><?php 	$body = substr($row['body'], 0, 300);
         echo nl2br($body).'...<br/>';?></p>


              <?php echo '<a href="post_view.php?id='.$row['th_id'].'" class="btn btn-primary">Read More</a> | ';
         ?>
            </div>
            <div class="card-footer text-muted">




            </div>
          </div>

        <?php   }




 ?></div>
 <div class="col-4">
  <h3>Heavy discussion</h3>
  <?php
  for( $i = 0; $i<2; $i++ ) {
          $pred=$classifier->predict([0,rand(3,10)]);
          $result = mysqli_query($con,"SELECT * FROM threads where th_id = '$pred' ORDER BY date DESC ");
          $row=mysqli_fetch_assoc($result);?>
          <div class="card mb-4">
             <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
             <div class="card-body">
               <h2 class="card-title"><?php echo '<h2>'.$row['title'].'</h2>';?></h2>
               <p class="card-text"><?php 	$body = substr($row['body'], 0, 300);
         echo nl2br($body).'...<br/>';?></p>


              <?php echo '<a href="post_view.php?id='.$row['th_id'].'" class="btn btn-primary">Read More</a> | ';
         ?>
            </div>
            <div class="card-footer text-muted">




            </div>
          </div>

        <?php   } ?>
</div>
<div class="col-4">
  <h3>moderate discussion</h3>
  <?php
  for( $i = 0; $i<2; $i++ ) {
          $pred=$classifier->predict([0,rand(10,20)]);
          $result = mysqli_query($con,"SELECT * FROM threads where th_id = '$pred' ORDER BY date DESC ");
          $row=mysqli_fetch_assoc($result);?>
          <div class="card mb-4">
             <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
             <div class="card-body">
               <h2 class="card-title"><?php echo '<h2>'.$row['title'].'</h2>';?></h2>
               <p class="card-text"><?php 	$body = substr($row['body'], 0, 300);
         echo nl2br($body).'...<br/>';?></p>


              <?php echo '<a href="post_view.php?id='.$row['th_id'].'" class="btn btn-primary">Read More</a> | ';
         ?>
            </div>
            <div class="card-footer text-muted">




            </div>
          </div>

        <?php   }
         ?>
</div>
</div>


     <!--  <div class="card mb-4">
            <img class="card-img-right" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">SHISHIR</a>
            </div>
          </div>


          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">SHIshir</a>

            </div>
          </div>

          <!-- Pagination
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        -->



    </div>

 <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
          </div>
        </div>
      </div>
    </footer>



  </body>

</html>
