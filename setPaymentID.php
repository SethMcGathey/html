<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")

	$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];
	echo $_GET['paymentid'];
	//header('Location: confirmPurchase.php');

	
?>