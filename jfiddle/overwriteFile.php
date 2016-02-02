<?php
	//$myfile = fopen("test.txt","w");
//error_checking(E_ALL);
$fp = fopen('data.txt', 'wb');
if(is_writable('data.txt')){
   echo "file is writable<br>";
}
if(fwrite($fp, 'test') == FALSE){
   echo "failed to write data<br>";
}
fclose($fp);
?>