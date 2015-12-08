<?php
     
    require '../../database.php';
 
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
/*        if (empty($firstname)) {
            $firstnameError = 'Please enter First Name';
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
            $phoneError = 'Please enter Mobile Number';
            $valid = false;
        }
*/

	// insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customer (name,email,phone) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$phone));
            Database::disconnect();
            header("Location: index.php");
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
                        <h3>Create a Customer</h3>
                    </div>

                    <form class="form-horizontal" action="create2.php" method="post">
                      <div class="control-group <?php echo !empty($fisrtnameError)?'error':'';?>">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input name="firstname" type="text"  placeholder="First Name" value="<?php echo !empty($firstname)?$firstsame:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
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
                      <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input name="phone" type="text"  placeholder="Phone Number" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($dobError)?'error':'';?>">
                        <label class="control-label">Date of Birth</label>
                        <div class="controls">
                            <input name="dob" type="text"  placeholder="Date of Birth" value="<?php echo !empty($dob)?$dob:'';?>">
                            <?php if (!empty($dobError)): ?>
                                <span class="help-inline"><?php echo $dobError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($genderError)?'error':'';?>">
                        <label class="control-label">Gender</label>
                        <div class="controls">
                            <input name="gender" type="text"  placeholder="Gender" value="<?php echo !empty($gender)?$gender:'';?>">
                            <?php if (!empty($genderError)): ?>
                                <span class="help-inline"><?php echo $genderError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="text"  placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($password)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($permissionError)?'error':'';?>">
                        <label class="control-label">Permission</label>
                        <div class="controls">
                            <input name="permission" type="text"  placeholder="Permission" value="<?php echo !empty($permission)?$permission:'';?>">
                            <?php if (!empty($permissionError)): ?>
                                <span class="help-inline"><?php echo $permissionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
                        <label class="control-label">username</label>
                        <div class="controls">
                            <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>

