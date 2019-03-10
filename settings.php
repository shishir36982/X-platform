<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Navbar in Bootstrap</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Lifestyle Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> cart</a></li>
                        <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> setting</a></li>
			<li><a href="settings.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-3">
                    <h3>Change Password</h3>
                    <form method='get' action='settings_script.php'>
                          <div class="form-group">
                            <input type="password"  class="form-control" name="old_password" placeholder="old_password">
                        </div>
                          <div class="form-group">
                            <input type="password"  class="form-control" name="passwords" placeholder="passwords">
                        </div>
                          <div class="form-group">
                            <input type="password"  class="form-control" name="new_password" placeholder="new_password">
                        </div>
                        <button class="btn btn-primary">change</button>
                    </form>
                </div>
            </div>
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
               <footer>
            <p>Copyright © Xplatform. All Rights
                Reserved” ​and ​“Contact Us: +91 90000 00000</p>
        </footer>

    </body>

</html>
