<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")

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
	}
	else{
		echo "Passwords do not match.";
	}

	if(isset($firstName) && isset($lastName) && isset($username) && isset($phoneNumber) && isset($dob) && isset($gender) && isset($email) && isset($password))
	{
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO customer (first_name, phone, dob, username, password, gender, permission, email, last_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($firstName, $phoneNumber, $dob, $username, $password, $gender, 1, $email, $lastName));
	    $data = $q->fetch(PDO::FETCH_ASSOC);

    	//$_SESSION['username'] = $data['username'];
    	//$_SESSION['customerid'] = $data['id'];
    	//$_SESSION['permission'] = $data['permission'];
    	//echo $_SESSION['permission'];
    	header('Location: index.php');
	}else
	{
		echo "Fill in all required fields.";
	}
	print_r($_SESSION);
 	Database::disconnect();

 	

?>