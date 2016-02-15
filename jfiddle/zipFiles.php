<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	require_once 'sessionStart.php'; 
	require_once 'database.php';

/*if(function_exists('exec')) {
    echo "exec is enabled";
}*/
	


/**/


	$javascriptFile = fopen("jFiddleJavascript.js", "w") or die("Unable to open file!");
	$javascript = $_POST['javascriptString'];
	//$javascript = 'junk';
	fwrite($javascriptFile, $javascript);
	fclose($javascriptFile);

	$htmlFile = fopen("jFiddleHtml.html", "w") or die("Unable to open file!");
	$html = $_POST['htmlString'];
	//$html = 'htmljunk';
	fwrite($htmlFile, $html);
	fclose($htmlFile);

	$cssFile = fopen("jFiddleCss.css", "w") or die("Unable to open file!");
	$css = $_POST['cssString'];
	//$css = 'cssjunk';
	fwrite($cssFile, $css);
	fclose($cssFile);
	
	
	/*$files = array('jFiddleJavascript.js','jFiddleHtml.html','jFiddleCss.css');
	$zipname = 'jFiddleFiles.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	foreach ($files as $file) {
	  $zip->addFile($file);
	}*/
	$zip->close();

	///Then download the zipped file.
	header('Content-Type: application/zip');
	header('Content-disposition: attachment; filename=' . $zipname);
	header('Content-Length: ' . filesize($zipname));
	
	readfile($zipname);
	//unlink($zipname);


?>
