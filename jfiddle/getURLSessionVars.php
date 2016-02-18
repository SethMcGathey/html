<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	include 'sessionStart.php'; 
	include 'database.php';


	echo $_SESSION['projectId'];
	echo $_SESSION['branchId'];
	echo $_SESSION['commitId'];

	$URLVariables = array(
		'projectId' = $_SESSION['projectId'],
		'branchId' = $_SESSION['branchId'],
		'commitId' = $_SESSION['commitId']
	);

	echo $URLVariables;