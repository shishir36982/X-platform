<?php
include "common.php";
$r=mysqli_query($con,"select * from users order by rating desc limit 12");
$r1=mysqli_query($con,"select * from users order by thread_created desc limit 12");
$r2=mysqli_query($con,"select * from users order by comm_created desc limit 12");
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
              <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
              <link href="index.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/bower_components/bootstrap-horizon/bootstrap-horizon.css">
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
        <script>
                $(document).ready(function() {

                    $('input.search').typeahead({
                        name: 'search',
                        remote: 'search_suggest.php?query=%QUERY'

                    });

                })
            </script>


          <div class="container">
            <div class="row">
            <form method="POST" action="searchuser.php">
           <div class="input-group">
             <input type="text" name="search" class="form-control"  class="search"  placeholder="Search for..." style="width:100%">
             <span class="input-group-btn">
               <button class="btn btn-secondary" type="submit">Go!</button>
             </span>
           </form>
         </div></div>
            <h2>All-Rounders</h2>
            <div class="row row-horizon">

<?php
    while($row = mysqli_fetch_assoc($r)) {?>
       <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
     <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title"><?php echo '<h4>'.$row['name'].'</h2>';?></h2>
          <p class="card-text"><?php echo '<h5>'.$row['rating'].'</h3>';?></p>


         <?php echo '<a href="profile.php?id='.$row['id'].'" class="btn btn-primary">Read More</a>' ;
    ?>
       </div>
       <div class="card-footer text-muted">




       </div>
     </div>
   </div><?php
}?>

</div>
  <h2>thread masters</h2>
<div class="row row-horizon">

<?php
while($row1 = mysqli_fetch_assoc($r1)) {?>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
<div class="card mb-4">
<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
<div class="card-body">
<h2 class="card-title"><?php echo '<h4>'.$row1['name'].'</h2>';?></h2>
<p class="card-text"><?php echo '<h5>'.$row1['thread_created'].'</h3>';?></p>


<?php echo '<a href="profile.php?id='.$row1['id'].'" class="btn btn-primary">Read More</a>' ;
?>
</div>
<div class="card-footer text-muted">




</div>
</div>
</div><?php
}?>

</div>
<h2>community masters</h2>
<div class="row row-horizon">

<?php
while($row2= mysqli_fetch_assoc($r2)) {?>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
<div class="card mb-4">
<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
<div class="card-body">
<h2 class="card-title"><?php echo '<h4>'.$row2['name'].'</h2>';?></h2>
<p class="card-text"><?php echo '<h5>'.$row2['comm_created'].'</h3>';?></p>


<?php echo '<a href="profile.php?id='.$row2['id'].'" class="btn btn-primary">Read More</a>' ;
?>
</div>
<div class="card-footer text-muted">




</div>
</div>
</div><?php
}?>

</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
    include 'footer.php';
    ?>


    </body>
</html>
