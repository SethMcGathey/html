<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];
	//$_SESSION['addressIdForPurchase'] = $_GET['addressid'];
	echo 'made it';
	echo $_SESSION['transaction_id'];
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction SET cart = 0 WHERE id = (?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['transaction_id']));
    echo 'made it 2';
    header('Location: confirmPurchase.php');

	Database::disconnect();





?>