<?php
	include 'sessionStart.php'; 
	include 'database.php';
    $pdo = Database::connect();

    	$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);

		$sql = 'SELECT a.id,a.name,a.cost,a.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE a.name LIKE \'%' . $_GET["id"] . '%\' OR a.description LIKE \'%' . $_GET["id"] . '%\' OR a.cost LIKE \'%' . $_GET["id"] . '%\' ORDER BY a.id LIMIT 5';
		$num = 0;
		foreach ($pdo->query($sql) as $row) {
		    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="#">Add to Cart</a></div>';
		    if($num < 1){
	    		$num++;
	    	}else
	    	{
	    		$num = 0;
	    	}
		}

	Database::disconnect();
?>