<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	//if($_SERVER["REQUEST_METHOD"] == "POST")

    $transactionid = 0;
   	$sql = "SELECT id, cart FROM transaction WHERE customer_id = " . $_SESSION['customerid'] . ' AND cart = 1';

	foreach ($pdo->query($sql) as $row) {

		echo $transactionid = $row['id'];
		echo '<br>';
	}
	if(trim($transactionid) > 0)
	{
		$innerSql = "SELECT id, quantity FROM transaction_product WHERE product_id = " . $_GET['id'] . ' AND transaction_id = ' . $transactionid;

		foreach ($pdo->query($sql) as $row) {
			echo '<br>';
			echo $quantity = $row['quantity'];
		}

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="UPDATE transaction_product SET quantity = (?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($quantity+1));
	}else
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO transaction_product (quantity, transaction_id, product_id) VALUES (?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array(1, $transactionid, $_GET["id"]));
	}

/*
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="INSERT INTO transaction (cart, timestamp, payment_id, customer_id) VALUES (?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array(1, time(), NULL, $_SESSION['customerid']));
*/


	Database::disconnect();

	/*
		SELECT id, cart, timestamp, payment_id, customer_id FROM transaction WHERE customer_id = 3;

		SELECT * FROM transaction_product;

		SELECT * FROM product;
	*/

?>





