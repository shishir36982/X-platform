<?php
 require('vendor/autoload.php');
use LanguageDetector\LanguageDetector;


include 'common.php';
error_reporting(0);
$sat = new SentimentAnalyzerTest(new SentimentAnalyzer());
$sat->trainAnalyzer('vendor/phpclasses/sentiment-analyzer/trainingSet/data.neg', 'negative', 8000); //training with negative data
$sat->trainAnalyzer('vendor/phpclasses/sentiment-analyzer/trainingSet/data.pos', 'positive', 8000); //trainign with positive data
?>
<!DOCTYPE html>
<html lang="en">

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="">

    <title>View Thread</title>



    <link href="css/blog-home.css" rel="stylesheet">
	  <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>
<?php include "header.php";
 include 'check-if-joined.php';?>
<?php

$g = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM threads WHERE th_id='$g' LIMIT 1");

if(!mysqli_num_rows($result)) {
	echo 'Post #'.$_GET['id'].' not found';
	exit;
}

$row = mysqli_fetch_assoc($result);?>
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-8">
				<div class="site-heading">
          <?php echo '<a href="post_add.php?id='.$_GET['id'].'" class="btn btn-danger">add thread</a>';?>
        <?php  if (check_followed($g)) { //This is same as if(check_if_added_to_cart !=0)
echo '<a href="#" class="btn  btn-success disabled" >Followed</a>';
echo '<a href="thread_rem.php?id='.$g.'" class="btn  btn-danger" >UNFOLLOW</a>';
} else {

echo '  <a href="follow_thread.php?id='.$g.'" name="add" value="add" class="btn  btn-primary">follow</a>';

}?>
					<?php echo '<h1>'.$row['title'].'</h1>';
          echo '<h5>created by:</h5><a href="profile.php?id='.$row['user_id'].'" class="btn btn-success">'.$row['createdby'].'</a>';?>

					<span class="subheading"></span>
			</div>
		</div>

    <div class="col-4">
    <div class="site-heading">
      <?php if($row['user_id']==$_SESSION['id']){
        echo   '    <h3>add tags</h3> <div class="row">
        <a href="post_delete.php?id='.$_GET['id'].'" class="btn btn-danger">delete thread</a>
        <a href="post_edit.php?id='.$_GET['id'].'" class="btn btn-danger">edit thread</a>';}?>

      <?php if($row['user_id']==$_SESSION['id'] and !(check_tags_added_thread($g))){

            echo   '    <h3>add tags</h3> <div class="row">


                  <div class="col-xs-8 ">

               <form method="POST" action="add_tags_thread.php?id='.$g.'">

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
</div>
</header>
<div class='row justify-content-md-center row_style'>
<div class='col-9'>
<div class="card text-center">
	 <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
	 <div class="card-body">
		 <h2 class="card-title"><?php echo '<h2>'.$row['title'].'</h2>';?></h2>

		 <p class="card-text"><?php
    $sentimentAnalysisOfSentence1 = $sat->analyzeSentence($row['body']);

    $resultofAnalyzingSentence1 = $sentimentAnalysisOfSentence1['sentiment'];
    $probabilityofSentence1BeingPositive = $sentimentAnalysisOfSentence1['accuracy']['positivity'];
    $probabilityofSentence1BeingNegative = $sentimentAnalysisOfSentence1['accuracy']['negativity'];
    $ld = new LanguageDetector;

    echo $ld->detect($row['body']);
    if($probabilityofSentence1BeingPositive>0.3){
      echo '<h4>POSITIVE</h4>';
    }else{
      echo '<h4>negative</h4>';
    }


     echo nl2br($row['body']).'<br/>'	;
		 echo '<a href="post_edit.php?id='.$_GET['id'].'">Edit</a> | <a href="post_delete.php?id='.$_GET['id'].'">Delete</a> | <a href="index.php">View All</a>';


		 echo '<hr/>';
?></p>
</div>
</div>
</div>
</div>
<div class="row">
                <div class="col-sm-6 col-md-4">


<?php echo '<form method="POST" action="question_add.php?id='.$g.'">';?>

		 <div class="form-group">
				 <textarea  class="form-control" name="question" placeholder="ask....." required></textarea>
		 </div>
		   <button type=submit class="btn btn-primary">submit</button>
</form>
<?php
$myOptions = array('strictness' => 'permissive', 'also_check' => array('foobar','bhenchod','madarchod'));
$filter = new \JCrowe\BadWordFilter\BadWordFilter($myOptions);
$rq= mysqli_query($con,"SELECT * FROM threads WHERE th_id='$g' ");
$row8 = mysqli_fetch_array($rq);
$ab = $row8['abuse'];
$result = mysqli_query($con,"SELECT * FROM questions WHERE th_id='$g' ORDER BY date ASC");
echo '<ol id="comments">';
while($row = mysqli_fetch_assoc($result)) {
  if($ab='yes'){


  $cleanString = $filter->clean($row['content']);

  echo '<li id="post-'.$row['th_id'].'">';

  echo '<h2>posted by '.$row['name'].'</h2>';
  echo '<small>posted on'.$row['date'].'</small><br/>';
  echo '<h4>'.$cleanString.'</h4><br>';
if(!check_question($row['q_id'],$g)){
  echo ' <a href="question_delete.php?id='.$row['q_id'].'&post='.$_GET['id'].'" type="button" class="btn btn-danger">Delete</a><br/>';

  echo '</li>';
}
}
else{
  echo '<li id="post-'.$row['th_id'].'">';

  echo '<h2>posted by '.$row['name'].'</h2>';
  echo '<small>posted on'.$row['date'].'</small><br/>';
  echo '<h4>'.$row['content'].'</h4><br>';
  if(!check_question($row['q_id'],$g)){
  echo ' <a href="comment_delete.php?id='.$row['r_id'].'&post='.$_GET['id'].'" type="button" class="btn btn-danger">Delete</a><br/>';
}}

}?>

</div>

<div class="col-sm-6 col-md-4">
<?php echo '<form method="POST" action="comment_add.php?id='.$g.'">';?>

<div class="form-group">
		<textarea  class="form-control" name="content" placeholder="say...." required></textarea>
</div>
<button type=submit class="btn btn-primary">submit</button>
</form>


<?php
$myOptions = array('strictness' => 'permissive', 'also_check' => array('foobar','bhenchod','madarchod'));
$filter = new \JCrowe\BadWordFilter\BadWordFilter($myOptions);
$r= mysqli_query($con,"SELECT * FROM threads WHERE th_id='$g' ");
$row9 = mysqli_fetch_array($r);
$ab = $row9['abuse'];
$result = mysqli_query($con,"SELECT * FROM replies WHERE th_id='$g' ORDER BY date ASC");
	echo '<ol id="comments">';
	while($row = mysqli_fetch_assoc($result)) {
    if($ab='yes'){


  	$cleanString = $filter->clean($row['content']);


		echo '<li id="post-'.$row['th_id'].'">';

		echo '<h2>posted by '.$row['name'].'</h2>';
		echo '<small>posted on'.$row['date'].'</small><br/>';
		echo '<h4>'.$cleanString.'</h4><br>';
	if($row['user_id']==$_SESSION['id']){
    	echo ' <a href="comment_delete.php?id='.$row['r_id'].'&post='.$_GET['id'].'" type="button" class="btn btn-danger">Delete</a><br/>';

		echo '</li>';}}
    else{
      echo '<li id="post-'.$row['th_id'].'">';

  		echo '<h2>posted by '.$row['name'].'</h2>';
  		echo '<small>posted on'.$row['date'].'</small><br/>';
  		echo '<h4>'.$row['content'].'</h4><br>';
if($row['user_id']==$_SESSION['id']){
    		echo ' <a href="comment_delete.php?id='.$row['r_id'].'&post='.$_GET['id'].'" type="button" class="btn btn-danger">Delete</a><br/>';
    }
	}}?>
	</div>
<div class="col-sm-6 col-md-4">
<?php echo '<form method="POST" action="suggest_add.php?id='.$g.'">';?>

<div class="form-group">
		<textarea  class="form-control" name="suggest" placeholder="suggest...." required></textarea>
</div>
<button type=submit class="btn btn-primary">submit</button>
</form>
<?php


$result = mysqli_query($con,"SELECT * FROM suggest WHERE th_id='$g' ORDER BY date ASC");
echo '<ol id="comments">';
while($row = mysqli_fetch_assoc($result)) {
  echo '<li id="post-'.$row['th_id'].'">';

  echo '<h2>posted by '.$row['name'].'</h2>';
  echo '<small>posted on'.$row['date'].'</small><br/>';
  echo '<h4>'.$row['content'].'</h4><br>';
  if($row['user_id']==$_SESSION['id']){
    header('location: communities.php?id='.$row['s_id'].'&post='.$_GET['id'].'');




}
  echo '</li>';
}?>
</div>
</div>
