<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>

	<body>

		<?php require 'navigation.php' ?> 
		<div class="container-fluid">
			<h1>Index.php</h1>
			<div class="row">


				<?php
		           require 'database.php';
		           $pdo = Database::connect();
		           $sql = 'SELECT id,name FROM category ORDER BY id DESC';
		           foreach ($pdo->query($sql) as $row) {
		           		echo '<a href=""><div class="col-4-lg" id='.$row['id'].'>'. $row['name'] . '</div></a>'
		           }
		           Database::disconnect();
		        ?>



				<a href=""><div class="col-4-lg">Games</div></a>
				<a href=""><div class="col-4-lg">Toys</div></a>
				<a href=""><div class="col-4-lg">Puzzles</div></a>
			</div>

			<div>Content about category</div>
			<div>
				<div>image</div>
				<div>content about subcategory</div>
			</div>
		
		</div>

	</body>

	<?php require 'footer.php' ?>
</html>