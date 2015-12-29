<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")


	$_POST['firstNameInput'] = NULL;
	$_POST['lastNameInput'] = NULL;
	$_POST['userNameInput'] = NULL;
	$_POST['phoneNumberInput'] = NULL;
	$_POST['dobInput'] = NULL;
	$_POST['genderInput'] = NULL;
	$_POST['emailInput'] = NULL;
	$myusername = NULL;


	$password = $_POST['passwordInput'];
	$reenterPassword = $_POST['reenteredPasswordInput'];
	if($password == $reenterPassword)
	{
		$firstName = $_POST['firstNameInput'];
		$lastName = $_POST['lastNameInput'];
		$username = $_POST['userNameInput'];
		$phoneNumber = $_POST['phoneNumberInput'];
		$dob = $_POST['dobInput'];
		$gender = $_POST['genderInput'];
		$email = $_POST['emailInput'];
		$_SESSION['user'] = $myusername;
		echo "Got to the setting of variables";
	}
	else{
		echo "Passwords do not match.";
	}
	echo 'here ';
	echo isset($firstName);
	echo 'here';
	//echo isset($_POST['lastNameInput']);
	//echo isset($_POST['userNameInput']);
	//echo isset($_POST['phoneNumberInput']);
	//echo isset($dob);
	//echo isset($gender);
	//echo isset($email);
	//echo isset($password);

	if(isset($firstName) && isset($lastName) && isset($username) && isset($phoneNumber) && isset($dob) && isset($gender) && isset($email) && isset($password))
	{
		echo "Got inside long if statement";
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO customer (first_name, phone, dob, username, password, gender, permission, email, last_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($firstName, $phoneNumber, $dob, $username, $password, $gender, 1, $email, $lastName));
	    //$data = $q->fetch(PDO::FETCH_ASSOC);
    	//$_SESSION['username'] = $data['username'];
    	//$_SESSION['customerid'] = $data['id'];
    	//$_SESSION['permission'] = $data['permission'];
    	//echo $_SESSION['permission'];
    	//header('Location: login.php');
	}else
	{
		echo "Fill in all required fields.";
	}
	echo "made it through everything";
	print_r($_SESSION);
 	Database::disconnect();

 	

?>