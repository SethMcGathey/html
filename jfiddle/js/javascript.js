
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

		$.ajax({
		   url: "saveScripts.php",
		   success: function(data){
		     $("#responseArea").text(data);
		   }
		 });


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
	  password: "1q2w3e4r5t6yQ",
	  auth: "basic"
	  });


	  var repo = github.getRepo('Smcgath', 'html');
	 
	  repo.listBranches(function(err, branches) { console.log(branches)});
	  /*console.log(repo);
	  repo.show(function(err, repo) {
	  	console.log("hello");
	  	console.log(repo);
	  	
	  });*/

	  //repo.read('master', 'endogtheline/index.js', function(err, data) {});
};


/******************************** Github Connections ******************************/







