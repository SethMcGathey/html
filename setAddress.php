<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	$_SESSION['addressIdForPurchase'] = $_GET['addressid'];

	header('Location: choosePurchasePayment.php');
	
 	Database::disconnect();
	
?>