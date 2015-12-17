<?php
	include 'database.php';
    $pdo = Database::connect();

	session_start();
	$_SESSION['user'] = $user_id;
	echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername = $_POST['usernameInput'];
	$mypassword = $_POST['passwordInput'];

	//$myusername=mysqli_real_escape_string($db, $_POST['username']);
	//$mypassword=mysqli_real_escape_string($db, $_POST['password']);
	echo "<div>" . $myusername . "</div>";
	echo "<div>" . $mypassword . "</div>";
	/*
	$sql="SELECT id, first_name, password FROM customer WHERE username = " . $myusername;


	foreach ($pdo->query($sql) as $row) {
		echo "<div>garbage</div>";
		echo '<div class="col-4-lg product" id="' . $row['id']. '">' . $row['first_name'] . ' ' . $row['password'] . '</div>';
	}
	//echo 'first_name';
	Database::disconnect();
*/


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT id, first_name, password FROM customer WHERE username = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($myusername));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    echo $data[id];
    echo '<div class="col-4-lg product" id="' . $data['id'] . '">' . $data['first_name'] . ' ' . $data['password'] . '</div>';

 	Database::disconnect();

?>



