
$(document).ready(function(){
	var content = "";
	var iframe = document.getElementById('iframe');

	if(iframe.contentDocument)
	{
		doc = iframe.contentDocument;
	}
	else if(iframe.contentWindow)
	{
		doc = iframe.contentWindow.document;
	}else 
	{
		doc = iframe.document;
	}

	doc.open();
	doc.writeln(result);
	doc.close();
});



function passStrings(){

		var htmlString = $('#htmlDiv').html(); 
		var javascriptString = $('#javascriptDiv').html(); 
		var cssString = $('#cssDiv').html(); 

		console.log(htmlString);
		console.log(javascriptString);
		console.log(cssString);
		//window.location = "overwriteFile.php?htmlString=" + htmlString + "javascriptString=" + javascriptString + "cssString=" + cssString;
};



