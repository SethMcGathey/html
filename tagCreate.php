<?php

    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $1column1Error = null;

        // keep track post values
        $1column1 = $_POST['1column1'];

        // validate input
        $valid = true;
        if (empty($1column1)) {
            $1column1Error = 'Please enter visColumn1';
            $valid = false;
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tableName (1column1) values(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($1column1));
            Database::disconnect();
            header("Location: index.php");
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
                        <h3>Create a nameTable</h3>
                    </div>

                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($1column1Error)?'error':'';?>">
                        <label class="control-label">visColumn1</label>
                        <div class="controls">
                            <input name="1column1" type="text"  placeholder="visColumn1" value="<?php echo !empty($1column1)?$1column1:'';?>">
                            <?php if (!empty($1column1Error)): ?>
                                <span class="help-inline"><?php echo $1column1Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>