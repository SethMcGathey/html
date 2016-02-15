<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	include 'sessionStart.php'; 
	include 'database.php';

	$javascriptFile = fopen("jFiddleJavascript.js", "w") or die("Unable to open file!");
	$htmlFile = fopen("jFiddleHtml.html", "w") or die("Unable to open file!");
	$cssFile = fopen("jFiddleCss.css", "w") or die("Unable to open file!");
	$javascript = $_POST['javascriptString'];
	$html = $_POST['htmlString'];
	$css = $_POST['cssString'];
	fwrite($javascriptFile, $javascript);
	fwrite($htmlFile, $html);
	fwrite($cssFile, $css);
	fclose($javascriptFile);
	fclose($htmlFile);
	fclose($cssFile);

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
	
	ob_clean();
	flush();
	
	readfile($zipname);
	
	unlink($filename);

?>