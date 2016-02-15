<?php
    require '../../database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: addressIndex.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $cityError = null;
        $countryError = null;
        $stateError = null;
        $street_oneError = null;
        $street_twoError = null;
        $zipcodeError = null;

        // keep track post values
        $city = $_POST['city'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $street_one = $_POST['street_one'];
        $street_two = $_POST['street_two'];
        $zipcode = $_POST['zipcode'];

        // validate input
        $valid = true;
        if (empty($city)) {
            $cityError = 'Please enter City';
            $valid = false;
        }

        if (empty($country)) {
            $countryError = 'Please enter City';
            $valid = false;
        }

        if (empty($state)) {
            $stateError = 'Please enter State';
            $valid = false;
        }

        if (empty($street_one)) {
            $street_oneError = 'Please enter Street One';
            $valid = false;
        }

        if (empty($street_two)) {
            $street_twoError = 'Please enter street_two';
            $valid = false;
        }

        if (empty($zipcode)) {
            $zipcodeError = 'Please enter Zipcode';
            $valid = false;
        }


        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE address  set city = ?, country = ?, state = ?, street_one =?, street_two =?, zipcode =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($city,$country,$state,$street_one,$street_two,$zipcode,$id));
            Database::disconnect();
            header("Location: addressIndex.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM address where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $city = $data['city'];
        $country = $data['country'];
        $state = $data['state'];
        $street_one = $data['street_one'];
        $street_two = $data['street_two'];
        $zipcode = $data['zipcode'];
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
    <?php require '../../navigationCrud.php' ?>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Address</h3>
                    </div>

                    <form class="form-horizontal" action="addressUpdate.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <input name="city" type="text"  placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                            <?php if (!empty($cityError)): ?>
                                <span class="help-inline"><?php echo $cityError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($countryError)?'error':'';?>">
                        <label class="control-label">Country</label>
                        <div class="controls">
                            <input name="country" type="text"  placeholder="Country" value="<?php echo !empty($country)?$country:'';?>">
                            <?php if (!empty($countryError)): ?>
                                <span class="help-inline"><?php echo $countryError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
                            <?php if (!empty($stateError)): ?>
                                <span class="help-inline"><?php echo $stateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($street_oneError)?'error':'';?>">
                        <label class="control-label">Street One</label>
                        <div class="controls">
                            <input name="street_one" type="text"  placeholder="Street One" value="<?php echo !empty($street_one)?$street_one:'';?>">
                            <?php if (!empty($street_oneError)): ?>
                                <span class="help-inline"><?php echo $street_oneError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($street_twoError)?'error':'';?>">
                        <label class="control-label">Street Two</label>
                        <div class="controls">
                            <input name="street_two" type="text"  placeholder="Street Two" value="<?php echo !empty($street_two)?$street_two:'';?>">
                            <?php if (!empty($street_twoError)): ?>
                                <span class="help-inline"><?php echo $street_twoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($zipcodeError)?'error':'';?>">
                        <label class="control-label">Zipcode</label>
                        <div class="controls">
                            <input name="zipcode" type="text"  placeholder="Zipcode" value="<?php echo !empty($zipcode)?$zipcode:'';?>">
                            <?php if (!empty($zipcodeError)): ?>
                                <span class="help-inline"><?php echo $zipcodeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="addressIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
