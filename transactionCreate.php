<?php

    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $cartError = null;
        $timestampError = null;
        $payment_IDError = null;
        $customer_IDError = null;

        // keep track post values
        $cart = $_POST['cart'];
        $timestamp = $_POST['timestamp'];
        $payment_ID = $_POST['payment_ID'];
        $customer_ID = $_POST['customer_ID'];

        // validate input
        $valid = true;
        if (empty($cart)) {
            $cartError = 'Please enter Cart';
            $valid = false;
        }

        if (empty($timestamp)) {
            $timestampError = 'Please enter Timestamp';
            $valid = false;
        }

        if (empty($payment_ID)) {
            $payment_IDError = 'Please enter Payment Id';
            $valid = false;
        }

        if (empty($customer_ID)) {
            $customer_IDError = 'Please enter Customer Id';
            $valid = false;
        }


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO transaction (cart,timestamp,payment_ID,customer_ID) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($cart, $timestamp, $payment_ID,$customer_ID));
            Database::disconnect();
            header("Location: transactionIndex.php");
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
                        <h3>Create a Transaction</h3>
                    </div>

                    <form class="form-horizontal" action="transactionCreate.php" method="post">
                      <div class="control-group <?php echo !empty($cartError)?'error':'';?>">
                        <label class="control-label">Cart</label>
                        <div class="controls">
                            <input name="cart" type="text"  placeholder="Cart" value="<?php echo !empty($cart)?$cart:'';?>">
                            <?php if (!empty($cartError)): ?>
                                <span class="help-inline"><?php echo $cartError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($timestampError)?'error':'';?>">
                        <label class="control-label">Timestamp</label>
                        <div class="controls">
                            <input name="timestamp" type="text"  placeholder="Timestamp" value="<?php echo !empty($timestamp)?$timestamp:'';?>">
                            <?php if (!empty($timestampError)): ?>
                                <span class="help-inline"><?php echo $timestampError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($payment_IDError)?'error':'';?>">
                        <label class="control-label">Payment Id</label>
                        <div class="controls">
                            <input name="payment_ID" type="text" placeholder="Payment Id" value="<?php echo !empty($payment_ID)?$payment_ID:'';?>">
                            <?php if (!empty($payment_IDError)): ?>
                                <span class="help-inline"><?php echo $payment_IDError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($customer_IDError)?'error':'';?>">
                        <label class="control-label">Customer Id</label>
                        <div class="controls">
                            <input name="customer_ID" type="text"  placeholder="Customer Id" value="<?php echo !empty($customer_ID)?$customer_ID:'';?>">
                            <?php if (!empty($customer_IDError)): ?>
                                <span class="help-inline"><?php echo $customer_IDError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="transactionIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>