<?php
        include 'common.php';
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
        ?><br><br>
<div class='container'>
<div class='row'>
<div class='col-md-3'>
  <h2>subcommunities related</h2>
<?php
if(!empty($_POST)) {

$a=$_GET['id'];
	$t = $_POST['search'];

$select_query = "SELECT * FROM subcommunities where c_id ='$a' and name like '%{$t}%'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){


echo 'NO REsults';

}
else {
  while($row = mysqli_fetch_assoc($select_query_result)) {?>
   <div class="card mb-4">
      <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
      <div class="card-body">

        <h2 class="card-title"><?php echo '<h2>'.$row['name'].'</h2>';?></h2>

       <?php echo '<a href="subcomm.php?id='.$row['s_id'].'" class="btn btn-primary">explore</a> | ';
  ?>
      </div>

    </div>

  <?php
  }


}
}
?>
</div>
<div class='col-md-offset-5 col-md-3'>
  <h2>THREADS RELATED</h2>
<?php
if(!empty($_POST)) {


	$t = $_POST['search'];

$select_query = "SELECT * FROM threads where title='$t' or createdby='$t'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){


echo 'NO REsults';

}
else {
  while($row = mysqli_fetch_assoc($select_query_result)) {?>
   <div class="card mb-3">

      <div class="card-body">

        <h2 class="card-title"><?php echo '<h2>'.$row['title'].'</h2>';?></h2>
        <p class="card-text"><?php echo nl2br($row['body']).'<br/>'	;?>
       <?php echo '<a href="post_view.php?id='.$row['th_id'].'" class="btn btn-primary">explore</a> | ';
  ?>
      </div>

    </div>

  <?php
  }


}
}
?>
</div>
</div>
</div>
</body>

</html>
