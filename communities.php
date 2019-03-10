<?php
include "common.php";
require_once __DIR__ . '/vendor/autoload.php';
 use Phpml\Regression\SVR;
 use Phpml\Regression\LeastSquares;
 use Phpml\SupportVectorMachine\Kernel;
 use Phpml\Classification\KNearestNeighbors;
?>
<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--jQuery library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        div.ex3 {

    width: 250px;
    height: 200px;
    overflow: auto;
}
</style>
        <title>Navbar in Bootstrap</title>
    </head>
    <body>

        <?php
        include 'header.php';


        $c_id=$_GET['id'];
         include 'check-if-joined.php'; ?>



        <div class="container">

            <div class="jumbotron">
              <div row>
              <div col-5>
              <?php echo '<form method="POST" action="search_subcom.php?id='.$_GET['id'].'">';?>
                <div class="md-form mt-0">
                <input class="form-control" type="text" name="search" placeholder="Search for sub communities" aria-label="Search">
              </div
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
              </span>
            </form>
          </div>
        </div>

                <?php echo '<a href="post_add.php?id='.$_GET['id'].'" class="btn btn-danger">add thread</a>';?>
                <?php echo '<a href="add_sub.php?id='.$_GET['id'].'" class="btn btn-danger">add a subcommunity</a>';?>
              <?php  if (check_joined($c_id)) { //This is same as if(check_if_added_to_cart !=0)
    echo '<a href="#" class="btn  btn-success disabled">joined</a>';
    echo '<a href="comm_rem.php?id='.$c_id.'" class="btn  btn-danger" >UNJOIN</a>';
    } else {

  echo '  <a href="join_comm.php?id='.$c_id.'" name="add" value="add" class="btn  btn-primary">JOIN COMMUNITY</a>';

}
if($c_id==1){
   echo '<a href="SOS.php" class="btn btn-danger">SOS</a>';
}?>
                <?php

                $user_id=$_SESSION['id'] ;
                $result0=mysqli_query($con,"SELECT * FROM communities where c_id ='$c_id' ORDER BY date DESC");
                $row = mysqli_fetch_assoc($result0);
                echo '<h3> people joined -'.$row['user_joined'].'</h3>';
                echo '<h5>created by:</h5><a href="profile.php?id='.$row['user_id'].'">'.$row['createdby'].'</a>';
                echo '<h1>EXPLORE:-'.$row['name'].'</h1>';
                ?>
              <?php
                $samples=array(array());
                $targets=array();
                $pred=array();

                $result = mysqli_query($con,"select * from communities");
                $result0 = mysqli_query($con,"select thread_ct,subcom_ct from communities where c_id='$c_id'");
                $result1 = mysqli_query($con,"select * from user_thread");

                $i = 0;
                $j=0;
                $row0 = mysqli_fetch_array($result0);

                while($row = mysqli_fetch_assoc($result)) {
                $samples[$i][0] = $row['thread_ct'];

                $targets[$i] = $row['user_joined'];
                $i=$i + 1;
                }
                //$targets[$i] = $row['c_id'];


                //$i = $i + 1;

                //

                $regression = new LeastSquares();
                $regression->train($samples, $targets);
                $pred=intval($regression->predict([$row0[0]]));
                echo '<h3>joined prediction: '.$pred.'</h3>'?>





            <script
                  src="http://code.jquery.com/jquery-2.2.4.min.js"
                  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
                  crossorigin="anonymous"></script>





                <p></p>

            </div>
<?php if($row['user_id']==$_SESSION['id'] and !(check_tags_added($c_id))){
      echo   '    <div class="row">
            <div class="col-xs-4 ">

         <form method="POST" action="add_tags.php?id='.$c_id.'">

              <div class="form-group">
                   <input type="text"  class="form-control" name="tag1"  placeholder="tag1" required>
               </div>
               <div class="form-group">
                   <input type="text"  class="form-control" name="tag2"  placeholder="tag2" required>
               </div>
               <div class="form-group">
                   <input type="text"  class="form-control" name="tag3"  placeholder="tag3" required>
               </div>





               <button type=submit class="btn btn-primary">submit</button>

           </form>
            </div>
        </div>';}?>
    </div>


                    </div>



           <div class="row">
               <div class='col-8'>
             <?php
             $c_id=$_GET['id'];
            $result5 = mysqli_query($con,"SELECT * FROM threads where c_id = '$c_id' ORDER BY date DESC");

            if(!mysqli_num_rows($result5)) {
            echo 'No posts yet.';
            } else {
            while($row5 = mysqli_fetch_assoc($result5)) {?>

             <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title"><?php echo '<h2>'.$row5['title'].'</h2>';?></h2>
                  <p class="card-text"><?php 	$body = substr($row5['body'], 0, 300);
            echo nl2br($body).'...<br/>';?></p>
                 <?php echo '<a href="post_view.php?id='.$row5['th_id'].'" class="btn btn-primary">Read More</a> | ';
            ?>
                </div>
                <div class="card-footer text-muted">

                </div>
              </div>

            <?php
            }}?>
            </div>


            <div col-4>
            <?php  if($c_id==1){
                 echo '<a href="SOS.php" class="btn btn-danger btn-block">SOS</a>';
              }?>
              <div class="card text-black bg-light mb-5" style="max-width: 18rem;">
  <div class="card-header"><h5>CHAT:IN UR WAY,in UR COMMUNITY</h5></div>
              <script
                    src="http://code.jquery.com/jquery-2.2.4.min.js"
                    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
                    crossorigin="anonymous"></script>

                  <script>

                  function submitChat() {
                    if(form1.msg.value == '') {
                      alert("ALL FIELDS ARE MANDATORY!!!");
                      return;
                    }
                    var c_id = <?php echo $_GET['id'];?>;
                    var msg = form1.msg.value;
                    var xmlhttp = new XMLHttpRequest();

                    xmlhttp.onreadystatechange = function() {
                      if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                      }
                    }

                    xmlhttp.open('GET','insert.php?msg='+msg+'&c_id='+c_id,true);
                    xmlhttp.send();
                    form1.msg.value = '';
                  }

                  $(document).ready(function(e){
                    $.ajaxSetup({
                      cache: false
                    });
                    $( "#msg_area" ).keyup(function(e) {
                        var code = e.keyCode || e.which;
                        var c_id = <?php echo $_GET['id'];?>;
                       if(code == 13) { //Enter keycode
                         submitChat();
                       }
                    });
                    setInterval( function(){ var c_id = <?php echo $_GET['id'];?>; $('#chatlogs').load('logs.php?c_id='+c_id); }, 2000 );
                  });

                  </script>



                  <form name="form1">

                  Your Message: <br />
                  <textarea id="msg_area" name="msg"></textarea><br />
                  <a href="#"  class = "btn btn-primary" onclick="submitChat()" >Send</a><br /><br />
                  </form>
                  <div class="ex3" id="chatlogs">
                  LOADING CHATLOG...
                  </div>
                </div>

            </div>

</div>





        <footer >
            <p>Copyright © X_PLATFORM. All Rights
                Reserved” ​and ​“Contact Us: +91 90000 00000</p>
        </footer>
    </body>
</html>
