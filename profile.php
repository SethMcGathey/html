<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-3">
					<h3>Address</h3>
					<form action="address.php" method="POST">
						<p>Street 1:</p><input type="text" placeholder="Street 1" name="street1" id="street1">
						<p>Street 2:</p><input type="text" placeholder="Street 2" name="street2" id="street2">
						<p>Zipcode:</p><input type="text" placeholder="Zipcode" name="zipcode" id="zipcode">
						<p>City:</p><input type="text" placeholder="City" name="city" id="city">
						<p>State:</p><input type="text" placeholder="State" name="state" id="state">
						<p>Country:</p><input type="text" placeholder="Country" name="country" id="country">
						<button>Update</button>
					</form>
				</div>
				<div class="col-lg-3">
					<h3>Current Address</h3>
					<form action="address.php" method="POST">
						<p name="street1" id="street1"></p>
						<p name="street2" id="street2"></p>
						<p name="zipcode" id="zipcode"></p>
						<p name="city" id="city"></p>
						<p name="state" id="state"></p>
						<p name="country" id="country"></p>
					</form>
				</div>
				<div class="col-lg-3">
					<h3>New Card</h3>
					<form action="payment.php" method="POST">
						<p>Name on Card:</p><input type="text" placeholder="Name on Card" name="nameOnCard" id="nameOnCard">
						<p>Card Number:</p><input type="text" placeholder="Card Number" name="cardNumber" id="cardNumber">
						<p>Security Code:</p><input type="text" placeholder="Security Code" name="securityCode" id="securityCode">
						<p>Expiration:</p><input type="text" placeholder="Expiration" name="expiration" id="expiration">
						<button>Update</button>
					</form>
				</div>
				<div class="col-lg-3">
					<h3>Current Card on Record</h3>
					<form action="address.php" method="POST">
						<p name="nameOnCard" id="nameOnCard"></p>
						<p name="cardNumber" id="cardNumber"></p>
						<p name="securityCode" id="securityCode"></p>
						<p name="expiration" id="expiration"></p>
					</form>
				</div>
			</div>
		</div>
	</body>

	<?php require 'footer.php' ?>
</html>