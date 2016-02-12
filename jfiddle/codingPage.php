<?php  require_once 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="highlighter/prettify.css" />
	<link rel="stylesheet" href="highlight/styles/default.css">

	<link rel="stylesheet" href="codemirror/lib/codemirror.css">

	<body>
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 header">
					<a href="javascript:void(0);" onclick="passStrings();">Run</a>
					<a href="githubAuthorization.php">Authenticate</a>
					<a href="githubCreateClient.php">Access Old File</a>
					<a href="saveScripts.php">Test PHP</a>
				</div>
			</div>
			
			<div class="row">

				<div class="col-lg-2 sideBar">
					Sidebar
					<div>
						<form onSubmit="getGithubInstance()">
							Enter Github Username:<br>
							<input type="text" name="username"><br>
							Enter Github Repo Name:<br>
							<input type="text" name="reponame"><br>
							<input type="submit" value="Submit">
						</form>
					</div>
				</div>
				<div class="col-lg-10">
					<div class="row">
						<div class="col-lg-6 titleDivs">
							HTML
						</div>
						<div class="col-lg-6 titleDivs">
							CSS
						</div>


						<textarea class="col-lg-6 squareDivs prettyprint" id="htmlDiv"  contenteditable>

						</textarea>

						
						<textarea class="col-lg-6 squareDivs prettyprint" id="cssDiv"  contenteditable>

						</textarea>
					</div><!--row-->
					<div class="row">
						<div class="col-lg-6 titleDivs">
							JAVASCRIPT
						</div>
						<div class="col-lg-6 titleDivs">
							RESULT
						</div>
						<textarea class="col-lg-6 squareDivs" id="javascriptDiv" contenteditable>
							
						</textarea>
						<div class="col-lg-6 squareDivs" id="resultsDiv">
							
							<iframe id="myFrame">
									<p>Your browser does not support iframes.</p>
							</iframe>
						</div>
					</div><!--row-->
				</div><!--col-lg-10-->

			</div><!--row-->

		</div> <!--container-fluid-->

<?php

	echo $_SESSION['oauth2state'];
?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/jquery-1.12.0.js" type="text/javascript"> </script>

<script src="codemirror/lib/codemirror.js"></script>
<script src="codemirror/mode/htmlembedded/htmlembedded.js"></script>
<!--<script src="codemirror/mode/css/css.js"></script>
<script src="codemirror/mode/javascript/javascript.js"></script>-->


<!--<script src="js/jquery-2.1.4.min.js" type="text/javascript"> </script>-->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/github.js" type="text/javascript" ></script>
<script src="js/github.bundle.min.js" type="text/javascript" ></script>
<script src="js/javascript.js" type="text/javascript"></script>
<script src="highlighter/prettify.js"></script>




<script src="highlight/highlight.pack.js"></script>
<!--
<script>
prettyPrint();
$(".squareDivs").keyup(function(){
	prettyPrint();
	console.log("called function");
});
</script>-->
	</body>



</html>

	<!--<?php //include 'sessionStart.php' ?>
	<?php //require 'header.php' ?>-->




