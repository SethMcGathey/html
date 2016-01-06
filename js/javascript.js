
$(document).ready(function(){
	$(".myCategories").on("click", function(){
		var clickedId = this.id;
		$.get( "selectSubcategory.php?id=" + clickedId, function( data ) {	
  			$( "#inner_ajax_Output" ).html( data );
		});	
	});
});


$(document).ready(function(){
	$("#searchField").keyup(function(){
		var clickedId = this.id;
		var value=$.trim($("#searchField").val());
		if(value.length == 0)
		{
			$( "#ajax_Output" ).hide();
	  		$( "#Not_Ajax_Output" ).show();
		}else
		{
			$.get( "searchProducts.php?id=" + searchField.value, function( data ) {	
	  			$( "#ajax_Output" ).html( data ).show();
	  			$( "#Not_Ajax_Output" ).hide();
			});	
		}
	});
});

function saveValues(){
	$.get( "verify.php?username=" + usernameInput.value + "&password=" + passwordInput.value, function( data ) {	
		$( "#" ).html(data);
	});	
}


$(".stileone").on("click", function() {
    $(this).css("background", "red");
})


$(document).ready(function(){
	$(".textboxWidth").keyup(function(){
		var clickedId = this.id;
		var value=$.trim($(".textboxWidth").val());
		if(value.length != 0)
		{
			$.get( "updateQuantity.php?quantity=" + textboxWidth.value, function( data )
		}else
		{
			$.get( "updateQuantity.php?quantity=" + searchField.value, function( data ) {	
	  			$( "#ajax_Output" ).html( data ).show();
	  			$( "#Not_Ajax_Output" ).hide();
			});	
		}
	});
});








