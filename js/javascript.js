
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
		var value=$.trim($("#searchField").val());
		if(value.length)
		{
			$( "#ajax_Output" ).html( data ).hide();
	  		$( "#Not_Ajax_Output" ).show();
		}else
		{
			$.get( "searchProducts.php?id=" + searchField.value, function( data ) {	
	  			$( "#ajax_Output" ).html( data );
	  			$( "#Not_Ajax_Output" ).hide();
			});	
		}
	});



});



