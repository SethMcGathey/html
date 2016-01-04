<?php include 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>

	<body>

		<?php require 'navigation.php' ?> 
		<div class="container-fluid" id="Not_Ajax_Output">
			<h1>Home Page</h1>
			<div class="row">

              <?php
               $sql = 'SELECT id,name FROM category ORDER BY id';
               foreach ($pdo->query($sql) as $row) {
	                echo '<a href="#">
	                		<div class="col-lg-4 myCategories mediumGrey" id="' . $row['id']. '">
	                			<img src="img/rrwggame.jpg" width="100px"/>' . $row['name'] . '
	                		</div>
	                	  </a>';
               }
              ?>
          	</div>

			<div id="inner_ajax_Output">
			</div>
		</div>

		<div class="container-fluid" id="ajax_Output">
		</div>


<?php require 'footer.php' ?>


	</body>

	
</html>





