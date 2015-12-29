<?php include 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>

	<body>

		<?php require 'navigation.php' ?> 
		<div class="container-fluid" id="Not_Ajax_Output">
			<h1>Index.php</h1>
			<div class="row">

              <?php
               $sql = 'SELECT id,name FROM category ORDER BY id';
               foreach ($pdo->query($sql) as $row) {
	                echo '<a href="#"><div class="col-4-lg myCategories" id="' . $row['id']. '">' . $row['name'] . '</div></a>';
               }
              ?>
          	</div>
			<div class="row">
				<div class="col-4-lg" style='background-color:blue'>Games</div>
				<div class="col-4-lg" style='background-color:green'>Toys</div>
				<div class="col-4-lg" style='background-color:yellow'>Puzzles</div>
			</div>


			<div id="inner_ajax_Output">
			</div>


			<div>Content about category</div>
			<div>
				<div>image</div>
				<div>content about subcategory</div>
			</div>

			<div id='name'></div>
		
		</div>

		<div class="container-fluid" id="ajax_Output">
			<div id='name'></div>
		</div>


<?php require 'footer.php' ?>


	</body>

	
</html>





