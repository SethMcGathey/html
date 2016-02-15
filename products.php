<?php include 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container-fluid" id="Not_Ajax_Output">
			<h1>products.php</h1>


			<?php
				$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
				if(isset($_GET['id']))
				{
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE a.subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
					//$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';
					}
				}else
				{
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id ORDER BY a.id LIMIT 5';
					$num = 0;
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg subcategoryColor' . $num . ' product" id="' . $row['a.id'] . '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';

				    	if($num < 1){
				    		$num++;
				    	}else
				    	{
				    		$num = 0;
				    	}
					}
				}
			?>


		</div>
		<div class="container-fluid" id="ajax_Output">

		</div>
	</body>

	<?php require 'footer.php' ?>
</html>