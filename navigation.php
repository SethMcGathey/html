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
          //sets up an associative array with the url of each page as the name so that I can set that link to "active"
          $ifActive = array("/index.php"=>"", "/products.php"=>"", "/sqlManagmentFiles/productFiles/productIndex.php"=>"", "/contact.php"=>"", "/cart.php"=>"", "/logout.php"=>"", "/profile.php"=>"", "/register.php"=>"", "/login.php"=>"");

          $ifActive[$_SERVER['PHP_SELF']] = "active";
          echo '<li class="' . $ifActive["/index.php"] . '"><a href="index.php">Home</a></li>';
          echo '<li class="' . $ifActive["/products.php"] . '"><a href="products.php">Products</a></li>';

          if($_SESSION['permission'] == 1)
          {
            echo '<li class="' . $ifActive["/sqlManagmentFiles/productFiles/productIndex.php"] . '"><a href="sqlManagmentFiles/productFiles/productIndex.php">Admin</a></li>';
          }
        
          //echo '<li class="' . $ifActive["/contact.php"] . '"><a href="contact.php">Contact</a></li>';

      echo '</ul>
      <ul class="nav navbar-nav navbar-right">';


          $sql = 'SELECT SUM(quantity) as fullQuantity FROM transaction t JOIN transaction_product tp ON tp.transaction_id = t.id JOIN product p ON p.id = tp.product_id JOIN image i ON i.product_id = p.id WHERE cart = 1 AND customer_ID = 3';
            //$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
            foreach ($pdo->query($sql) as $row) {
                $quantity = $row['fullQuantity'];
            }

          echo '<li class="' . $ifActive["/cart.php"] . '"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart ' . $quantity . '</a></li>';

              //changes login to logout when a person logs in and puts their name in the Navbar
              if(isset($_SESSION['username']))
              {
                echo '<li class="' . $ifActive["/logout.php"] . '"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>';
                echo '<li class="' . $ifActive["/profile.php"] . '"><a href="profile.php">Welcome, ' . $_SESSION['username'] . '</a></li>';
              }else
              {
                echo '<li class="' . $ifActive["/register.php"] . '"><a href="register.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>';
                echo '<li class="' . $ifActive["/login.php"] . '"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>';
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

