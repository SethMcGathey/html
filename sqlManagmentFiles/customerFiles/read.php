<?php
    require '../../database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
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
                        <h3>Read a Customer</h3>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['first_name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['last_name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Phone</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['phone'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Date of Birth</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['dob'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['gender'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['password'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Permission</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['permission'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['username'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>


                    </div>
                </div>

    </div> <!-- /container -->
  </body>
</html>
~             