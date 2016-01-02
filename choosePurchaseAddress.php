<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container" id="Not_Ajax_Output">
			<div class="row">
				<div class="col-lg-6">
					<h3>Add Address</h3>
					<form action="changeAddress.php" method="POST">
						<p>Street 1:</p><input type="text" placeholder="Street 1" name="street1" id="street1">
						<p>Street 2:</p><input type="text" placeholder="Street 2" name="street2" id="street2">
						<p>Zipcode:</p><input type="text" placeholder="Zipcode" name="zipcode" id="zipcode">
						<p>City:</p><input type="text" placeholder="City" name="city" id="city">
						<p>State:</p><input type="text" placeholder="State" name="state" id="state">
						<p>Country:</p><input type="text" placeholder="Country" name="country" id="country">
						<button>Add Address</button>
						<br>
					</form>
				</div>
				<div class="col-lg-6">
					<h3>Choose Address</h3>
					<div class="scrollbox">
					<?php
						//echo $_SESSION['customerid'];
		               	$sql = "SELECT a.id, street_one, street_two, zipcode, city, state, country FROM customer_address c JOIN address a ON c.address_id = a.id WHERE customer_id = " . $_SESSION['customerid'];
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