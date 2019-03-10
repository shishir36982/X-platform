<?php
include "common.php";
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Regression\SVR;
use Phpml\Regression\LeastSquares;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Classification\KNearestNeighbors;
$user_id=$_SESSION['id'];
$id=$_GET['id'];
if($user_id==$id){
  $id=$user_id;
}
else{
  $id=$id;
}

$result=mysqli_query($con,"select * from users where id='$id'");
$result8=mysqli_query($con,"select thread_created ,replies,comm_created from users where id='$user_id'");
$row8=mysqli_fetch_array($result8);
$row = mysqli_fetch_array($result);
$ns=$row['name'];
$em=$row['email'];
$pr=$row['profession'];
$ph=$row['contact'];
$ag=$row['age'];
$re=$row['replies'];
$th=$row['thread_created'];
$ra=$row['rating'];
$samples=array(array());
$targets=array();

$pred=array();
$c_id=1;
$result0 = mysqli_query($con,"select * from users");
$i = 0;
$j=0;
$arr=[$row[11],$row[12]];

while($row0 = mysqli_fetch_assoc($result0)) {
$samples[$i][0] = $row0['thread_created'];
$targets[$i] = $row0['replies'];
$i=$i + 1;
}

//$targets[$i] = $row['c_id'];
$regression = new LeastSquares();
$regression->train($samples, $targets);
$predreplies=intval($regression->predict([$row8[0]]));


//$i = $i + 1;

//



?>
<html>
<head>
<title>check profile</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
</head>
<body>
  <?php
  include "header.php";
  ?>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          <?php
                 $sqlimage="SELECT imagepath FROM users WHERE id='$id'";
               $sqlimg=mysqli_query($con, $sqlimage) or die(mysqli_error($con));
               $row1=mysqli_fetch_array($sqlimg);
               $image=$row1['imagepath'];
               echo '<img src="profilepictures/'.$image.'" style="height:30%">';


             ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $ns;?>
                                    </h5>
                                    <h6>
                                        <?php echo $em;?>
                                    </h6>
                                    <p class="proile-rating">Actual replies:<?php echo $re  ; ?></span></p>
                                    <p class="proile-rating">PREDICTED REPLIES:<?php echo $predreplies ; ?></span></p>
                                    <p class="proile-rating">actual thread :<?php echo $th ; ?></span></p>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
            <?php
                      if($predreplies<$re and $ra>100){?>
                        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="lead">EXPECTATIONS FROM YOU ARE NOT MATCHING BUT YOU ARE DOING GREAT </p>
  </div>
</div>
<?php }
  elseif($predreplies<$re and $ra<100){?>
                        <div class="jumbotron jumbotron-fluid">
  <div class="container">

    <p class="lead">EXCEEDE OUR expectations BUT YOUR Rating is NOT GREAT</p>
  </div>
</div>
<?php  }
      elseif($predreplies>$re  and $ra<100){?>
                              <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                  <p class="lead">EXPECTATIONS FROM YOU ARE NOT MATCHING BUT YOU Rating is NOT GREAT</p>
                  </div>
                  </div>
                  <?php  }
        elseif($predreplies>$re and $ra>100){?>
                                    <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <p class="lead">EXPECTATIONS FROM YOU ARE NOT MATCHING BUT YOU Rating is  GREAT</p>
              </div>
              </div>
            <?php  }  elseif($predreplies==$re and $ra<100){?>
                                            <div class="jumbotron jumbotron-fluid">
                      <div class="container">
                        <p class="lead">EXPECTATIONS FROM YOU ARE NOT MATCHING BUT YOU Rating is  GREAT</p>
                      </div>
                      </div>
                    <?php }?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                      <?php    echo '  <a href="showthreads.php?id='.$id.'">THREADS CREATED</a><br/>';
                            echo '<a href="showcomm.php?id='.$id.'">COMMUNITIES CREATED</a><br/>';?>
                            <a href="showsub.php">subcommunities created</a>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>User Id</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p><?php echo $ns;?></p>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Enail</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p><?php echo $em;?></p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Phone</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p><?php echo $ph;?></p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Profession</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p><?php echo $pr;?></p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>AGE</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p><?php echo $ag;?></p>
                                  </div>
                              </div>
                              <div class="row">
                                <?php
                                while($row3 = mysqli_fetch_assoc($result0)) {
                                $samples[$i][0] = $row3['rating'];

                                $targets[$i] = $row3['id'];
                                $i=$i + 1;
                                }
                                $regression = new LeastSquares;
                                $regression->train($samples, $targets);
                                 ?>
                                 <div class="col-md-6">
                                     <label>expected RATING based on other users</label>
                                 </div>
                                 <div class="col-md-6">
                                     <p><?php echo intval($regression->predict([$row8[0]]));?></p>
                                 </div>

                                  <div class="col-md-6">
                                      <label>RATING</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p><?php echo $ra;?></p>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>
