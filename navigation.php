<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Clash Games</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
          $ifActive = array("index.php"=>"", "products.php"=>"", "sqlManagmentFiles/productFiles/productIndex.php"=>"", "contact.php"=>"", "cart.php"=>"", "logout.php"=>"", "profile.php"=>"", "register.php"=>"", "login.php"=>"");
          echo $_SERVER['PHP_SELF'];
          echo '<li class="' . $ifActive[0] . '"><a href="index.php">Home</a></li>';
          echo '<li class="' . $ifActive[1] . '"><a href="products.php">Products</a></li>';

          if($_SESSION['permission'] == 1)
          {
            echo '<li class="' . $ifActive[2] . '"><a href="sqlManagmentFiles/productFiles/productIndex.php">Admin</a></li>';
          }
        
          //<li><a href="addProducts.php">Add Products</a></li>
          echo '<li class="' . $ifActive[3] . '"><a href="contact.php">Contact</a></li>';

      echo '</ul>
      <ul class="nav navbar-nav navbar-right">';

          echo '<li class="' . $ifActive[4] . '"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>';
              //changes login to logout when a person logs in and puts their name in the Navbar
              if(isset($_SESSION['username']))
              {
                echo '<li class="' . $ifActive[5] . '"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>';
                echo '<li class="' . $ifActive[6] . '"><a href="profile.php">Welcome, ' . $_SESSION['username'] . '</a></li>';
              }else
              {
                echo '<li class="' . $ifActive[7] . '"><a href="register.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>';
                echo '<li class="' . $ifActive[8] . '"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>';
              }
        ?>
        
      </ul>
        <div class="col-sm-3 col-md-3 pull-right">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="searchField" id="searchField">
        </div>
        </form>
        </div>
    </div>
  </div>
</nav>

