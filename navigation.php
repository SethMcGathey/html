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
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="sqlManagmentFiles/productFiles/productIndex.php">Admin</a></li>
        <!--<li><a href="addProducts.php">Add Products</a></li>-->
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
        <li><a href="login.php">seth<?php echo $_SESSION['username']; ?></a></li>
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

