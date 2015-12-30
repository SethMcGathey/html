<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>

		<div class="container" id="Not_Ajax_Output">
			<h1>Register</h1>
			<?php
				echo '<div>' .  $_SESSION['ErrorMessage'] . '</div>';
			?>
			<form action="registerUser.php" method="POST">
				<p>First Name:</p><input type="text" placeholder="First Name" name="firstNameInput" id="firstNameInput">
				<p>Last Name:</p><input type="text" placeholder="Last Name" name="lastNameInput" id="lastNameInput">
				<p>User Name:</p><input type="text" placeholder="User Name" name="userNameInput" id="userNameInput">
				<p>Password:</p><input type="password" placeholder="Password" name="passwordInput" id="passwordInput">
				<p>Reenter Password:</p><input type="password" placeholder="Password" name="reenteredPasswordInput" id="reenteredPasswordInput">
				<p>Phone Number:</p><input type="text" placeholder="Phone Number" name="phoneNumberInput" id="phoneNumberInput">
				<p>Date of Birth:</p><input type="text" placeholder="Date of Birth" name="dobInput" id="dobInput">
				<p>Gender:</p><input type="text" placeholder="Gender" name="genderInput" id="genderInput">
				<p>Email:</p><input type="text" placeholder="Email" name="emailInput" id="emailInput">

				<button>Log In</button>
			</form>

		</div>

	</body>

	<?php require 'footer.php' ?>
</html>