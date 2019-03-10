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
              <div class="row row_style">
                  <div class="col-6">
                      <div class="card text-center">
                          <div class="card-header">
                              <h4 style="color:black">join sub community</h4>
                          </div>
                          <div class="card-body">
                              <p class="text-warning">join sub community</p>
                               <div class="container">
              <div class="row">
                  <div class="col-12 ">
                    <?php
                    $sc_id=$_GET['id'];
                    $select_query0 = "SELECT * FROM subcommunities where s_id ='$sc_id'";
                    $n0 = mysqli_query($con, $select_query0) or die(mysqli_error($con));
                    $row0 = mysqli_fetch_array($n0);
                    ?>
                    <form method="POST">
                     <div class="form-group">
			
                      <?php echo '<h2 style="color:black">'.$row0['custom_ques1'].'</h2>';?></h2>
                       <textarea type="text"  class="form-control" name="ans1"  placeholder="answer the question" required></textarea>
                     </div>
                       <?php echo '<h2 style="color:black">'.$row0['custom_ques2'].'</h2>';?></h2>
                     <div class="form-group">
                         <textarea type="text"  class="form-control" name="ans2"  placeholder="answer the question" required>
                     </textarea>
			</div>
                       <?php echo '<h2 style="color:black">'.$row0['custom_ques3'].'</h2>';?></h2>
                     <div class="form-group">
                         <textarea type="text"  class="form-control" name="ans3"  placeholder="answer the question" required>
			</textarea>
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
        </div>
    <?php
        include 'footer.php';
        ?>
    </body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
if(!empty($_POST)) {


$user_id=$_SESSION['id'];

$q=$_POST['ans1'];
$w=$_POST['ans2'];
$e=$_POST['ans3'];

$select_query1 = "SELECT name,email FROM users where id ='$user_id'";
$n = mysqli_query($con, $select_query1) or die(mysqli_error($con));
$row = mysqli_fetch_array($n);
$ns = $row['name'];
$em = $row['email'];
$query="YOU HAVE SUCCESSFULLY JOINED THE sub COMMUNITY >>>>>>>> ENJOY AND START YOUR GREAT JOURNEY!!";

$select_query = "INSERT INTO user_subcommunities (user_id, sc_id, status,ans1,ans2,ans3) VALUES('$user_id', '$sc_id', 'added to cart','$q','$w','$e')";
mysqli_query($con,"UPDATE subcommunities SET user_joined=user_joined+1 WHERE sc_id='$sc_id' LIMIT 1");
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$message="
NAME:
$ns

email:
$em



   Message:
   $query


 ";
 $mail = new PHPMailer;

 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->SMTPAuth = true; // Enable SMTP authentication
 //$mail->SMTPDebug = 2; //Please enable debug if you want to check if the mail sent successfully.

 $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
 $mail->Username = 'ranjanshishir24@gmail.com';    // SMTP username
 $mail->Password = 'Shishir@12';  // SMTP password
 $mail->SMTPSecure = 'ssl';   // Enable encryption, 'ssl' also accepted
 $mail->Port = 465;
$subject = "COMMUNITY JOINED";
 $mail->addAddress($em, $ns);
 $mail->From = $em;
 $mail->FromName = $ns;
 $mail->Subject = $subject;
 $mail->Body    = $message;
 $mail->AltBody = $message;

//"CC: somebodyelse@example.com";

$mail->send();

echo 'subcommunity joined <a href="subcomm.php?id='.$sc_id.'">View</a>';
}
?>
