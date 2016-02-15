<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>

		<div class="container" id="Not_Ajax_Output">
			<h1>Register</h1>
			<?php
				echo '<div>' .  $_SESSION['ErrorMessage'] . '</div>';

				if (isset($_SESSION['myForm']) && !empty($_SESSION['myForm'])) {
				    $form_data = $_SESSION['myForm'];
				    unset($_SESSION['myForm']);
				}
			?>
			<form action="registerUser.php" method="POST">
				<p>First Name:</p><input type="text" placeholder="First Name" name="firstNameInput" id="firstNameInput" value="<?=$form_data['myForm']['firstNameInput']?>">
				<p>Last Name:</p><input type="text" placeholder="Last Name" name="lastNameInput" id="lastNameInput" value="<?=$form_data['myForm']['lastNameInput']?>">
				<p>User Name:</p><input type="text" placeholder="User Name" name="userNameInput" id="userNameInput" value="<?=$form_data['myForm']['userNameInput']?>">
				<p>Password:</p><input type="password" placeholder="Password" name="passwordInput" id="passwordInput" value="<?=$form_data['myForm']['passwordInput']?>">
				<p>Reenter Password:</p><input type="password" placeholder="Password" name="reenteredPasswordInput" id="reenteredPasswordInput" value="<?=$form_data['myForm']['reenteredPasswordInput']?>">
				<p>Phone Number:</p><input type="text" placeholder="Phone Number" name="phoneNumberInput" id="phoneNumberInput" value="<?=$form_data['myForm']['phoneNumberInput']?>">
				<p>Date of Birth:</p><input type="text" placeholder="Date of Birth" name="dobInput" id="dobInput" value="<?=$form_data['myForm']['dobInput']?>">
				<p>Gender:</p><input type="text" placeholder="Gender" name="genderInput" id="genderInput" value="<?=$form_data['myForm']['genderInput']?>">
				<p>Email:</p><input type="text" placeholder="Email" name="emailInput" id="emailInput" value="<?=$form_data['myForm']['emailInput']?>">

				<button>Log In</button>
			</form>

		</div>

	</body>

	<?php require 'footer.php' ?>
</html>