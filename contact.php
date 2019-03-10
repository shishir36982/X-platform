<?php
include "common.php";
if (isset($_SESSION['email'])) {
header('location: products.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
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
        ?>
		<div id="banner_image">
    <center>
        
        <div class="container">
		 <div class="row row_style">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>CONTACT</h4>
                        </div>
                        <div class="panel-body">
                            <p class="text-warning">CONTACT FOR ANY QUERY</p>
                             <div class="container">
            <div class="row">
                <div class="col-xs-4 ">
                  <form method="POST" action="contactscript.php">
                        <div class="form-group">
                            <input type="text"  class="form-control" name="name"  placeholder="name" >
                        </div>
                     
                        <div class="form-group">
                            <input type="email"  class="form-control" name="email" placeholder="email">
                        </div>
                       <div class="form-group">
                            <input type="text"  class="form-control" name="suggest" placeholder="suggest">
                        </div>
                    
                        <div class="form-group">
                            <input type="phone"  class="form-control" name="phone" placeholder="phone">
                        </div>
                        
                       
                        <button type=submit class="btn btn-primary">submit</button>
                       
                    </form>
                </div>
            </div>
        </div>
           </center><br><br><br><br><br><br><br><br>
        </div>
		<!--
        <div id="banner_image">
    <center>
        
        <div class="container">
		<div class="row row_style">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>CONTACT</h4>
                        </div>
                        <div class="panel-body">
                            <p class="text-warning">CONTACT FOR ANY QUERY (AVG RESPONSE TIME= 5 MIN</p>
                             <div class="container">
            <div class="row">
                <div class="col-xs-4 ">
                    
                 <form method="POST" action="contactscript.php">
                        <div class="form-group">
                            <input type="text"  class="form-control" name="name"  placeholder="name" >
                        </div>
                     
                        <div class="form-group">
                            <input type="text"  class="form-control" name="email" placeholder="email">
                        </div>
                       <div class="form-group">
                            <input type="text"  class="form-control" name="suggest" placeholder="suggest">
                        </div>
                    
                        <div class="form-group">
                            <input type="contact"  class="form-control" name="phone" placeholder="phone">
                        </div>
                        
                       
                        <button type=submit class="btn btn-primary">submit</button>
                       
                    </form>
                </div>
            </div>
     </div>
	</div>
	</div>
	-->

		</div>
          
            

            
        
    
	 <?php
        include 'footer.php';
        ?>
		</body>
</html>