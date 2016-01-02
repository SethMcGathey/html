<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-6">
					<h3>Choose Card</h3>
					<div class="scrollbox">
					<?php
						//echo $_SESSION['customerid'];
		               	$sql = "SELECT card_full_name, card_number, card_security, expires_month, expires_year FROM payment WHERE id = " . $_SESSION['paymentIdForPurchase'];
		               	echo $_SESSION['paymentIdForPurchase'] . 'blue';
		               	foreach ($pdo->query($sql) as $row) {
			               	echo '<a href="setPayment.php?paymentid=' . $row['id'] . '">
			               		  <p name="nameOnCard" id="nameOnCard">Name on Card: ' . $row['card_full_name'] . '</p>
								  <p name="cardNumber" id="cardNumber">Card Number: ' . $row['card_number'] . '</p>
								  <p name="securityCode" id="securityCode">Security Code: ' . $row['card_security'] . '</p>
								  <p name="expiration" id="expiration">Expires: ' . $row['expires_month'] . '/' . $row['expires_year'] . '</p>
								  </a>
								  <br>';
		               }
		            ?>
		        	</div>
				</div>
				<div class="col-lg-6">
					<h3>Choose Address</h3>
					<div class="scrollbox">
					<?php
						//echo $_SESSION['customerid'];
		               	$sql = "SELECT street_one, street_two, zipcode, city, state, country FROM address WHERE id = " . $_SESSION['addressIdForPurchase'];
		               	echo $_SESSION['addressIdForPurchase'] . 'yellow';
		               	foreach ($pdo->query($sql) as $row) {
			               	echo '<a href="setAddress.php?addressid=' . $row['id'] . '">
			               		  <p name="street1" id="street1">Street 1: ' . $row['street_one'] . '</p>
								  <p name="street2" id="street2">Street 2: ' . $row['street_two'] . '</p>
								  <p name="zipcode" id="zipcode">Zipcode: ' . $row['zipcode'] . '</p>
								  <p name="city" id="city">City: ' . $row['city'] . '</p>
								  <p name="state" id="state">State: ' . $row['state'] . '</p>
								  <p name="country" id="country">Country: ' . $row['country'] . '</p>
								  </a>
								  <br>';
		               }
		            ?>
		        	</div>
				</div>
			</div>
		</div>
	</body>

	<?php require 'footer.php' ?>
</html>