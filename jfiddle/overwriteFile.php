<?php
require_once 'sessionStart.php'; 
	//$myfile = fopen("test.txt","w");
//error_checking(E_ALL);

	/********************** handle user code through document *********************/
	/*$myfile = fopen("temp.php", "r") or die("Unable to open file!");
	$txt = "Mickey Mouse\n";
	fwrite($myfile, $txt);
	$txt = "Minnie Mouse\n";
	fwrite($myfile, $txt);
	fclose($myfile);*/
	/********************** handle user code through document *********************/



	$output = shell_exec('ls -lart');
	echo "<pre>$output</pre>";


/*
	$_SESSION['userId'] = 1;
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="INSERT INTO codeStrings (html, javascript, css, memberId) VALUES (" . $_GET['htmlString'] . ", " . $_GET['javascriptString'] . ", " . $_GET['cssString'] . ", " . $_SESSION[userId] . ")";
    $q = $pdo->prepare($sql);
    $q->execute();
*/

?>