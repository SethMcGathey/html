<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-6">
					<h1>Address</h1>
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
				<div class="col-lg-6">
					<h1>Card on record</h1>
					<form action="payment.php" method="POST">
						<p>Name on Card:</p><input type="text" placeholder="Street 1" name="street1" id="street1">
						<p>Card Number:</p><input type="text" placeholder="Street 2" name="street2" id="street2">
						<p>Security Code:</p><input type="text" placeholder="Zipcode" name="zipcode" id="zipcode">
						<p>Expiration:</p><input type="text" placeholder="City" name="city" id="city">
						<p>State:</p><input type="text" placeholder="State" name="state" id="state">
						<p>Country:</p><input type="text" placeholder="Country" name="country" id="country">
						<button>Update</button>
					</form>
				</div>
			</div>
		</div>
	</body>

	<?php require 'footer.php' ?>
</html>