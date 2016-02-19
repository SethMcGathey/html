<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	require_once 'sessionStart.php'; 
	require_once 'database.php';

    $pdo = Database::connect();


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'SELECT html, javascript, css from codeStrings where projectId = ' . $_SESSION['projectId'] . ' AND branchId = ' . $_SESSION['branchId'] . ' AND commitId = ' . $_SESSION['commitId'];
    $q = $pdo->prepare($sql);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);

    $htmlCode = $data['html'];
    $javascriptCode = $data['javascript'];
    $cssCode = $data['css'];


	$codeStrings = array(
		'html' => $htmlCode,
		'javascript' => $javascriptCode,
		'css' => $cssCode
	);

	Database::disconnect();
	echo json_encode($codeStrings);
?>