<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-6">
					<h3>Add Card</h3>
					<form action="changePayment.php" method="POST">
						<p>Name on Card:</p><input type="text" placeholder="Name on Card" name="nameOnCard" id="nameOnCard">
						<p>Card Number:</p><input type="text" placeholder="Card Number" name="cardNumber" id="cardNumber">
						<p>Security Code:</p><input type="text" placeholder="Security Code" name="securityCode" id="securityCode">
						<p>Expiration:</p><input type="text" placeholder="Expiration" name="expiration" id="expiration">
						<button>Add Card</button>
					</form>
				</div>
				<div class="col-lg-6">
					<h3>Choose Card</h3>
					<div class="scrollbox">
					<?php
						//echo $_SESSION['customerid'];
		               	$sql = "SELECT a.id, card_full_name, card_number, card_security, expires_month, expires_year FROM customer_payment c JOIN payment a ON c.payment_id = a.id WHERE customer_id = " . $_SESSION['customerid'];
		               	foreach ($pdo->query($sql) as $row) {
			               	echo '<a href="setPaymentID.php?paymentid=' . $row['id'] . '">
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
			</div>
		</div>
	</body>

	<?php require 'footer.php' ?>
</html>