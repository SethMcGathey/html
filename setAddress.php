<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")
		$junk = 'set junk';
	
	$_SESSION['addressIdForPurchase'] = $_GET['addressid'];
	//echo $_GET['addressid'];
	echo $_SESSION['addressIdForPurchase'];
	echo $_GET['addressid'];
	//header('Location: choosePurchasePayment.php');
 	Database::disconnect();
	
?>