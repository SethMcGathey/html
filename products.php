<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container-fluid" id="Not_Ajax_Output">
			<h1>products.php</h1>


			<?php
				PDO::ATTR_FETCH_TABLE_NAMES
				if(isset($_GET['id']))
				{
					$sql = 'SELECT a.id,name,cost,a.description,b.description, image FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
					//$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg product" id="' . $row['id']. '">' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a href="#">Add to Cart</a></div>';
					}
				}else
				{
					$sql = 'SELECT a.id,name,cost,a.description,b.description, image FROM product a LEFT JOIN image b ON a.id = b.product_id ORDER BY id LIMIT 5';
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg product" id="' . $row['id'] . '">' . $row['image'] . ' ' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a href="#">Add to Cart</a></div>';
					}
				}
			?>



			<div class="row"><div class="">testing</div><div></div></div>

		</div>
		<div class="container-fluid" id="ajax_Output">

		</div>
	</body>

	<?php require 'footer.php' ?>
</html>