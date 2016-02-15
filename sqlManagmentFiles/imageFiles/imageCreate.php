<?php

    require '../../database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $descriptionError = null;
        $featuredError = null;
        $imageError = null;
        $product_idError = null;

        // keep track post values
        $description = $_POST['description'];
        $featured = $_POST['featured'];
        $image = $_POST['image'];
        $product_id = $_POST['product_id'];

        // validate input
        $valid = true;
        if (empty($description)) {
            $descriptionError = 'Please enter Description';
            $valid = false;
        }

        if (empty($featured)) {
            $featuredError = 'Please enter Featured';
            $valid = false;
        }

        if (empty($image)) {
            $imageError = 'Please enter Image';
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
            $sql = "INSERT INTO image (description,featured,image,product_id) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($description, $featured, $image,$product_id));
            Database::disconnect();
            header("Location: imageIndex.php");
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
                        <h3>Create a Image</h3>
                    </div>

                    <form class="form-horizontal" action="imageCreate.php" method="post">
                      <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($featuredError)?'error':'';?>">
                        <label class="control-label">Featured</label>
                        <div class="controls">
                            <input name="featured" type="text"  placeholder="Featured" value="<?php echo !empty($featured)?$featured:'';?>">
                            <?php if (!empty($featuredError)): ?>
                                <span class="help-inline"><?php echo $featuredError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($imageError)?'error':'';?>">
                        <label class="control-label">Image</label>
                        <div class="controls">
                            <input name="image" type="text" placeholder="Image" value="<?php echo !empty($image)?$image:'';?>">
                            <?php if (!empty($imageError)): ?>
                                <span class="help-inline"><?php echo $imageError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($product_idError)?'error':'';?>">
                        <label class="control-label">Product Id</label>
                        <div class="controls">
                            <input name="product_id" type="text"  placeholder="Product Id" value="<?php echo !empty($product_id)?$product_id:'';?>">
                            <?php if (!empty($product_idError)): ?>
                                <span class="help-inline"><?php echo $product_idError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="imageIndex.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>