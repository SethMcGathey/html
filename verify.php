<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	//echo $_SESSION['user'];
	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername = $_POST['usernameInput'];
	$mypassword = $_POST['passwordInput'];
	$_SESSION['user'] = $myusername;

	//$myusername=mysqli_real_escape_string($db, $_POST['username']);
	//$mypassword=mysqli_real_escape_string($db, $_POST['password']);
	//echo "<div>" . $myusername . "</div>";
	//echo "<div>" . $mypassword . "</div>";
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
	$sql="SELECT id, username, first_name, password, permission FROM customer WHERE username = ? AND password = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($myusername, $mypassword));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    if(isset($data['id']))
    {
    	//echo $data['id'];
    	//echo '<div class="col-4-lg product" id="' . $data['id'] . '">' . $data['first_name'] . ' ' . $data['password'] . '</div>';
    	
    	$_SESSION['username'] = $data['username'];
    	$_SESSION['customerid'] = $data['id'];
    	$_SESSION['permission'] = $data['permission'];
    	//echo $_SESSION['customerid'];
    	//echo $_SESSION['permission'];
    	header('Location: index.php');
    }else
    {
    	echo "Invalid Login";
    }
//print_r($_SESSION);
 	Database::disconnect();

 	

?>



