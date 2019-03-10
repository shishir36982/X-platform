<?php
include "common.php";

?>
<?php
if(!empty($_POST)) {

$user_id=$_SESSION['id'];
$select_query1 = "SELECT name FROM users where id ='$user_id'";
$n = mysqli_query($con, $select_query1) or die(mysqli_error($con));
$row = mysqli_fetch_array($n);
$ns = $row['name'];
$t=$_POST['name'];
	$c = date("Y/m/d");
  $q1=$_POST['q1'];
    $q2=$_POST['q2'];
      $q3=$_POST['q3'];
      $a=$_GET['id'];
$select_query = "SELECT name , createdby FROM subcommunities where name='$t' and createdby='$ns'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
if($total_rows_fetched==0){

   $user_registration_query = "INSERT INTO subcommunities (name,c_id,user_id,createdby,date,custom_ques1,custom_ques2,custom_ques3) VALUES ('$t','$a','$user_id','$ns','$c','$q1','$q2','$q3')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));

echo 'Entry added <a href="subcomm.php?id='.mysqli_insert_id($con).'">View</a>';

}
else {
		echo "already done";

}
}
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


          <div class="container">
              <div class="row row_style">
								<div class="col-2">
								</div>
                  <div class="col-7">
                      <div class="card">
                          <div class="card-header">
                              <h4 style="color:black">add sub community</h4>
                          </div>
                          <div class="card-body">
                              <p class="text-warning">create your own sub community</p>
                               <div class="container">
              <div class="row">
                  <div class="col-12 ">

                    <form method="POST">
                     <div class="form-group">
                         <input type="text"  class="form-control" name="name"  placeholder="name" required>
   </div>
                    <div class="form-group">
                           <input type="text"  class="form-control" name="q1"  placeholder="custom question 1" required>
</div>
                      <div class="form-group">
                           <input type="text"  class="form-control" name="q2"  placeholder="custom question 2" required>
</div>
                      <div class="form-group">
                           <input type="text"  class="form-control" name="q3"  placeholder="custom question 3" required>
                     </div>






                     <button type=submit class="btn btn-primary">submit</button>

                 </form>
                  </div>
              </div>
          </div>

                          </div>

                          <div class="card-footer"><p class="text-warning"> </p><a href="signup.php">Register</a></div>
                      </div>
                  </div>


                      </div>
                  </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <?php
        include 'footer.php';
        ?>
    </body>
</html>
