<?php
include "common.php";
if (!isset($_SESSION['email'])) {
header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <!--Latest compiled and minified JavaScript-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="index.css" rel="stylesheet" type="text/css"/>
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
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container">

      <div class="row">

        <div class="col-md-4">

          <h3 class="my-4">FROM COMMUNITIES YOU JOINED
            <small></small>
          </h3>

          <?php
          $user_id = $_SESSION['id'];

         $result = mysqli_query($con,"SELECT * FROM threads , user_communities where user_communities.user_id='$user_id' and threads.c_id = user_communities.c_id ORDER BY date DESc");

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
}}?>
</div>
<div class="col-md-4">

  <h3 class="my-4">threads YOU FOLLOW
    <small></small>
  </h3>

  <?php
  $user_id = $_SESSION['id'];

 $result = mysqli_query($con,"SELECT * FROM threads , user_thread where user_thread.user_id='$user_id' and threads.th_id = user_thread.th_id ORDER BY date DESC ");

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
}}?>
</div>
<div class="col-md-4">
  <a href="index3.php" type="button" class="btn btn-danger">ADD community</a>

  <div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
       <form method="POST" action="search.php">
      <div class="input-group">
        <input type="text" name="search"  class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
      </form>
      </div>
    </div>
  </div>

 <div class="card my-4">
    <h5 class="card-header">Top COMMUNITIES</h5>
    <div class="card-body">
            <div class="card my-2">
    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title"></h2>

      <p class="card-text"></p>
      <a href="#" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Posted on January 1, 2017 by
      <a href="#">SHIshir</a>
    </div>
              <div class="card my-2">
    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title">Post Title</h2>
      <p class="card-text"></p>
      <a href="#" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Posted on January 1, 2017 by
      <a href="#">SHIshir</a>
    </div>
  </div>
    </div>
  </div>

</div>
</div>
</div>
//////////////suggestion by tagsssss
<div class="row-md-4">

  <h3 class="my-4">suggested...only for YOU
    <small></small>
  </h3>

  <?php


 $result = mysqli_query($con,"SELECT * FROM user_tags where user_id='$user_id' ");

 if(!mysqli_num_rows($result)) {
 echo 'No posts yet.';
 } else {
 while($row = mysqli_fetch_assoc($result)) {
   $a=$row['tags'];

   $result0 = mysqli_query($con,"SELECT * FROM  tags_thread where tags_thread.tag1='$a' or  tags_thread.tag2='$a' or  tags_thread.tag3='$a' ");
while($row1 = mysqli_fetch_assoc($result0)){
  $d=$row1['th_id'];
  $result2 = mysqli_query($con,"SELECT * FROM threads where th_id='$d' ");
  $row3 = mysqli_fetch_array($result2);

   ?>
  <div class="card mb-4">
     <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
     <div class="card-body">
       <h2 class="card-title"><?php echo '<h2>'.$row3['title'].'</h2>';?></h2>
       <p class="card-text"><?php 	$body = substr($row3['body'], 0, 300);
 echo nl2br($body).'...<br/>';?></p>


      <?php echo '<a href="post_view.php?id='.$row3['th_id'].'" class="btn btn-primary">Read More</a> | ';
 ?>
    </div>
    <div class="card-footer text-muted">




    </div>
  </div>

<?php
}}}?>
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
