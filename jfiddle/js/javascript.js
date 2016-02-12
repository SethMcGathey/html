
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
		var id = 15;
		console.log(htmlString);
		console.log(javascriptString);
		console.log(cssString);
//url: "saveScripts.php?html=" + htmlString + "&javascript=" + javascriptString + "&css=cssString",
		//window.location = "saveScripts.php?html=" + htmlString + "&javascript=" + javascriptString + "&css=" + cssString;
		//window.location = "saveScripts.php?id=" + id;
		$.ajax({
			url: "saveScripts.php",
		    method: 'POST',
		   	data: { html: htmlString, javascript: javascriptString, css: cssString},
		    success: function(data){
		    	console.log("made it");
		     //$("#responseArea").text(data);
		    }
		 });

		var string1 = "<html> <head> <style> ";
		var string2 = "</style> </head> <body> ";
		var string3 = "<script type=\'text/javascript\'> ";
		var string4 = "</script>"
		var string5 = "<script src=\'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\'></script>";
		var string6 = "<script src=\'js/bootstrap.min.js\' type=\'text/javascript\'></script>";
		var string7 = " </body> </html>";





		var doc = document.getElementById('myFrame').contentWindow.document;
		doc.open();
		doc.write(string1 + cssString + string2 + htmlString + string3 + javascriptString + string4);
		doc.close();
		console.log(string1 + cssString + string2 + htmlString + string3 + javascriptString + string4 + string5 + string6);

		//$('myFrame').contentWindow.document.write(htmlString);
		//window.location = "overwriteFile.php?htmlString=" + htmlString + "javascriptString=" + javascriptString + "cssString=" + cssString;

		
};

$(".squareDivs").keyup(function(){
    var aCodes = document.getElementsByTagName('pre');
    for (var i=0; i < aCodes.length; i++) {
        hljs.highlightBlock(aCodes[i]);
    }

});

window.onload = function() {

};

var myTextArea = 'pre';
var myCodeMirror = CodeMirror.fromTextArea(myTextArea);


/*
$.ajax({
    url: 'http://localhost/test.php',
    type: 'GET',
     data: { var_PHP_data: var_data },
     success: function(data) {
         // do something;
        $('#result').html(data)
     }
 });

*/









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







