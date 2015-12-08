<?php

    require '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $shipment_center_idError = null;

        // keep track post values
        $name = $_POST['name'];
        $shipment_center_id = $_POST['shipment_center_id'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($shipment_center_id)) {
            $shipment_center_idError = 'Please enter Shipment Center Id';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO bin (name,shipment_center_id) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $shipment_center_id));
            Database::disconnect();
            header("Location: binIndex.php");
        }
    }else
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id,name FROM shipment_center ORDER BY name";
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
                        <h3>Create a Bin</h3>
                    </div>

                    <form class="form-horizontal" action="binCreate.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($shipment_center_idError)?'error':'';?>">
                        <label class="control-label">Shipment Center Id</label>
                        <div class="controls">
                            <select name="shipment_center_id">
                                      <?php foreach($data as $row) {?><option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option><?php }?>
                            </select>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="binIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>