<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	//if($_SERVER["REQUEST_METHOD"] == "POST")

   	$sql = "SELECT id, cart FROM transaction WHERE customer_id = " . $_SESSION['customerid'];
   	$result = $pdo->query($sql);
   	echo $result;


	/*$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="INSERT INTO transaction (cart, timestamp, payment_id, customer_id) VALUES (?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array(1, time(), NULL, $_SESSION['customerid']));

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="INSERT INTO transaction_product (quantity, transaction_id, product_id) VALUES (?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array(1, $pdo->lastInsertID(), $_GET["id"]));*/

	Database::disconnect();

	/*
		SELECT id, cart, timestamp, payment_id, customer_id FROM transaction WHERE customer_id = 3;

		SELECT * FROM transaction_product;

		SELECT * FROM product;
	*/

?>





