<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername=mysqli_real_escape_string($db, $_POST['username']);
	$mypassword=mysqli_real_escape_string($db, $_POST['password']);

	$sql="SELECT id, first_name, password FROM customer WHERE username = $myusername";

	foreach ($pdo->query($sql) as $row) {
		echo '<div class="col-4-lg product" id="' . $row['id']. '">' . $row['first_name'] . ' ' . $row['password'] . '</div>';
	}
	//echo 'first_name';
?>