<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container-fluid">
			<h1>products.php</h1>


			<?php
				if(isset($_GET['id']))
				{
					$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg product" id="' . $row['id']. '">' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a>Add to Cart</a></div>';
					}
				}else
				{
					$sql = 'SELECT id,name,cost,description FROM product ORDER BY id LIMIT 5';
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg product" id="' . $row['id']. '">' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' <a>Add to Cart</a></div>';
					}
				}
			?>

			<div id="ajax_Output">
			</div>

			<div class="row"><div class="">testing</div><div></div></div>

		</div>
	</body>

	<?php require 'footer.php' ?>
</html>