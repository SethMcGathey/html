<!--<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 'on');
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

    //$_SESSION["memberId"] = 1;
	/*if($_SESSION['memberID'])
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="UPDATE codeStrings SET html = (?), javascript = (?), css = (?) WHERE  memberId = " . $_SESSION['memberID'];
	    $q = $pdo->prepare($sql);
	    $q->execute($_POST['html'], $_POST['javascript'], $_POST['css']);
	}else
	{*/

		//http://ec2-52-34-213-191.us-west-2.compute.amazonaws.com/jfiddle/codingPage.php

/*		if($_SESSION['projectId'] == 0)
		{

			$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
	    	$sql = 'SELECT projectId from codeStrings ORDER BY projectId DESC LIMIT 1';
			foreach ($pdo->query($sql) as $row) {
				$topBranchId =  $row['branchId'] 
			}


			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$sql="INSERT INTO codeStrings (html, javascript, css, memberId) VALUES (" . $_GET['html'] . ", " . $_GET['javascript'] . ", " . $_GET['css'] . ", " . $_SESSION['memberId'] . ")";
		    $sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
		    $q = $pdo->prepare($sql);
		    $q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $_SESSION['projectId'], $_SESSION['branchId'], $_SESSION['commitId']+1));
		}
*/

/*		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$sql="INSERT INTO codeStrings (html, javascript, css, memberId) VALUES (" . $_GET['html'] . ", " . $_GET['javascript'] . ", " . $_GET['css'] . ", " . $_SESSION['memberId'] . ")";
	    $sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $_SESSION['projectId'], $_SESSION['branchId'], $_SESSION['commitId']+1));
	//}



	//header('Location: products.php');
	Database::disconnect();

	/*
		SELECT id, cart, timestamp, payment_id, customer_id FROM transaction WHERE customer_id = 3;

		SELECT * FROM transaction_product;

		SELECT * FROM product;
	*/

?>-->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

    //$_SESSION["memberId"] = 1;
	/*if($_SESSION['memberID'])
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="UPDATE codeStrings SET html = (?), javascript = (?), css = (?) WHERE  memberId = " . $_SESSION['memberID'];
	    $q = $pdo->prepare($sql);
	    $q->execute($_POST['html'], $_POST['javascript'], $_POST['css']);
	}else
	{*/


	if($_SESSION['projectId'] != 0){
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$sql="INSERT INTO codeStrings (html, javascript, css, memberId) VALUES (" . $_GET['html'] . ", " . $_GET['javascript'] . ", " . $_GET['css'] . ", " . $_SESSION['memberId'] . ")";
	    $sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $_SESSION['projectId'], $_SESSION['branchId'], $_SESSION['commitId'] + 1));
	}else
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT projectId from codeStrings ORDER BY branchId DESC LIMIT 1';
	    $q = $pdo->prepare($sql);
	    $q->execute();
	    $data = $q->fetch(PDO::FETCH_ASSOC);
	    $topProjectId = $data['projectId'];


	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$sql="INSERT INTO codeStrings (html, javascript, css, memberId) VALUES (" . $_GET['html'] . ", " . $_GET['javascript'] . ", " . $_GET['css'] . ", " . $_SESSION['memberId'] . ")";
	    $sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $_SESSION['projectId'] + 1, 1, 1));
	
	}
	//}



	//header('Location: products.php');
	Database::disconnect();

	/*
		SELECT id, cart, timestamp, payment_id, customer_id FROM transaction WHERE customer_id = 3;

		SELECT * FROM transaction_product;

		SELECT * FROM product;
	*/

?>



