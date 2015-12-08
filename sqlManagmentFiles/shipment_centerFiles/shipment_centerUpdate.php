<?php
    require '../../database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: shipment_centerIndex.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $phoneError = null;
        $address_idError = null;

        // keep track post values
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address_id = $_POST['address_id'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($phone)) {
            $phoneError = 'Please enter Name';
            $valid = false;
        }

        if (empty($address_id)) {
            $address_idError = 'Please enter Address Id';
            $valid = false;
        }


        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE shipment_center  set name = ?, phone = ?, address_id = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$phone,$address_id,$id));
            Database::disconnect();
            header("Location: shipment_centerIndex.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM shipment_center where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['name'];
        $phone = $data['phone'];
        $address_id = $data['address_id'];
        Database::disconnect();

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id,street_one,street_two,zipcode,city,state,country FROM address ORDER BY city";
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
                        <h3>Update a Shipment Center</h3>
                    </div>

                    <form class="form-horizontal" action="shipment_centerUpdate.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <input name="phone" type="text"  placeholder="Phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($address_idError)?'error':'';?>">
                        <label class="control-label">Address Id</label>
                        <div class="controls">
                            <select name="address_id">
                                <?php foreach($data as $row) {?><option value="<?php echo $row['id'];?>"><?php echo $row['street_one'] . " " . $row['street_two'] . " " . $row['zipcode'] . " " . $row['city'] . " " . $row['country'];?></option><?php }?>
                            </select>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="shipment_centerIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>