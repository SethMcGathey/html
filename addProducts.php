<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>

		<div class="container" id="Not_Ajax_Output">
			<h1>Add Product</h1>
			<?php
				echo '<div>' .  $_SESSION['ErrorMessage'] . '</div>';

				if (isset($_SESSION['myForm']) && !empty($_SESSION['myForm'])) {
				    $form_data = $_SESSION['myForm'];
				    unset($_SESSION['myForm']);
				}
			?>
			<form action="backendAddProduct.php" method="POST">
				<p>Product Name:</p><input type="text" placeholder="Product Name" name="productNameInput" id="productNameInput" value="<?=$form_data['myForm']['productNameInput']?>">
				<p>Cost:</p><input type="text" placeholder="Cost" name="costInput" id="costInput" value="<?=$form_data['myForm']['costInput']?>">
				<p>Description:</p><input type="text" placeholder="Description" name="descriptionInput" id="descriptionInput" value="<?=$form_data['myForm']['descriptionInput']?>">
				<p>Subcategory:</p><input type="subcategory" placeholder="Subcategory" name="subcategoryInput" id="subcategoryInput" value="<?=$form_data['myForm']['subcategoryInput']?>">
				<p>Image:</p><input type="text" placeholder="Image" name="imageInput" id="imageInput" value="<?=$form_data['myForm']['imageInput']?>">
				<p>Shipment Center:</p><input type="text" placeholder="Shipment Center" name="shipmentCenterInput" id="shipmentCenterInput" value="<?=$form_data['myForm']['shipmentCenterInput']?>">
				<button>Create Product</button>
			</form>

		</div>

	</body>

	<?php require 'footer.php' ?>
</html>