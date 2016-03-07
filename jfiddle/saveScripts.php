<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();


	if($_SESSION['projectId'] != 0){
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $_SESSION['projectId'], $_SESSION['branchId'], $_SESSION['commitId'] + 1));

		$_SESSION['commitId'] = $_SESSION['commitId'] + 1;
	}else
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT projectId from codeStrings ORDER BY projectId DESC LIMIT 1';
	    $q = $pdo->prepare($sql);
	    $q->execute();
	    $data = $q->fetch(PDO::FETCH_ASSOC);
	    $topProjectId = $data['projectId'];


	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql="INSERT INTO codeStrings (html, javascript, css, projectId, branchId, commitId) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['html'], $_POST['javascript'], $_POST['css'], $topProjectId + 1, 1, 1));

		$_SESSION['projectId'] = $topProjectId + 1;
		$_SESSION['branchId'] = 1;
		$_SESSION['commitId'] = 1;
	}

	$URLVariables = array(
		'projectId' => $_SESSION['projectId'],
		'branchId' => $_SESSION['branchId'],
		'commitId' => $_SESSION['commitId']
	);
	Database::disconnect();
	echo json_encode($URLVariables);
	?>