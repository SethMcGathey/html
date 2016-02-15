<?php

    require '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $tag_idError = null;
        $product_idError = null;

        // keep track post values
        $tag_id = $_POST['tag_id'];
        $product_id = $_POST['product_id'];

        // validate input
        $valid = true;
        if (empty($tag_id)) {
            $tag_idError = 'Please enter Tag Id';
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
            $sql = "INSERT INTO product_tag (tag_id,product_id) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($tag_id, $product_id));
            Database::disconnect();
            header("Location: product_tagIndex.php");
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
                        <h3>Create a Product Tag</h3>
                    </div>

                    <form class="form-horizontal" action="product_tagCreate.php" method="post">
                      <div class="control-group <?php echo !empty($tag_idError)?'error':'';?>">
                        <label class="control-label">Tag Id</label>
                        <div class="controls">
                            <input name="tag_id" type="text"  placeholder="Tag Id" value="<?php echo !empty($tag_id)?$tag_id:'';?>">
                            <?php if (!empty($tag_idError)): ?>
                                <span class="help-inline"><?php echo $tag_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($product_idError)?'error':'';?>">
                        <label class="control-label">Product Id</label>
                        <div class="controls">
                            <input name="product_id" type="text"  placeholder="Product Id" value="<?php echo !empty($product_id)?$product_id:'';?>">
                            <?php if (!empty($product_idError)): ?>
                                <span class="help-inline"><?php echo $product_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="product_tagIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>