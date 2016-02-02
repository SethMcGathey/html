<!DOCTYPE html>
<html lang="en">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">

	<body>
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12" style="background-color:grey">
					<a href="overwriteFile.php">Run</a>
				</div>
			</div>
			
			<div class="row">

				<div class="col-lg-2" style="background-color:yellow; height:810px;">
					Sidebar
				</div>
				<div class="col-lg-10" >
					<div class="row">
						<div class="col-lg-6">
							HTML
						</div>
						<div class="col-lg-6">
							CSS
						</div>
						<div class="col-lg-6 squareDivs" id="htmlDiv"  contenteditable>
							
						</div>
						<div class="col-lg-6 squareDivs" id="cssDiv"  contenteditable>
							
						</div>
					</div><!--row-->
					<div class="row">
						<div class="col-lg-6">
							JAVASCRIPT
						</div>
						<div class="col-lg-6">
							RESULT
						</div>
						<div class="col-lg-6 squareDivs" id="javascriptDiv" contenteditable>
							
						</div>
						<div class="col-lg-6 squareDivs" id="resultsDiv">
							
							<iframe src="http://www.w3schools.com" style="height:100%;width:100%">
									<p>Your browser does not support iframes.</p>
							</iframe>
						</div>
					</div><!--row-->
				</div><!--col-lg-10-->

			</div><!--row-->

		</div> <!--container-fluid-->



	</body>

	
</html>

	<!--<?php //include 'sessionStart.php' ?>
	<?php //require 'header.php' ?>-->



