<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")


	$firstName = NULL;
	$lastName = NULL;
	$username = NULL;
	$phoneNumber = NULL;
	$dob = NULL;
	$gender = NULL; 
	$email = NULL;
	$_SESSION['user'] = NULL;
	$password = NULL;
	/*echo $_POST['passwordInput'] . "<br>";
	echo $_POST['reenteredPasswordInput'] . "<br>";
	$password = $_POST['passwordInput'];*/
	echo trim($_POST['passwordInput']) . '<br>';
	if($_POST['passwordInput'] != $_POST['reenteredPasswordInput'] )
	{
		echo "Passwords do not match. <br>";
	}
	else if(trim($_POST['passwordInput']) == ""){
		echo "Please fill out password fields."
	}else
	{
		$firstName = $_POST['firstNameInput'];
		$lastName = $_POST['lastNameInput'];
		$username = $_POST['userNameInput'];
		$phoneNumber = $_POST['phoneNumberInput'];
		$dob = $_POST['dobInput'];
		$gender = $_POST['genderInput'];
		$email = $_POST['emailInput'];
		//$_SESSION['user'] = $username;
		echo "Got to the setting of variables <br>";
	}
	echo '<br> here <br>';
	echo isset($firstName);
	echo '<br> here <br>';
	//echo isset($_POST['lastNameInput']);
	//echo isset($_POST['userNameInput']);
	//echo isset($_POST['phoneNumberInput']);
	//echo isset($dob);
	//echo isset($gender);
	//echo isset($email);
	//echo isset($password);

	if(isset($firstName) && isset($lastName) && isset($username) && isset($phoneNumber) && isset($dob) && isset($gender) && isset($email) && isset($password))
	{
		echo "Got inside long if statement <br>";
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
		echo "Fill in all required fields. <br>";
	}
	echo "made it through everything <br>";
	print_r($_SESSION);
 	Database::disconnect();

 	

?>