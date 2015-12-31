<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")

	echo 'made it here';
	/*$_POST['street1'];
	$_POST['street2'];
	$_POST['zipcode'];
	$_POST['city'];
	$_POST['state'];
	$_POST['country'];*/

	if(trim($_POST['street1']) != "" && trim($_POST['zipcode']) != "" && trim($_POST['city']) != "" && trim($_POST['state']) != "" && trim($_POST['country']) != "")
	{
		echo 'made it inside if';
		//echo "Got inside long if statement <br>";
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO address (street_one, street_two, zipcode, city, state, country) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['street1'], $_POST['street2'], $_POST['zipcode'], $_POST['city'], $_POST['state'], $_POST['country']));

	   	$pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql2="INSERT INTO customer_address (customer_id, address_id) VALUES (?, ?)";
	    $q2 = $pdo2->prepare($sql2);
	    $q2->execute(array($_SESSION['customerid'], mysql_insert_id());
	    
    	//header('Location: profile.php');
	}else
	{
		$_SESSION['ErrorMessage'] =  "Fill in all required fields.";
		//header('Location: register.php');
	}



?>