<?php
	include 'database.php';
    $pdo = Database::connect();
	echo 'made it to this one first';
		$sql = 'SELECT id,name,cost,description FROM product WHERE name LIKE \'%' . $_GET["search"] . '%\' ORDER BY id LIMIT 5';
		foreach ($pdo->query($sql) as $row) {
		    echo '<div class="col-4-lg product" id="' . $row['id']. '">' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a href="#">Add to Cart</a></div>';
		
		}
		echo 'made it to this one';

	Database::disconnect();
?>