<?php  require_once 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<!--<link rel="stylesheet" href="highlighter/prettify.css" />
	<link rel="stylesheet" href="highlight/styles/default.css">

	<link rel="stylesheet" href="codemirror/lib/codemirror.css">-->

	<body>
		<div class="container-fluid">
			<form action='zipFiles.php' method="Post">
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
						<input type="submit" id="zipForm" placeholder="Zip" />
					</div>
				</div>
				
				<div class="row">

					<div class="col-lg-2 sideBar">
						Sidebar
						<div>
							<!--<form onSubmit="getGithubInstance()">
								Enter Github Username:<br>
								<input type="text" name="username"><br>
								Enter Github Repo Name:<br>
								<input type="text" name="reponame"><br>
								<input type="submit" value="Submit">
							</form>-->
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
								<textarea name="textHtmlString" id="textHtmlDiv"></textarea>
								<div type="text" name="htmlString" form="zipForm" class="col-lg-6 squareDivs" id="htmlDiv">
								</div>
								<textarea name="textCssString" id="textCssDiv"></textarea>
								<div type="text" name="cssString" form="zipForm" class="col-lg-6 squareDivs" id="cssDiv">
								</div>

						</div><!--row-->
						<div class="row">
							<div class="col-lg-6 titleDivs">
								JAVASCRIPT
							</div>
							<div class="col-lg-6 titleDivs">
								RESULT
							</div>
							<div>
								<textarea name="textJavascriptString" id="textJavascriptDiv"></textarea>
								<div type="text" name="javascriptString" form="zipForm" class="col-lg-6 squareDivs" id="javascriptDiv">
								</div>

								<div id="resultsDiv" class="col-lg-6">
									
									<iframe id="myFrame">
											<p>Your browser does not support iframes.</p>
									</iframe>
								</div>
							</div>


						</div><!--row-->
					</div><!--col-lg-10-->

				</div><!--row-->
			</form>
		</div> <!--container-fluid-->

<?php
	
	echo $_SESSION['oauth2state'];
	/*if(isset($_GET['projectId']))
	{
		$_SESSION['projectId'] = $_GET['projectId'];
	}else
	{
		$_SESSION['projectId'] = 0;
	}
	if(isset($_GET['branchId']))
	{
		$_SESSION['branchId'] = $_GET['branchId'];
	}else
	{
		$_SESSION['branchId'] = 0;
	}
	if(isset($_GET['commitId']))
	{
		$_SESSION['commitId'] = $_GET['commitId'];
	}else
	{
		$_SESSION['commitId'] = 0;
	}*/
$_SESSION['projectId'] = $_GET['projectId'];
$_SESSION['branchId'] = $_GET['branchId'];
$_SESSION['commitId'] = $_GET['commitId'];
	echo $_SESSION['projectId'];
	echo $_SESSION['branchId'];
	echo $_SESSION['commitId'];
	echo $_SESSION['javascriptCode'];
?>


<script src="ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="js/jquery-2.1.4.min.js" type="text/javascript"> </script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!--<script src="js/jquery-1.12.0.js" type="text/javascript"> </script>-->
<script src="codepress/codepress.js" type="text/javascript"></script>




<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="js/github.js" type="text/javascript" ></script>
<script src="js/github.bundle.min.js" type="text/javascript" ></script>-->
<script src="js/javascript.js" type="text/javascript"></script>
<!--<script src="highlighter/prettify.js"></script>-->


	</body>



</html>

	<!--<?php //include 'sessionStart.php' ?>
	<?php //require 'header.php' ?>-->




