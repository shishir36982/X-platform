<?php
include "common.php";

?>
<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
              <!--jQuery library-->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

              <!--Latest compiled and minified JavaScript-->
              <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>subcomm</title>
    </head>
    <body>

        <?php
        include 'header.php';


        $sc_id=$_GET['id'];
         include 'check-if-joined.php'; ?>



        <div class="container">

            <div class="jumbotron">

                <?php echo '<a href="post_add.php?sc_id='.$_GET['id'].'" class="btn btn-danger">add thread</a>';?>
              <?php  if (check_joined_sub($sc_id)) { //This is same as if(check_if_added_to_cart !=0)
    echo '<a href="#" class="btn  btn-success disabled" >joined</a>';
    echo '<a href="subcomm_rem.php?id='.$sc_id.'" class="btn  btn-danger" >UNJOIN</a>';
    } else {

  echo '  <a href="join_comm_sub.php?id='.$sc_id.'" name="add" value="add" class="btn  btn-primary">JOIN sub-COMMUNITY</a>';

}?>
                <?php
                $result0=mysqli_query($con,"SELECT * FROM subcommunities where s_id ='$sc_id' ORDER BY date DESC");
                $row = mysqli_fetch_assoc($result0);
                echo '<h3> people joined -'.$row['user_joined'].'</h3>'; ?>
                <h1>explore your SUB community</h1>
                <p></p>

            </div>








           <div class="row justify-content-md-center row_style">
               <div class='col-6'>
             <?php

            $result = mysqli_query($con,"SELECT * FROM threads where sc_id ='$sc_id' ORDER BY date DESC");

            if(!mysqli_num_rows($result)) {
            echo 'No posts yet.';
            } else {
            while($row = mysqli_fetch_assoc($result)) {?>

             <div class="card text-center">
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
</div>




</div>
    </body>
    <footer >
        <p>Copyright © Lifestyle Store. All Rights
            Reserved” ​and ​“Contact Us: +91 90000 00000</p>
    </footer>
</html>
