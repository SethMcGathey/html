<?php
	include 'database.php';
    $pdo = Database::connect();

		$sql = 'SELECT id,name,cost,description FROM product WHERE name LIKE \'%' . $_GET["id"] . '%\'OR description LIKE \'%' . $_GET["id"] . '%\' OR cost LIKE \'%' . $_GET["id"] . '%\' ORDER BY id LIMIT 5';
		foreach ($pdo->query($sql) as $row) {
		    echo '<div class="col-4-lg product" id="' . $row['id']. '">' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a href="#">Add to Cart</a></div>';
		
		}

	Database::disconnect();
?>