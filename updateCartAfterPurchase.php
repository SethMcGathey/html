<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];
	//$_SESSION['addressIdForPurchase'] = $_GET['addressid'];
	echo 'made it';

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction SET cart = (?) WHERE transaction_id = " . $_SESSION['transaction_id'];
    $q = $pdo->prepare($sql);
    $q->execute(array(0));
    echo 'made it 2';
    header('Location: confirmPurchase.php');

	Database::disconnect();




	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction_product SET quantity = (?) WHERE transaction_id = " . $_SESSION['transaction_id'] . " AND product_id = " . $_GET['id'];
    $q = $pdo->prepare($sql);
    $q->execute(array($quantity+1));
?>