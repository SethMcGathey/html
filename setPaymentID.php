<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];

	header('Location: confirmPurchase.php');

	Database::disconnect();
?>