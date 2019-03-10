




<?php include 'common.php';?>
<?php
$d = $_GET['id'];
if(!empty($_POST)) {

	$t = $_POST['title'];
	$b = $_POST['body'];
	$c = date("y/m/d");

		if(mysqli_query($con,"UPDATE threads SET title='$t', body='$b', date='$c' WHERE th_id='$d'"))
			redirect('post_view.php?id='.$_GET['id']);
		else
			echo mysqli_error($con);
	}

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
		<link href="css/blog-home.css" rel="stylesheet">
		 <link href="css/clean-blog.min.css" rel="stylesheet">
    <title>Thread Edit</title>






  </head>
<?php include 'header.php' ?>
  <body>

<!-- Navigation -->

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Xplatform-experimental</h1>
              <span class="subheading"></span>
          </div>
        </div>
      </div>
    </header>
    <div class="container">

      <div class="row">

        <div class="col-12">

          <h1 class="my-4">EDIT THREAD
            <small></small>
          </h1>
					<div class="container">
					<div class="row row_style">
									<div class="col-12">
											<div class="card text-center">
													<div class="card-header">
															<h4></h4>
													</div>
													<div class="card-body">
															<p class="text-warning">write your views</p>
															 <div class="container">
							<div class="row">
									<div class="col-12 ">
<?php
$result = mysqli_query($con,"SELECT * FROM threads WHERE th_id='$d'");
$row=mysqli_fetch_assoc($result) ;
echo '
										 <form method="POST" >
													<div class="form-group">
															<input type="text"  class="form-control" name="title"  placeholder="title" value="'.$row['title'].'" required>
													</div>

													<div class="form-group">
															<textarea rows="10" cols="100" class="form-control" name="body" placeholder="content" required>'.$row['body'].'
															</textarea>
													</div>

													<div class="form-group">
	 	                         <input type="checkbox"  class="form-control" name="abuse" value="yes"  required>
	 	                     </div>


													<button type=submit class="btn btn-primary">submit</button>

											</form>';?>
									</div>
							</div>
					</div>
						 </center><br><br>
					</div>
					<div class="card-footer">
						<p>tick checkbox for abuse filter on discussion on your thread</p>
					</div>
						</div>
							</div>
								</div>
									</div>
										</div>
											</div>

												</div>
<div>
	<?php include 'footer.php'?>
</div>

<!--
<form method="post">
	<table>
		<tr>
			<td><label for="title">Title</label></td>
			<td><input name="title" id="title" /></td>
		</tr>
		<tr>
			<td><label for="body">Body</label></td>
			<td><textarea name="body" id="body"></textarea></td>
		</tr>
		<tr>
			<td><label for="created by">created by</label></td>
			<td><input name="createdby" id="createdby" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Post" /></td>
		</tr>
	</table>
</form>  -->

</body>
</html>
