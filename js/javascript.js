
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

/*
$(document).ready(function(){
	$(".textboxWidth").keyup(function(){
		
		var clickedId = this.id;
		var value=$.trim($(".textboxWidth").val());
		var productid=$.trim($(".textboxWidth").data("arbitraryName"));
		console.log(productid);
		if(value.length != 0)
		{
			window.location = "updateQuantity.php?quantity=" + value + "productid=" + productid;
			/*$.get( "updateQuantity.php?quantity=" + value, function( data ){
				console.log("made it 1");
			});
			console.log("made it 2");*/
		/*}else
		{
			//window.location = "updateQuantity.php?quantity=" + value;
			/*$.get( "updateQuantity.php?quantity=" + value, function( data ) {	
				console.log("made it 3");
	  			//$( "#ajax_Output" ).html( data ).show();
	  			//$( "#Not_Ajax_Output" ).hide();
			});	
			console.log("made it 4");*/
		/*}
	});
});*/

function changeQuantity(quantity, id, transaction_id){
	console.log('made it to function');
	$.ajax({
			url: "updateQuantity.php",
		    method: 'GET',
		    //dataType:"json",
		   	data: {quantity, id, transaction_id},
		    success: function(){
		    	console.log('madeit');
		    	//14 transaction_id
		    	/*console.log(dataVar);
		    	console.log(dataVar.html);
		    	console.log(dataVar[2]);
		    	htmlEditor.setValue(dataVar.html);
		    	javascriptEditor.setValue(dataVar.javascript);
		    	cssEditor.setValue(dataVar.css);
		    	result = dataVar;*/
		     //$("#responseArea").text(data);
		     
		     //setCodeBoxes(result);

		    },
		    error : function() {
			 		alert("error");
			 	}
		 });


}



