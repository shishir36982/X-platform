<?php
include "common.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Navbar in Bootstrap</title>
    </head>
    <body>

        <?php
        include 'header.php';

        ?>



        <div class="container">

            <div class="jumbotron">
                <a href="index3.php" role="button" class="btn btn-danger">ADD community</a>
                <h1>YOUR FEED</h1>
                <p></p>

            </div>
        </div>
           <div class="row">
             <?php

            $result = mysqli_query($con,'SELECT * FROM threads ORDER BY date DESC');

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
                  Posted on January 1, 2017 by
                  <a href="#">SHIshir</a>'

                </div>
              </div>

            <?php
            }}?>
            </div>


</div>




        <footer >
            <p>Copyright © Lifestyle Store. All Rights
                Reserved” ​and ​“Contact Us: +91 90000 00000</p>
        </footer>
    </body>
</html>
