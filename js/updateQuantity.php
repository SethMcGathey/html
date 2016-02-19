<?php

	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction_product SET quantity = " . $_GET['quantity'] . " WHERE transaction_id = " . $_SESSION['transaction_id'] . " AND product_id = " . $_GET['productid'];
    $q = $pdo->prepare($sql);
    $q->execute();

    //echo "made it";
    //header('Location: cart.php');

	Database::disconnect();

?>