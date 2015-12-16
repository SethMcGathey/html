<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername=mysqli_real_escape_string($db, $_POST['username']);
	$mypassword=mysqli_real_escape_string($db, $_POST['password']);

	$sql="SELECT id, first_name FROM customer WHERE username = $myusername";

	foreach ($pdo->query($sql) as $row) {
		echo '<div class="col-4-lg product" id="' . $row['a.id']. '">' . $row['first_name'] . '</div>';
	}
	//echo 'first_name';
?>