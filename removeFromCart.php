<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];
	//$_SESSION['addressIdForPurchase'] = $_GET['addressid'];
	echo 'made it';
	echo $_SESSION['transaction_id'];

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="DELETE transaction_product WHERE transaction_id = " . $_SESSION['transaction_id'] . " AND product_id = " . $_GET['productid'];
    $q = $pdo->prepare($sql);
    $q->execute();
    echo 'made it 2';
    //header('Location: confirmation.php');

	Database::disconnect();





?>