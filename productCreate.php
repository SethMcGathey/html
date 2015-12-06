<?php
     
    require 'database.php';
 
        $name = $_POST['name'];
        $cost = $_POST['cost'];
    $subcategoryid = $_POST['subcategoryid'];
if( $name != null && $cost != null) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO product (name,cost,subcategory_id) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$cost,$subcategoryid));
        Database::disconnect();
        header("Location: index.php");
}
else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id,name FROM subcategory ORDER BY name";
    $q = $pdo->prepare($sql);
    $q->execute();
    $data = $q->fetchAll();
      Database::disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
 
<body>
    <div class="container">
     
                    <div class="row">
                        <h3>Create a Product</h3>
                    </div>             
                    <form class="form-horizontal" action="product_create.php" method="post">

                      <div>
                        <label>Name</label>
                        <div>
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                        </div>
                      </div>

                      <div>
                        <label>Cost</label>
                        <div>
                            <input name="cost" type="text"  placeholder="Cost" value="<?php echo !empty($cost)?$cost:'';?>">
                        </div>
                      </div>
     
             <div>
            <label>Subcategory</label>
            <div>
                <select name="subcategoryid">
                          <?php foreach($data as $row) {?><option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option><?php }?>
                </select>
            </div>
                  </div>



                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                 
    </div> <!-- /container -->
  </body>
</html>