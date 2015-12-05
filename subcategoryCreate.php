<?php

    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $catefory_idError = null;

        // keep track post values
        $name = $_POST['name'];
        $catefory_id = $_POST['catefory_id'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($catefory_id)) {
            $catefory_idError = 'Please enter Category Id';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO subcategory (name,catefory_id) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $catefory_id));
            Database::disconnect();
            header("Location: subcategoryIndex.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"></script>
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
                      <div class="control-group <?php echo !empty($catefory_idError)?'error':'';?>">
                        <label class="control-label">Category Id</label>
                        <div class="controls">
                            <input name="catefory_id" type="text"  placeholder="Category Id" value="<?php echo !empty($catefory_id)?$catefory_id:'';?>">
                            <?php if (!empty($catefory_idError)): ?>
                                <span class="help-inline"><?php echo $catefory_idError;?></span>
                            <?php endif; ?>
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