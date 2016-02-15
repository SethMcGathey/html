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
					<a href="javascript:void(0);" onclick="runCode();">Run</a>
					<a href="githubAuthorization.php">Authenticate</a>
					<a href="githubCreateClient.php">Access Old File</a>
					<a href="saveScripts.php">Test PHP</a>
					<a href="javascript:void(0);" onclick="saveStrings();">Save</a>
					<a href="javascript:void(0);" onclick="forkBranch();">Fork</a>
					<a href="forkBranch.php">Fork</a>
					<a href="javascript:void(0);" onclick="zipFiles();">Zip</a>
					<a href="zipFiles.php">Zip</a>
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


							<textarea class="codepress html linenumbers-on autocomplete-on squareDivs" id="htmlDiv"  contenteditable>
		var 
							</textarea>


							<textarea class="codepress css linenumbers-on autocomplete-on squareDivs" id="cssDiv"  contenteditable>

							</textarea>

					</div><!--row-->
					<div class="row">
						<div class="col-lg-6 titleDivs">
							JAVASCRIPT
						</div>
						<div class="col-lg-6 titleDivs">
							RESULT
						</div>
						<div>
							<textarea class="codepress javascript linenumbers-on autocomplete-on squareDivs" id="javascriptDiv" contenteditable>
								
							</textarea>

							<div id="resultsDiv">
								
								<iframe id="myFrame">
										<p>Your browser does not support iframes.</p>
								</iframe>
							</div>
						</div>


					</div><!--row-->
				</div><!--col-lg-10-->

			</div><!--row-->

		</div> <!--container-fluid-->

<?php
	
	echo $_SESSION['oauth2state'];
	$_SESSION['projectId'] = $_GET['projectId'];
	$_SESSION['branchId'] = $_GET['branchId'];
	$_SESSION['commitId'] = $_GET['commitId'];
	echo $_SESSION['projectId'];
	echo $_SESSION['branchId'];
	echo $_SESSION['commitId'];
?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="js/jquery-2.1.4.min.js" type="text/javascript"> </script>
<script src="codepress/codepress.js" type="text/javascript"></script>



<!--<script src="js/jquery-1.12.0.js" type="text/javascript"> </script>-->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/github.js" type="text/javascript" ></script>
<script src="js/github.bundle.min.js" type="text/javascript" ></script>
<script src="js/javascript.js" type="text/javascript"></script>
<script src="highlighter/prettify.js"></script>


	</body>



</html>

	<!--<?php //include 'sessionStart.php' ?>
	<?php //require 'header.php' ?>-->




