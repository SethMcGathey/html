<!DOCTYPE html>
<html lang="en">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">

	<body>
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 header">
					<a href="javascript:void(0);" onclick="passStrings();">Run</a>
					<a href="githubAuthorization.php">Authenticate</a>
					<a href="githubReadRepo.php">Access Old File</a>
				</div>
			</div>
			
			<div class="row">

				<div class="col-lg-2 sideBar">
					Sidebar
					<div>
						<form action="githubReadRepo.php" method="post">
							Enter Github Username:<br>
							<input type="text" name="username"><br>
							Enter Github Repo Name:<br>
							<input type="text" name="reponame"><br>
							<input type="submit" value="Submit">
						</form>
					</div>
				</div>
				<div class="col-lg-10" >
					<div class="row">
						<div class="col-lg-6 titleDivs">
							HTML
						</div>
						<div class="col-lg-6 titleDivs">
							CSS
						</div>
						<div class="col-lg-6 squareDivs" id="htmlDiv"  contenteditable>
							
						</div>
						<div class="col-lg-6 squareDivs" id="cssDiv"  contenteditable>
							
						</div>
					</div><!--row-->
					<div class="row">
						<div class="col-lg-6 titleDivs">
							JAVASCRIPT
						</div>
						<div class="col-lg-6 titleDivs">
							RESULT
						</div>
						<div class="col-lg-6 squareDivs" id="javascriptDiv" contenteditable>
							
						</div>
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

	$_SESSION['oauth2state'];
	?>

	</body>
<script src="js/jquery-2.1.4.min.js" type="text/javascript"> </script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/javascript.js" type="text/javascript"></script>
	
</html>

	<!--<?php //include 'sessionStart.php' ?>
	<?php //require 'header.php' ?>-->



