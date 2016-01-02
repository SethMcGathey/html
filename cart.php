<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>

		<div class="container" id="Not_Ajax_Output">
			<h1>cart.php</h1>

			<div class="row">
				<div class="col-lg-4">

				</div>
				<div class="col-lg-4">
					<p>Price</p>
				</div>
				<div class="col-lg-4">
					<p>Quantity</p>
				</div>
			<div>

			<?php
				$sql = 'SELECT p.id, name, cost, p.description, SUM(quantity) as fullQuantity, image FROM transaction t JOIN transaction_product tp ON tp.transaction_id = t.id JOIN product p ON p.id = tp.product_id JOIN image i ON i.product_id = p.id WHERE cart = 1 AND customer_ID = 3 GROUP BY id';
						//$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
						foreach ($pdo->query($sql) as $row) {
						    echo '<div class="col-4-lg product" id="' . $row['p.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px"/> ' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' ' . $row['fullQuantity'] . '</div>';
						}
			?>
			<button onclick="window.location.href='choosePurchaseAddress.php'">Purchase</button>

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