<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];
	//$_SESSION['addressIdForPurchase'] = $_GET['addressid'];

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction SET cart = 0 WHERE id = (?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['transaction_id']));
    
    header('Location: confirmation.php');

	Database::disconnect();

?>