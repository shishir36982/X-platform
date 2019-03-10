<?php
        include 'common.php';
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
        ?><br><br>
<div class='container'>
    <h2>communities related</h2>
<div class='row '>

<?php
if(!empty($_POST)) {


	$t = $_POST['search'];

$select_query = "SELECT * FROM users where name like '%{$t}%' order by rating";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){


echo 'NO REsults';

}
else {

  while($row = mysqli_fetch_assoc($select_query_result)) {?>
      <div class='col-3'>
   <div class="card w-200">
      <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
      <div class="card-body">

        <h2 class="card-title"><?php echo '<h2>'.$row['name'].'</h2>';?></h2>

       <?php echo '<a href="profile.php?id='.$row['id'].'" class="btn btn-primary">explore</a> | ';
  ?>
      </div>

    </div>
</div>
  <?php
  }


}
}
?>


</div>
</div>


</html>
