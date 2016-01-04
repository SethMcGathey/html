<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>

		<div class="container" id="Not_Ajax_Output">
			<h1>cart.php</h1>

			<div class="row">
				<div class="col-lg-6">

				</div>
				<div class="col-lg-3">
					<p>Price</p>
				</div>
				<div class="col-lg-3">
					<p>Quantity</p>
				</div>
			</div>

			<?php
				$sql = 'SELECT p.id, name, cost, p.description, SUM(quantity) as fullQuantity, image FROM transaction t JOIN transaction_product tp ON tp.transaction_id = t.id JOIN product p ON p.id = tp.product_id JOIN image i ON i.product_id = p.id WHERE cart = 1 AND customer_ID = 3 GROUP BY id';

						foreach ($pdo->query($sql) as $row) {
						    echo '<div class="row product" id="' . $row['id']. '">' . 
						    		'<div class="col-lg-3"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px"/> </div>
						    		<div class="col-lg-3">' . $row['name'] . ' ' . $row['description'] . '</div> 
						    		<div class="col-lg-3">$' . $row['cost'] . '</div> 
						    		<div class="col-lg-3">' . $row['fullQuantity'] . '<button onclick="window.location.href=\'removeFromCart.php?productid=' . $row['id'] . '\'">Remove</button></div>
						    	  </div>
						    	';

						}
			?>
			<button onclick="window.location.href='choosePurchaseAddress.php'">Purchase</button>

		</div>


		<div class="container-fluid" id="ajax_Output">
		</div>

	</body>
	<?php require 'footer.php' ?>
</html>

















