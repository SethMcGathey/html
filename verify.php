<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername=mysqli_real_escape_string($db, $_POST['username']);
	$mypassword=mysqli_real_escape_string($db, $_POST['password']);

	$sql="SELECT id, first_name FROM customer WHERE username = $myusername";

	echo 'first_name';
?>