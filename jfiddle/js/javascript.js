
/*$(document).ready(function(){
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
});*/



function passStrings(){

		var htmlString = $('#htmlDiv').text(); 
		var javascriptString = $('#javascriptDiv').text(); 
		var cssString = $('#cssDiv').text(); 

		console.log(htmlString);
		console.log(javascriptString);
		console.log(cssString);


		var doc = document.getElementById('myFrame').contentWindow.document;
		doc.open();
		doc.write(htmlString);
		doc.close();

		//$('myFrame').contentWindow.document.write(htmlString);
		//window.location = "overwriteFile.php?htmlString=" + htmlString + "javascriptString=" + javascriptString + "cssString=" + cssString;

		
};















/******************************** Github Connections ******************************/
function getGithubInstance(){

	var github = new Github({
	  username: "Smcgath",
	  password: "1qaz2wsxQ",
	  auth: "basic"
	  });


	  var repo = github.getRepo(username, reponame);
	  console.log(repo);
});


/******************************** Github Connections ******************************/







