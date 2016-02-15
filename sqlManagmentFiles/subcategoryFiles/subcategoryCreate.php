<?php

    require '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $category_idError = null;

        // keep track post values
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($category_id)) {
            $category_idError = 'Please enter Category Id';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO subcategory (name,category_id) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $category_id));
            Database::disconnect();
            header("Location: subcategoryIndex.php");
        }
    }else
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id, name FROM category ORDER BY name";
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
    <link   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Subcategory</h3>
                    </div>

                    <form class="form-horizontal" action="subcategoryCreate.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($category_idError)?'error':'';?>">
                        <label class="control-label">Category Id</label>
                        <div class="controls">
                            <select name="category_id">
                                      <?php foreach($data as $row) {?><option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option><?php }?>
                            </select>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="subcategoryIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>