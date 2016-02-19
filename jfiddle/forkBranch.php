<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	require_once 'sessionStart.php'; 
	require_once 'database.php';

    $pdo = Database::connect();

/*	$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
	$sql = 'SELECT branchId from codeStrings where projectId = ' . $_SESSION['projectId'] . ' ORDER BY branchId DESC LIMIT 1';
	$q = $pdo->prepare($sql);
	$q->execute();
	$data = $q->fetch(PDO::FETCH_ASSOC);
	//print_r($pdo);
	//echo $data['branchId'];
	$topBranchId = $data['branchId'];
	echo $topBranchId;
*/




    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'SELECT branchId from codeStrings where projectId = ' . $_SESSION['projectId'] . ' ORDER BY branchId DESC LIMIT 1';
    $q = $pdo->prepare($sql);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $topBranchId = $data['branchId'];





	/*foreach ($pdo->query($sql) as $row) {
		$topBranchId =  $row['branchId'];
		echo $topBranchId;
	}*/


	$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
	$sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $_SESSION['productId'], $_SESSION['branchId'] + 1, 1));

	$_SESSION['branchId'] = ['branchId'] + 1;
	$_SESSION['commitId'] = 1;

	Database::disconnect();
?>
<!--
SELECT branchId FROM `codeStrings` WHERE projectId = 1 
-->