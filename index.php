<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>

	<body>

		<?php require 'navigation.php' ?> 
		<div class="container-fluid">
			<h1>Index.php</h1>
			<div class="row">

              <?php
               include '../../database.php';
               $pdo = Database::connect();
               $sql = 'SELECT * FROM category ORDER BY id DESC';
               foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['name'] . '</td>';
                        echo '<td width=250>';
                        echo '<a class="btn" href="categoryRead.php?id='.$row['id'].'">Read</a>';
                        echo ' ';
                        echo '<a class="btn btn-success" href="categoryUpdate.php?id='.$row['id'].'">Update</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="categoryDelete.php?id='.$row['id'].'">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
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