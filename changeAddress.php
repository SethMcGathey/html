<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

	if($_SERVER["REQUEST_METHOD"] == "POST")

	echo 'made it here';

	if(trim($_POST['street1']) != "" && trim($_POST['zipcode']) != "" && trim($_POST['city']) != "" && trim($_POST['state']) != "" && trim($_POST['country']) != "")
	{
		echo 'made it inside if';
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO address (street_one, street_two, zipcode, city, state, country) VALUES (?, ?, ?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_POST['street1'], $_POST['street2'], $_POST['zipcode'], $_POST['city'], $_POST['state'], $_POST['country']));

	    echo $pid = $pdo->lastInsertID();
	    /*$sql="SELECT ID FROM address ORDER BY ID desc LIMIT 5";
	    $data = $pdo->query($sql);

	    echo fetch_assoc($data);*/

	    /*$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="SELECT ID FROM address ORDER BY ID desc LIMIT 5";
	    $q = $pdo->prepare($sql);
	    $data = $q->execute(array($_SESSION['customerid'], 1));
	    print_r($data);*/



	    //echo $pdo::db2_last_insert_id($sql);
	    //echo mysql_insert_id();
	    //echo $_SESSION['customerid'];
	   	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO customer_address (customer_id, address_id) VALUES (?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array($_SESSION['customerid'], $pid));
	    
    	//header('Location: profile.php');
	}else
	{
		$_SESSION['ErrorMessage'] =  "Fill in all required fields.";
		//header('Location: register.php');
	}



?>