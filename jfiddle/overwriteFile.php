<?php
	//$myfile = fopen("test.txt","w");
error_checking(E_ALL);
	$myfile = fopen("temp.php", "w") or die("Unable to open file!");
	$txt = "Mickey Mouse\n";
	fwrite($myfile, $txt);
	$txt = "Minnie Mouse\n";
	fwrite($myfile, $txt);
	fclose($myfile);
?>