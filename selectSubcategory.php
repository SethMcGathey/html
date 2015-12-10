<?php
	$sql = 'SELECT id,name,category_id FROM subcategory WHERE category_id = ';
	foreach ($pdo->query($sql) as $row) {
	    echo '<a href=""><div class="col-4-lg" id="' . $row['id']. '">' . $row['name'] . '</div></a>';
	}
?>