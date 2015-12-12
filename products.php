<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<body>
		<?php require 'navigation.php' ?>
		<div class="container-fluid">
			<h1>products.php</h1>


			<?php
			$sql = 'SELECT id,name,cost,description FROM product WHERE subcategory_id = ' . $_GET["id"] . ' ORDER BY id';
			foreach ($pdo->query($sql) as $row) {
			    echo '<a href="#"><div class="col-4-lg product" id="' . $row['id']. '">' . $row['name'] . '</div></a>';
			}
			?>

			<div class="row"><div class=""></div><div></div></div>

		</div>
	</body>

	<?php require 'footer.php' ?>
</html>