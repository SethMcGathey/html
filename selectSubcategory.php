<?php
	include 'database.php';
    $pdo = Database::connect();
	
	$sql = 'SELECT id,name,category_id FROM subcategory WHERE category_id = ' . $_GET["id"];
	foreach ($pdo->query($sql) as $row) {
		//echo 'hello';
	    echo '<a href=""><div class="col-4-lg" id="' . $row['id']. '">' . $row['category_id']. '" "' . $row['name'] . '</div></a>';
	}

	Database::disconnect();
?>