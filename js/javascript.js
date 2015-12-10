
 /*$(".categories").click(function() {
      var clickedId= $(this).attr("id");
      window.location.href = "index.php?id=" + clickedId;
   });*/



$(document).ready(function(){
	$(".myCategories").on("click", function(){

		var clickedId = this.id;
		$.get( "selectSubcategory.php?id=" + clickedId, function( data ) {
  			
  			$( "#ajax_Output" ).html( data );
		});
			
	});

});
