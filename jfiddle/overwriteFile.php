<?php
	//$myfile = fopen("test.txt","w");
    //error_checking(E_ALL);
	//var_dump(ini_get('allow_url_fopen'));
	//error_reporting(E_ALL);
	$myfile = fopen("temp.txt", "w") or die("Unable to open file!");
	$txt = "Mickey Mouse\n";php 
	fwrite($myfile, $txt);
	$txt = "Minnie Mouse\n";
	fwrite($myfile, $txt);
	fclose($myfile);

?>