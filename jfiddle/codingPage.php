<?php  require_once 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<body>
		<div class="container-fluid">
			<form action='zipFiles.php' method="Post">
				<div class="row">
					<div class="col-lg-12 header">
						<a href="javascript:void(0);" onclick="runCode();">Run </a>
						<a href="javascript:void(0);" onclick="saveStrings();">Save </a>
						<a href="javascript:void(0);" onclick="forkBranch();">Fork </a>
						<input type="submit" id="zipForm" value="Zip" />
					</div>
				</div>
				
				<!--<div class="row">
					<div class="col-lg-12">-->
						<!--<div class="row">-->
							<div class=" titleDivs">
								HTML
							</div>
							<div class=" titleDivs">
								CSS
							</div>
								<textarea name="textHtmlString" id="textHtmlDiv"></textarea>
								<div type="text" name="htmlString" form="zipForm" class=" squareDivs" id="htmlDiv">
								</div>
								<textarea name="textCssString" id="textCssDiv"></textarea>
								<div type="text" name="cssString" form="zipForm" class=" squareDivs" id="cssDiv">
								</div>

						<!--</div>row-->
						<!--<div class="row">-->
							<div class=" titleDivs">
								JAVASCRIPT
							</div>
							<div class=" titleDivs">
								RESULT
							</div>
							<div>
								<textarea name="textJavascriptString" id="textJavascriptDiv"></textarea>
								<div type="text" name="javascriptString" form="zipForm" class="squareDivs" id="javascriptDiv">
								</div>

								<div id="resultsDiv" class="squareDivs">
									
									<iframe id="myFrame">
											<p>Your browser does not support iframes.</p>
									</iframe>
								</div>
							</div>


						<!--</div>row-->
					<!--</divcol-lg-10-->

				<!--</divrow-->
			</form>
		</div> <!--container-fluid-->

<?php
	
	//echo $_SESSION['oauth2state'];
	if(isset($_GET['projectId']))
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
	}



	/*
$_SESSION['projectId'] = $_GET['projectId'];
$_SESSION['branchId'] = $_GET['branchId'];
$_SESSION['commitId'] = $_GET['commitId'];*/
	/*echo $_SESSION['projectId'];
	echo $_SESSION['branchId'];
	echo $_SESSION['commitId'];
	echo $_SESSION['javascriptCode'];*/
?>


<script src="ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="js/jquery-2.1.4.min.js" type="text/javascript"> </script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!--<script src="js/jquery-1.12.0.js" type="text/javascript"> </script>-->
<script src="codepress/codepress.js" type="text/javascript"></script>

<script src="js/oAuth.js" type="text/javascript"></script>


<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="js/github.js" type="text/javascript" ></script>
<script src="js/github.bundle.min.js" type="text/javascript" ></script>-->
<script src="js/javascript.js" type="text/javascript"></script>
<!--<script src="highlighter/prettify.js"></script>-->


	</body>



</html>

	<!--<?php //include 'sessionStart.php' ?>
	<?php //require 'header.php' ?>-->




