<?php
	//$myfile = fopen("test.txt","w");
//error_checking(E_ALL);
var_dump(ini_get('allow_url_fopen'));
	$myfile = fopen("temp.php", "w") or die("Unable to open file!");
	$txt = "Mickey Mouse\n";
	fwrite($myfile, $txt);
	$txt = "Minnie Mouse\n";
	fwrite($myfile, $txt);
	fclose($myfile);
?>