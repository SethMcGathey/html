$(function(){
  $('.squareDivs').css({ height: $(window).innerHeight()/2 - 30});
  $(window).resize(function(){
    $('.squareDivs').css({ height: $(window).innerHeight()/2 - 30});
  });
});


var htmlEditor = ace.edit("htmlDiv");
    htmlEditor.setTheme("ace/theme/monokai");
    htmlEditor.getSession().setMode("ace/mode/javascript");
    htmlEditor.$blockScrolling = 'Infinity';

    
    var htmlTextarea = $('#textHtmlDiv').hide();
    htmlEditor.getSession().setValue(htmlTextarea.val());
	htmlEditor.getSession().on('change', function(){
		htmlTextarea.val(htmlEditor.getSession().getValue());
	});


    var javascriptEditor = ace.edit("javascriptDiv");
    javascriptEditor.setTheme("ace/theme/monokai");
    javascriptEditor.getSession().setMode("ace/mode/javascript");
    javascriptEditor.$blockScrolling = 'Infinity';

    
    var javascriptTextarea = $('#textJavascriptDiv').hide();
    javascriptEditor.getSession().setValue(javascriptTextarea.val());
	javascriptEditor.getSession().on('change', function(){
		javascriptTextarea.val(javascriptEditor.getSession().getValue());
	});


    var cssEditor = ace.edit("cssDiv");
    cssEditor.setTheme("ace/theme/monokai");
    cssEditor.getSession().setMode("ace/mode/javascript");
    cssEditor.$blockScrolling = 'Infinity';
    
    var cssTextarea = $('#textCssDiv').hide();
    cssEditor.getSession().setValue(cssTextarea.val());
	cssEditor.getSession().on('change', function(){
		cssTextarea.val(cssEditor.getSession().getValue());
	});

function getOauth(){
/************************************ OAUTH ************************************/
OAuth.initialize('emXpUvmYMhg1zAMJNPcC8E3Z-rs');

/*
//provider can be 'facebook', 'twitter', 'github', or any supported
//provider that contain the fields 'firstname' and 'lastname' 
//or an equivalent (e.g. "FirstName" or "first-name")
var provider = 'facebook';

OAuth.popup(provider)
.done(function(result) {
	console.log('made it inside done');
    result.me()
    .done(function (response) {
        console.log('Firstname: ', response.firstname);
        console.log('Lastname: ', response.lastname);
    })
    .fail(function (err) {
        //handle error with err
    });
})
.fail(function (err) {
    //handle error with err
});
*/


//Example with Google
OAuth.redirect('google', window.location.href);
//in your callback page (can be the same page)
OAuth.callback('google').done(function(google) {
  //make API calls with `google`
}).fail(function(err) {
  //todo when the OAuth flow failed
})

/************************************ OAUTH ************************************/
}


function newProject(){
 	url = 'http://ec2-52-34-213-191.us-west-2.compute.amazonaws.com/jfiddle/codingPage.php';
 	window.location.href = url;
 }



function saveStrings(){
	var htmlEditor = ace.edit("htmlDiv");
	var javascriptEditor = ace.edit("javascriptDiv");
	var cssEditor = ace.edit("cssDiv");
	htmlEditor.$blockScrolling = 'Infinity';
	javascriptEditor.$blockScrolling = 'Infinity';
	cssEditor.$blockScrolling = 'Infinity';

	var htmlString = htmlEditor.getSession().getValue();
	var javascriptString = javascriptEditor.getSession().getValue();
	var cssString = cssEditor.getSession().getValue();



	var url = window.location.href; 
	var projectId = 0;
	var branchId = 0;
	var commitId = 0;


	$.ajax({
		url: "saveScripts.php",
	    type: 'POST',
	   	data: { html: htmlString, javascript: javascriptString, css: cssString },
	   	dataType : 'text',
	    success: function(result){
	    	console.log("made it");
	    	htmlEditor.setValue(htmlString);
	     	javascriptEditor.setValue(javascriptString);
	     	cssEditor.setValue(cssString);






	    $.ajax({
		url: "getURLSessionVars.php",
	    type: 'POST',
	   	data: "nothing",
	   	dataType : 'json',
	    success: function(result){
	    	projectId = result['projectId'];
	    	branchId = result['branchId'];
	    	commitId = result['commitId'];
	    	console.log(result);

	     	url = 'http://ec2-52-34-213-191.us-west-2.compute.amazonaws.com/jfiddle/codingPage.php?projectId=' + projectId + '&branchId=' + branchId + '&commitId=' + commitId;
		 	window.location.href = url;

	 	},
	 	error : function() {
	 		alert("error");
	 	}
	 });
	    },
	    error : function() {
	 		alert("error");
	 	}
	 });


	

}


function forkBranch(){
	var htmlEditor = ace.edit("htmlDiv");
	var javascriptEditor = ace.edit("javascriptDiv");
	var cssEditor = ace.edit("cssDiv");
	htmlEditor.$blockScrolling = 'Infinity';
	javascriptEditor.$blockScrolling = 'Infinity';
	cssEditor.$blockScrolling = 'Infinity';

	var htmlString = htmlEditor.getSession().getValue();
	var javascriptString = javascriptEditor.getSession().getValue();
	var cssString = cssEditor.getSession().getValue();

	$.ajax({
		url: "forkBranch.php",
	    method: 'POST',
	   	data: { html: htmlString, javascript: javascriptString, css: cssString},
	    success: function(data){
	    	console.log("made it");

	    	$.ajax({
				url: "getURLSessionVars.php",
			    type: 'POST',
			   	data: "nothing",
			   	dataType : 'json',
			    success: function(result){
			    	projectId = result['projectId'];
			    	branchId = result['branchId'];
			    	commitId = result['commitId'];
			    	console.log(result);

			     	url = 'http://ec2-52-34-213-191.us-west-2.compute.amazonaws.com/jfiddle/codingPage.php?projectId=' + projectId + '&branchId=' + branchId + '&commitId=' + commitId;
				 	window.location.href = url;

			 	},
			 	error : function() {
			 		alert("error");
			 	}
			 });

	    }
	 });
}


$( document ).ready(function() {


	if(window.location.search.indexOf('?') > -1){
		console.log('true ?');
		$.ajax({
			url: "getBoxValues.php",
		    method: 'GET',
		    dataType:"json",
		   	data: {},
		    success: function(dataVar){
		    	console.log(dataVar);
		    	console.log(dataVar.html);
		    	console.log(dataVar[2]);
		    	htmlEditor.setValue(dataVar.html);
		    	javascriptEditor.setValue(dataVar.javascript);
		    	cssEditor.setValue(dataVar.css);
		    	result = dataVar;

		     
		     //setCodeBoxes(result);

		    },
		    error : function() {
			 		alert("error");
			 	}
		 });
	}else{
		console.log("false ?");
	}

});




function runCode(){

		var htmlEditor = ace.edit("htmlDiv");
		var javascriptEditor = ace.edit("javascriptDiv");
		var cssEditor = ace.edit("cssDiv");
		htmlEditor.$blockScrolling = 'Infinity';
		javascriptEditor.$blockScrolling = 'Infinity';
		cssEditor.$blockScrolling = 'Infinity';

		var htmlString = htmlEditor.getSession().getValue();
		var javascriptString = javascriptEditor.getSession().getValue();
		var cssString = cssEditor.getSession().getValue();

		var id = 15;
		console.log(htmlString);
		console.log(javascriptString);
		console.log(cssString);


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

};


/******************************** Github Connections ******************************/







