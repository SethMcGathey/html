<?php

    require '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $phoneError = null;
        $typeError = null;
        $address_idError = null;
        $transaction_idError = null;

        // keep track post values
        $phone = $_POST['phone'];
        $type = $_POST['type'];
        $address_id = $_POST['address_id'];
        $transaction_id = $_POST['transaction_id'];

        // validate input
        $valid = true;
        if (empty($phone)) {
            $phoneError = 'Please enter Phone';
            $valid = false;
        }

        if (empty($type)) {
            $typeError = 'Please enter Type';
            $valid = false;
        }

        if (empty($address_id)) {
            $address_idError = 'Please enter Address Id';
            $valid = false;
        }

        if (empty($transaction_id)) {
            $transaction_idError = 'Please enter Transaction Id';
            $valid = false;
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO transaction_address (phone,type,address_id,transaction_id) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($phone, $type, $address_id,$transaction_id));
            Database::disconnect();
            header("Location: transaction_addressIndex.php");
        }
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
                        <h3>Create a Transaction Address</h3>
                    </div>

                    <form class="form-horizontal" action="transaction_addressCreate.php" method="post">
                      <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <input name="phone" type="text"  placeholder="Phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($typeError)?'error':'';?>">
                        <label class="control-label">Type</label>
                        <div class="controls">
                            <input name="type" type="text"  placeholder="Type" value="<?php echo !empty($type)?$type:'';?>">
                            <?php if (!empty($typeError)): ?>
                                <span class="help-inline"><?php echo $typeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($address_idError)?'error':'';?>">
                        <label class="control-label">Address Id</label>
                        <div class="controls">
                            <input name="address_id" type="text" placeholder="Address Id" value="<?php echo !empty($address_id)?$address_id:'';?>">
                            <?php if (!empty($address_idError)): ?>
                                <span class="help-inline"><?php echo $address_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($transaction_idError)?'error':'';?>">
                        <label class="control-label">Transaction Id</label>
                        <div class="controls">
                            <input name="transaction_id" type="text"  placeholder="Transaction Id" value="<?php echo !empty($transaction_id)?$transaction_id:'';?>">
                            <?php if (!empty($transaction_idError)): ?>
                                <span class="help-inline"><?php echo $transaction_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="transaction_addressIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>