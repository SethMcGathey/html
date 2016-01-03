<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];
	//$_SESSION['addressIdForPurchase'] = $_GET['addressid'];
	

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction SET cart = 0 WHERE transaction_id = " . $_SESSION['transaction_id'];
    $q = $pdo->prepare($sql);
    $q->execute();
    echo 'made it';
    header('Location: confirmPurchase.php');

	Database::disconnect();
?>