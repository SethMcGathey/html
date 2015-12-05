<?php
    require 'database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $firstnameError = null;
        $lastnameError = null;
        $emailError = null;
        $phoneError = null;
        $dobError = null;
        $genderError = null;
        $passwordError = null;
        $permissionError = null;
        $usernameError = null;

        // keep track post values
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $permission = $_POST['permission'];
        $username = $_POST['username'];

        // validate input
        $valid = true;
        if (empty($firstname)) {
            $firstnameError = 'Please enter First Name';
            $valid = false;
        }

        if (empty($lastname)) {
            $lastnameError = 'Please enter First Name';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }

        if (empty($phone)) {
            $phoneError = 'Please enter Phone Number';
            $valid = false;
        }

        if (empty($dob)) {
            $dobError = 'Please enter Date of Birth';
            $valid = false;
        }

        if (empty($gender)) {
            $genderError = 'Please enter Gender';
            $valid = false;
        }

        if (empty($password)) {
            $passwordError = 'Please enter Password';
            $valid = false;
        }

        if (empty($permission)) {
            $permissionError = 'Please enter Permission';
            $valid = false;
        }

        if (empty($username)) {
            $usernameError = 'Please enter Username';
            $valid = false;
        }


        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE customer  set firstname = ?, lastname = ?, email = ?, phone =?, dob =?, gender =?, password =?, permission =?, username =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($firstname,$lastname,$email,$phone,$dob,$gender,$password,$permission,$username,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $phone = $data['phone'];
        $email = $data['email'];
        $dob = $data['dob'];
        $gender = $data['gender'];
        $password = $data['password'];
        $permission = $data['permission'];
        $username = $data['username'];
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
                        <h3>Update a Customer</h3>
                    </div>

                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($firstnameError)?'error':'';?>">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input name="firstname" type="text"  placeholder="First Name" value="<?php echo !empty($firstname)?$firstname:'';?>">
                            <?php if (!empty($firstnameError)): ?>
                                <span class="help-inline"><?php echo $firstnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($lastnameError)?'error':'';?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input name="lastname" type="text"  placeholder="Last Name" value="<?php echo !empty($lastname)?$lastname:'';?>">
                            <?php if (!empty($lastnameError)): ?>
                                <span class="help-inline"><?php echo $lastnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
>
                      </div>

                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
~        