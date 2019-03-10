


<script>
        $(document).ready(function() {

            $('input.search').typeahead({
                name: 'search',
                remote: 'search_suggest.php?query=%QUERY'

            });

        })
    </script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">X-platform</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <?php
      if (isset($_SESSION['email'])) {
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="index4.php">Home <span class="sr-only">your feed</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout_script.php">logout</a>
      </li>
      <li class="nav-item">
  <?php
  $userid= $_SESSION['id'];
   echo '  <a class="nav-link" href="profile.php?id='.$userid.'">Profile</a> ';?>

      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="topprofile.php">Top Profiles</a>
      </li> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
      <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
           <input class="form-control mr-sm-2" type="search" class="search" name="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>
      <?php
      } else {
?>
    <li class="nav-item active">
      <a class="nav-link" href="signup.php">Signup <span class="sr-only">signup</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">about</a>
    </li>
  
      <?php
       }
       ?>
    </ul>

  </div>
</nav>
