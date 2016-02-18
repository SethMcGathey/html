
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
function saveStrings(){
	var htmlEditor = ace.edit("htmlDiv");
	var javascriptEditor = ace.edit("javascriptDiv");
	var cssEditor = ace.edit("cssDiv");

	var htmlString = htmlEditor.getSession().getValue();
	var javascriptString = javascriptEditor.getSession().getValue();
	var cssString = cssEditor.getSession().getValue();


	$.ajax({
		url: "saveScripts.php",
	    method: 'POST',
	   	data: { html: htmlString, javascript: javascriptString, css: cssString },
	    success: function(data){
	    	console.log("made it");
	     //$("#responseArea").text(data);
	    }
	 });

	var url = window.location.href; 
	var projectId = 0;
	var branchId = 0;
	var commitId = 0;

	$.ajax({
		url: "getURLSessionVars.php",
	    type: 'POST',
	   	data: "nothing",
	   	dataType : 'json',
	    success: function(result){
	    	projectId = result['projectId'];
	    	branchId = result['branchId'];
	    	commitId = result['commitId'];
	    	console.log("made it");
	     //$("#responseArea").text(data);
	 	},
	 	error : function() {
	 		alert("error");
	 	}
	 });

 	if (url.indexOf('?') > -1 && projectId != 0){
	   url += '&projectId=' + projectId + '&branchId=' + branchId + '&commitId=' + commitId;
	   window.location.href = url;
	}else if(projectId != 0){
	   url += '?projectId=' + projectId + '&branchId=' + branchId + '&commitId=' + commitId;
	   window.location.href = url;
	}
	window.location.href = url;
}

function forkBranch(){
	var htmlEditor = ace.edit("htmlDiv");
	var javascriptEditor = ace.edit("javascriptDiv");
	var cssEditor = ace.edit("cssDiv");

	var htmlString = htmlEditor.getSession().getValue();
	var javascriptString = javascriptEditor.getSession().getValue();
	var cssString = cssEditor.getSession().getValue();

	$.ajax({
		url: "forkBranch.php",
	    method: 'POST',
	   	data: { html: htmlString, javascript: javascriptString, css: cssString},
	    success: function(data){
	    	console.log("made it");
	     //$("#responseArea").text(data);
	    }
	 });
}

function zipFiles(){
	var htmlEditor = ace.edit("htmlDiv");
	var javascriptEditor = ace.edit("javascriptDiv");
	var cssEditor = ace.edit("cssDiv");

	var htmlString = htmlEditor.getSession().getValue();
	var javascriptString = javascriptEditor.getSession().getValue();
	var cssString = cssEditor.getSession().getValue();

	$.ajax({
		url: "zipFiles.php",
	    method: 'POST',
	   	data: { html: htmlString, javascript: javascriptString, css: cssString},
	    success: function(data){
	    	console.log("made it");
	     //$("#responseArea").text(data);
	    }
	 });

	//window.location = 'zipFiles.php?htmlString=' + htmlString + '&javascriptString=' + javascriptString + '&cssString=' + cssString;
/*
	$.get('zipFiles.php?html=' + htmlString + '&javascript=' + javascriptString + '&css=' + cssString, function(data) {
               alert('Load was performed.');
               alert(data);
               eval(data);
            });*/
}

$( document ).ready(function() {
    var htmlEditor = ace.edit("htmlDiv");
    htmlEditor.setTheme("ace/theme/monokai");
    htmlEditor.getSession().setMode("ace/mode/javascript");
    
    var htmlTextarea = $('#textHtmlDiv').hide();
    htmlEditor.getSession().setValue(htmlTextarea.val());
	htmlEditor.getSession().on('change', function(){
	  htmlTextarea.val(htmlEditor.getSession().getValue());
	});


    var javascriptEditor = ace.edit("javascriptDiv");
    javascriptEditor.setTheme("ace/theme/monokai");
    javascriptEditor.getSession().setMode("ace/mode/javascript");
    
    var javascriptTextarea = $('#textJavascriptDiv').hide();
    javascriptEditor.getSession().setValue(javascriptTextarea.val());
	javascriptEditor.getSession().on('change', function(){
	  javascriptTextarea.val(javascriptEditor.getSession().getValue());
	});


    var cssEditor = ace.edit("cssDiv");
    cssEditor.setTheme("ace/theme/monokai");
    cssEditor.getSession().setMode("ace/mode/javascript");
    
    var cssTextarea = $('#textCssDiv').hide();
    cssEditor.getSession().setValue(cssTextarea.val());
	cssEditor.getSession().on('change', function(){
	  cssTextarea.val(cssEditor.getSession().getValue());
	});

});
/*
$( document ).ready(function() {
	var editor = ace.edit("description");
	var textarea = $('textarea[name="description"]').hide();
	editor.getSession().setValue(textarea.val());
	editor.getSession().on('change', function(){
	  textarea.val(editor.getSession().getValue());
	});
});*/

function runCode(){
		/*
		var htmlString = $('#htmlDiv').text(); 
		var javascriptString = $('#javascriptDiv').text(); 
		var cssString = $('#cssDiv').text(); 
*/
		var htmlEditor = ace.edit("htmlDiv");
		var javascriptEditor = ace.edit("javascriptDiv");
		var cssEditor = ace.edit("cssDiv");

		var htmlString = htmlEditor.getSession().getValue();
		var javascriptString = javascriptEditor.getSession().getValue();
		var cssString = cssEditor.getSession().getValue();

		var id = 15;
		console.log(htmlString);
		console.log(javascriptString);
		console.log(cssString);
//url: "saveScripts.php?html=" + htmlString + "&javascript=" + javascriptString + "&css=cssString",
		//window.location = "saveScripts.php?html=" + htmlString + "&javascript=" + javascriptString + "&css=" + cssString;
		//window.location = "saveScripts.php?id=" + id;


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

/*$(".squareDivs").keyup(function(){
    var aCodes = document.getElementsByTagName('pre');
    for (var i=0; i < aCodes.length; i++) {
        hljs.highlightBlock(aCodes[i]);
    }

});*/




/*
textarea_id.text()
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







