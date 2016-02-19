<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	include 'sessionStart.php'; 
	include 'database.php';


	$URLVariables = array(
		'projectId' => $_SESSION['projectId'],
		'branchId' => $_SESSION['branchId'],
		'commitId' => $_SESSION['commitId'],
	);
	//echo json_encode($_SESSION['projectId']);
	echo json_encode($URLVariables);

?>