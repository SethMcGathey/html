<?php
    require '../../database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: binIndex.php");
    }

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
            $shipment_center_idError = 'Please enter Name';
            $valid = false;
        }


        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE bin  set name = ?, shipment_center_id = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$shipment_center_id,$id));
            Database::disconnect();
            header("Location: binIndex.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM bin where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['name'];
        $shipment_center_id = $data['shipment_center_id'];
        Database::disconnect();

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
    <?php require '../../navigation.php' ?>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Bin</h3>
                    </div>

                    <form class="form-horizontal" action="binUpdate.php?id=<?php echo $id?>" method="post">
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
                        <label class="control-label">Shipment Center</label>
                        <div class="controls">
                            <select name="shipment_center_id">
                                <?php foreach($data as $row) {?><option value="<?php echo $row['id'];?>"<?php if($row['id'] == $shipment_center_id) { ?> selected="selected"<?php } ?> ><?php echo $row['name'];?></option><?php }?>
                            </select>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="binIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>