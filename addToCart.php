<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	//if($_SERVER["REQUEST_METHOD"] == "POST")

    $_SESSION['transaction_id'] = 0;
   	$sql = "SELECT id, cart FROM transaction WHERE customer_id = " . $_SESSION['customerid'] . ' AND cart = 1';

	foreach ($pdo->query($sql) as $row) {
		$_SESSION['transaction_id'] = $row['id'];
		//$transactionid = $row['id'];
	}
	Database::disconnect();

	$pdo = Database::connect();
	if(trim($_SESSION['transaction_id']) > 0)
	{
		$sql = "SELECT id, quantity FROM transaction_product WHERE product_id = " . $_GET['id'] . ' AND transaction_id = ' . $_SESSION['transaction_id'];

		foreach ($pdo->query($sql) as $row) {
			$row['id'];
			$quantity = $row['quantity'];
		}
		if($quantity > 0)
		{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="UPDATE transaction_product SET quantity = (?) WHERE transaction_id = " . $_SESSION['transaction_id'] . " AND product_id = " . $_GET['id'];
		    $q = $pdo->prepare($sql);
		    $q->execute(array($quantity+1));
		}else
		{
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="INSERT INTO transaction_product (quantity, transaction_id, product_id) VALUES (?, ?, ?)";
		    $q = $pdo->prepare($sql);
		    $q->execute(array(1, $_SESSION['transaction_id'], $_GET["id"]));
		}
	}else
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO transaction (cart, timestamp, payment_id, customer_id) VALUES (?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array(1, time(), NULL, $_SESSION['customerid']));
	}


	header('Location: products.php');
	Database::disconnect();

	/*
		SELECT id, cart, timestamp, payment_id, customer_id FROM transaction WHERE customer_id = 3;

		SELECT * FROM transaction_product;

		SELECT * FROM product;
	*/

?>





