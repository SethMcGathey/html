<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	if($_SERVER["REQUEST_METHOD"] == "POST")

	echo 'made it here';

	if(trim($_POST['nameOnCard']) != "" && trim($_POST['cardNumber']) != "" && trim($_POST['securityCode']) != "" && trim($_POST['expiration']) != "")
	{
		$monthYear = explode("/", $_POST['expiration']);
		echo 'made it inside if';
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO payment (card_full_name, card_number, card_security, expires_month, expires_year, payment_type) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['nameOnCard'], $_POST['cardNumber'], $_POST['securityCode'], $monthYear[0], $monthYear[1], "Visa"));

	    $pid = $pdo->lastInsertID();

	   	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO customer_payment (payment_id, customer_id) VALUES (?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($pid, $_SESSION['customerid']));
	    
    	header('Location: profile.php');
	}else
	{
		$_SESSION['ErrorMessage'] =  "Fill in all required fields.";
		header('Location: register.php');
	}



?>