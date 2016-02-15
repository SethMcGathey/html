<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	include 'sessionStart.php'; 
	include 'database.php';

	$myfile = fopen("jFiddleJavascript.js", "w") or die("Unable to open file!");
	$txt = "John Doe\n";
	fwrite($myfile, $txt);
	$txt = "Jane Doe\n";
	fwrite($myfile, $txt);
	fclose($myfile);

	$files = array('jFiddleJavascript.js','jFiddleHtml.html','jFiddleCss.css');
	$zipname = 'jFiddleFiles.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	foreach ($files as $file) {
	  $zip->addFile($file);
	}
	$zip->close();

	///Then download the zipped file.
	header('Content-Type: application/zip');
	header('Content-disposition: attachment; filename=' . $zipname);
	header('Content-Length: ' . filesize($zipname));
	readfile($zipname);

?>