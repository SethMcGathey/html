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
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE a.subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
					//$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
					foreach ($pdo->query($sql) as $row) {
					    echo '<div class="col-4-lg product" id="' . $row['a.id']. '">' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="#">Add to Cart</a></div>';
					}
				}else
				{
					$sql = 'SELECT a.id,a.name,a.cost,a.description,b.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id ORDER BY a.id LIMIT 5';
					$decoded_image=base64_decode($row['b.image']);
					console.log($decoded_image);
					foreach ($pdo->query($sql) as $row) {
					    //echo '<div class="col-4-lg product" id="' . $row['a.id'] . '">' . '<img src="data:image/jpeg;base64,' . base64_decode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="#">Add to Cart</a></div>';
					    echo '<div class="col-4-lg product" id="' . $row['a.id'] . '"> <td align=\'center\' valign=\'middle\'>' . $decoded_image . '</td> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="#">Add to Cart</a></div>';
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