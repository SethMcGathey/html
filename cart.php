<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>

		<div class="container" id="Not_Ajax_Output">
			<h1>cart.php</h1>


			<?php
				$sql = 'SELECT name, cost, description, quantity FROM transaction t JOIN transaction_product tp ON tp\.transaction_id = t\.id JOIN product p ON p\.id = tp\.product_id WHERE cart = 1 AND customer_ID = ' . $_SESSION['customerid'] . ' ORDER BY id';
						//$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
						foreach ($pdo->query($sql) as $row) {
						    echo '<div class="col-4-lg product" id="' . $row['a.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['b.image']) . '"width="100px"/> ' . $row['a.name'] . ' ' . $row['a.description'] . ' ' . $row['a.cost'] . ' <a href="addToCart.php?id=' . $row['a.id'] . '">Add to Cart</a></div>';
						}
			?>


			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-3"></div>
				<div class="col-lg-3"></div>
			</div>
		</div>


		<div class="container-fluid" id="ajax_Output">
		</div>

	</body>
	<?php require 'footer.php' ?>
</html>