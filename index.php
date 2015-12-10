<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>

	<body>

		<?php require 'navigation.php' ?> 
		<div class="container-fluid">
			<h1>Index.php</h1>
			<div class="row">

              <?php
               $sql = 'SELECT id,name FROM category ORDER BY id';
               foreach ($pdo->query($sql) as $row) {
	                echo '<a href=""><div class="col-4-lg categories" id="' . $row['id']. '">' . $row['name'] . '</div></a>';
               }
              ?>

				<a href=""><div class="col-4-lg">Games</div></a>
				<a href=""><div class="col-4-lg">Toys</div></a>
				<a href=""><div class="col-4-lg">Puzzles</div></a>
			</div>


			<div id="ajaxOutput">
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


<script>
 $(".categories").click(function() {
      var clickedId= $(this).attr("id");
      window.location.href = "index.php?id=" + clickedId;
   });



$(document).ready(function(){
	console.log("made it");
	$(".categories").click(function(){
		var clickedId= $(this).attr("id");
		$.get( "selectSubcategory.php?id=" + clickedID, function( data ) {
  			alert( "Data Loaded: " + data );
  			document.getElementById("ajaxOutput").innerHTML = data
		});
	});
});

</script>


