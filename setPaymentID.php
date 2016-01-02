<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")

	$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];
	echo $_GET['paymentid'];
	echo $_SESSION['paymentIdForPurchase'];
	//header('Location: confirmPurchase.php');

	Database::disconnect();
?>