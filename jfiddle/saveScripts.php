<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

    $_SESSION['html'] = 'test';
    $_SESSION['javascript'] = 'test';
    $_SESSION['css'] = 'test';
    //$_SESSION["memberId"] = 1;
	/*if($_SESSION['memberID'])
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="UPDATE codeStrings SET html = (?), javascript = (?), css = (?) WHERE  memberId = " . $_SESSION['memberID'];
	    $q = $pdo->prepare($sql);
	    $q->execute($_POST['html'], $_POST['javascript'], $_POST['css']);
	}else
	{*/
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$sql="INSERT INTO codeStrings (html, javascript, css, memberId) VALUES (" . $_GET['html'] . ", " . $_GET['javascript'] . ", " . $_GET['css'] . ", " . $_SESSION['memberId'] . ")";
	    $sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    //$q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $_SESSION['productId'], $_SESSION['branchId'], $_SESSION['commitId']));
		$q->execute(array($_SESSION['html'], $_SESSION['javascript'], $_SESSION['css'], $_SESSION['productId'], $_SESSION['branchId'], $_SESSION['commitId']));
	//}



	//header('Location: products.php');
	Database::disconnect();

	/*
		SELECT id, cart, timestamp, payment_id, customer_id FROM transaction WHERE customer_id = 3;

		SELECT * FROM transaction_product;

		SELECT * FROM product;
	*/

?>





