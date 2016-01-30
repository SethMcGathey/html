<?php include 'sessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<?php require 'header.php' ?>
	<link rel="stylesheet" href="css/bootstrap.min.css">

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
						<div class="col-lg-6" id="htmlDiv" style="background-color:red; height:385px; overflow:scroll" contenteditable>
							
						</div>
						<div class="col-lg-6" id="cssDiv" style="background-color:green; height:385px; overflow:scroll" contenteditable>
							
						</div>
					</div><!--row-->
					<div class="row">
						<div class="col-lg-6">
							JAVASCRIPT
						</div>
						<div class="col-lg-6">
							RESULT
						</div>
						<div class="col-lg-6" id="javascriptDiv" style="background-color:blue; height:385px; overflow:scroll" contenteditable>
							
						</div>
						<div class="col-lg-6" id="resultsDiv" style="background-color:orange; height:385px; overflow:scroll" >
							
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



