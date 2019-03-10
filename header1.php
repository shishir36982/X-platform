<nav class="navbar navbar-inverse  navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">SR UNIVERSE</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (isset($_SESSION['email'])) {
                        ?>
                        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> contact</a></li>
                        <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> setting</a></li>
						<li><a href="index4.php"><span class="glyphicon glyphicon-cog"></span> discussion</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
                        ?>
                        <?php
                        } else {
                        ?>
                        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> contact</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                        <?php
                         }
                         ?>
                    </ul>
                </div>
            </div>
        </nav>
