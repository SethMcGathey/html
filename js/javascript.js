
$(document).ready(function(){
	$(".myCategories").on("click", function(){
		var clickedId = this.id;
		$.get( "selectSubcategory.php?id=" + clickedId, function( data ) {	
  			$( "#ajax_Output" ).html( data );
		});	
	});
});


$(document).ready(function(){
	$("#searchField").keyup(function(){
		console.log("made it " + searchField.value);
		var clickedId = this.id;
		$.get( "searchProducts.php?id=" + searchField.value, function( data ) {	
  			$( "#ajax_Output" ).html( data );
		});	
	});
});



