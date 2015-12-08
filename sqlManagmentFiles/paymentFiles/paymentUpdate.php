<?php
    require '../../database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: paymentIndex.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $card_full_nameError = null;
        $card_numberError = null;
        $card_securityError = null;
        $expires_monthError = null;
        $expires_yearError = null;
        $payment_type_idError = null;

        // keep track post values
        $card_full_name = $_POST['card_full_name'];
        $card_number = $_POST['card_number'];
        $card_security = $_POST['card_security'];
        $expires_month = $_POST['expires_month'];
        $expires_year = $_POST['expires_year'];
        $payment_type_id = $_POST['payment_type_id'];

        // validate input
        $valid = true;
        if (empty($card_full_name)) {
            $card_full_nameError = 'Please enter Name on Card';
            $valid = false;
        }

        if (empty($card_number)) {
            $card_numberError = 'Please enter Name on Card';
            $valid = false;
        }

        if (empty($card_security)) {
            $card_securityError = 'Please enter Security Number';
            $valid = false;
        }

        if (empty($expires_month)) {
            $expires_monthError = 'Please enter Expiration Month';
            $valid = false;
        }

        if (empty($expires_year)) {
            $expires_yearError = 'Please enter expires_year';
            $valid = false;
        }

        if (empty($payment_type_id)) {
            $payment_type_idError = 'Please enter Payment Type';
            $valid = false;
        }


        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE payment  set card_full_name = ?, card_number = ?, card_security = ?, expires_month =?, expires_year =?, payment_type_id =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type_id,$id));
            Database::disconnect();
            header("Location: paymentIndex.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM payment where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $card_full_name = $data['card_full_name'];
        $card_number = $data['card_number'];
        $card_security = $data['card_security'];
        $expires_month = $data['expires_month'];
        $expires_year = $data['expires_year'];
        $payment_type_id = $data['payment_type_id'];
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
                        <h3>Update a Payment</h3>
                    </div>

                    <form class="form-horizontal" action="paymentUpdate.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($card_full_nameError)?'error':'';?>">
                        <label class="control-label">Name on Card</label>
                        <div class="controls">
                            <input name="card_full_name" type="text"  placeholder="Name on Card" value="<?php echo !empty($card_full_name)?$card_full_name:'';?>">
                            <?php if (!empty($card_full_nameError)): ?>
                                <span class="help-inline"><?php echo $card_full_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($card_numberError)?'error':'';?>">
                        <label class="control-label">Card Number</label>
                        <div class="controls">
                            <input name="card_number" type="text"  placeholder="Card Number" value="<?php echo !empty($card_number)?$card_number:'';?>">
                            <?php if (!empty($card_numberError)): ?>
                                <span class="help-inline"><?php echo $card_numberError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($card_securityError)?'error':'';?>">
                        <label class="control-label">Security Number</label>
                        <div class="controls">
                            <input name="card_security" type="text" placeholder="Security Number" value="<?php echo !empty($card_security)?$card_security:'';?>">
                            <?php if (!empty($card_securityError)): ?>
                                <span class="help-inline"><?php echo $card_securityError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($expires_monthError)?'error':'';?>">
                        <label class="control-label">Expiration Month</label>
                        <div class="controls">
                            <input name="expires_month" type="text"  placeholder="Expiration Month" value="<?php echo !empty($expires_month)?$expires_month:'';?>">
                            <?php if (!empty($expires_monthError)): ?>
                                <span class="help-inline"><?php echo $expires_monthError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($expires_yearError)?'error':'';?>">
                        <label class="control-label">Experation Year</label>
                        <div class="controls">
                            <input name="expires_year" type="text"  placeholder="Experation Year" value="<?php echo !empty($expires_year)?$expires_year:'';?>">
                            <?php if (!empty($expires_yearError)): ?>
                                <span class="help-inline"><?php echo $expires_yearError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($payment_type_idError)?'error':'';?>">
                        <label class="control-label">Payment Type</label>
                        <div class="controls">
                            <input name="payment_type_id" type="text"  placeholder="Payment Type" value="<?php echo !empty($payment_type_id)?$payment_type_id:'';?>">
                            <?php if (!empty($payment_type_idError)): ?>
                                <span class="help-inline"><?php echo $payment_type_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="paymentIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>