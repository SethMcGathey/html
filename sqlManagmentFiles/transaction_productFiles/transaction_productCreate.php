<?php

    require '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $quantityError = null;
        $transaction_idError = null;
        $product_idError = null;

        // keep track post values
        $quantity = $_POST['quantity'];
        $transaction_id = $_POST['transaction_id'];
        $product_id = $_POST['product_id'];

        // validate input
        $valid = true;
        if (empty($quantity)) {
            $quantityError = 'Please enter Quantity';
            $valid = false;
        }

        if (empty($transaction_id)) {
            $transaction_idError = 'Please enter Transaction Id';
            $valid = false;
        }

        if (empty($product_id)) {
            $product_idError = 'Please enter Product Id';
            $valid = false;
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO transaction_product (quantity,transaction_id,product_id) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($quantity, $transaction_id, $product_id));
            Database::disconnect();
            header("Location: transaction_productIndex.php");
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
                        <h3>Create a Transaction Product</h3>
                    </div>

                    <form class="form-horizontal" action="transaction_productCreate.php" method="post">
                      <div class="control-group <?php echo !empty($quantityError)?'error':'';?>">
                        <label class="control-label">Quantity</label>
                        <div class="controls">
                            <input name="quantity" type="text"  placeholder="Quantity" value="<?php echo !empty($quantity)?$quantity:'';?>">
                            <?php if (!empty($quantityError)): ?>
                                <span class="help-inline"><?php echo $quantityError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($transaction_idError)?'error':'';?>">
                        <label class="control-label">Transaction Id</label>
                        <div class="controls">
                            <input name="transaction_id" type="text"  placeholder="Transaction Id" value="<?php echo !empty($transaction_id)?$transaction_id:'';?>">
                            <?php if (!empty($transaction_idError)): ?>
                                <span class="help-inline"><?php echo $transaction_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($product_idError)?'error':'';?>">
                        <label class="control-label">Product Id</label>
                        <div class="controls">
                            <input name="product_id" type="text" placeholder="Product Id" value="<?php echo !empty($product_id)?$product_id:'';?>">
                            <?php if (!empty($product_idError)): ?>
                                <span class="help-inline"><?php echo $product_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="transaction_productIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>