<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	$_SESSION['ErrorMessage'] = "";

	if (!empty($_POST)) {
        foreach($_POST as $key => $value) {
            $_SESSION['myForm'][$key] = $value;
        }
        //print_r($_SESSION['myForm']);
    }
	
	$firstName = NULL;
	$lastName = NULL;
	$username = NULL;
	$phoneNumber = NULL;
	$dob = NULL;
	$gender = NULL; 
	$email = NULL;
	//$_SESSION['user'] = NULL;
	$password = NULL;
	/*echo $_POST['passwordInput'] . "<br>";
	echo $_POST['reenteredPasswordInput'] . "<br>";
	$password = $_POST['passwordInput'];*/
	//echo trim($_POST['passwordInput']) . '<br>';

	if($_POST['passwordInput'] != $_POST['reenteredPasswordInput'])
	{
		$_SESSION['ErrorMessage'] = "Passwords do not match. <br>";
		header('Location: register.php');
	/*}
	else if(trim($_POST['passwordInput']) == ""){
		$_SESSION['ErrorMessage'] = "Please fill out password fields.";
		header('Location: register.php');
		//echo "passwordInput";*/
	}else
	{
		$firstName = $_POST['firstNameInput'];
		$lastName = $_POST['lastNameInput'];
		$username = $_POST['userNameInput'];
		$phoneNumber = $_POST['phoneNumberInput'];
		$dob = $_POST['dobInput'];
		$gender = $_POST['genderInput'];
		$email = $_POST['emailInput'];
		$_SESSION['ErrorMessage'] = "";
		$password = $_POST['passwordInput'];
		//$_SESSION['user'] = $username;
		//echo "Got to the setting of variables <br>";
	//echo isset($_POST['lastNameInput']);
	//echo isset($_POST['userNameInput']);
	//echo isset($_POST['phoneNumberInput']);


		if(trim($firstName) != "" && trim($lastName) != "" && trim($username) != "" && trim($phoneNumber) != "" && trim($dob) != "" && trim($gender) != "" && trim($email) != "" && trim($password))
		{
			//echo "Got inside long if statement <br>";
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="INSERT INTO customer (first_name, phone, dob, username, password, gender, permission, email, last_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		    $q = $pdo->prepare($sql);
		    $q->execute(array($firstName, $phoneNumber, $dob, $username, $password, $gender, 1, $email, $lastName));
	    	header('Location: login.php');
		}else
		{
			$_SESSION['ErrorMessage'] =  "Fill in all required fields.";
			header('Location: register.php');
		}
	}

	//echo "made it through everything <br>";
	echo $_SESSION['ErrorMessage'];
	//print_r($_SESSION);
 	Database::disconnect();

?>
