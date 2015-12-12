
$(document).ready(function(){
	$(".myCategories").on("click", function(){

		var clickedId = this.id;
		$.get( "selectSubcategory.php?id=" + clickedId, function( data ) {
  			
  			$( "#ajax_Output" ).html( data );
		});
			
	});

});


$(document).ready(function(){
	$("#searchField").keypress(function(){
		console.log("made it " + searchField.text);
	});
});



$(document).ready(function(){
		var clickedId = this.id;
		$.get( "selectSubcategory.php?id=" + clickedId, function( data ) {
  			
  			$( "#ajax_Output" ).html( data );
		});
});
