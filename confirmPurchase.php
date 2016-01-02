<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-6">
					<h3>Choosen Card</h3>
					<div class="scrollbox">
					<?php
						//echo $_SESSION['customerid'];
		               	$sql = "SELECT card_full_name, card_number, card_security, expires_month, expires_year FROM payment WHERE id = " . $_SESSION['paymentIdForPurchase'];
		               	foreach ($pdo->query($sql) as $row) {
			               	echo '<p name="nameOnCard" id="nameOnCard">Name on Card: ' . $row['card_full_name'] . '</p>
								  <p name="cardNumber" id="cardNumber">Card Number: ' . $row['card_number'] . '</p>
								  <p name="securityCode" id="securityCode">Security Code: ' . $row['card_security'] . '</p>
								  <p name="expiration" id="expiration">Expires: ' . $row['expires_month'] . '/' . $row['expires_year'] . '</p>
								  <br>';
		               }
		            ?>
		        	</div>
				</div>
				<div class="col-lg-6">
					<h3>Choosen Address</h3>
					<div class="scrollbox">
					<?php
						//echo $_SESSION['customerid'];
		               	$sql = "SELECT street_one, street_two, zipcode, city, state, country FROM address WHERE id = " . $_SESSION['addressIdForPurchase'];
		               	foreach ($pdo->query($sql) as $row) {
			               	echo '<p name="street1" id="street1">Street 1: ' . $row['street_one'] . '</p>
								  <p name="street2" id="street2">Street 2: ' . $row['street_two'] . '</p>
								  <p name="zipcode" id="zipcode">Zipcode: ' . $row['zipcode'] . '</p>
								  <p name="city" id="city">City: ' . $row['city'] . '</p>
								  <p name="state" id="state">State: ' . $row['state'] . '</p>
								  <p name="country" id="country">Country: ' . $row['country'] . '</p>
								  <br>';
		               }
		            ?>
		        	</div>
				</div>
			</div>
			<div class="row">
				<?php
					$sql = 'SELECT p.id, name, cost, p.description, SUM(quantity) as fullQuantity, image FROM transaction t JOIN transaction_product tp ON tp.transaction_id = t.id JOIN product p ON p.id = tp.product_id JOIN image i ON i.product_id = p.id WHERE cart = 1 AND customer_ID = 3 GROUP BY id';
						//$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id LIMIT 5';
						foreach ($pdo->query($sql) as $row) {
						    echo '<div class="col-4-lg product" id="' . $row['p.id']. '">' . '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"width="100px"/> ' . $row['name'] . ' ' . $row['description'] . ' ' . $row['cost'] . ' ' . $row['fullQuantity'] . '</div>';
						}
				?>
			</div>
			<button onclick="window.location.href='updateCartAfterPurchase.php'">Confirm Purchase</button>
		</div>
	</body>

	<?php require 'footer.php' ?>
</html>