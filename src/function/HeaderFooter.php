<?php
	function incHeader($title = "", $JS_String = "", $JS_Include = "", $CSS_Include = "", $CSS_String = "", $MenuFlag = "true")
	{
		
		echo '<!DOCTYPE html>
				<html> 
					<head>
					    <meta charset="utf-8">
					    <title>'. $title .'</title>
					    <meta content="width=device-width, initial-scale=1.0" name="viewport">
					    <link rel="stylesheet" type="text/css" href="/SPDX/css/bootstrap.css">
						<script src="/SPDX/js/jQuery.js"></script>
						<script src="/SPDX/js/bootstrap.js"></script>';
		
		//CSS Includes
		foreach(explode(',',$CSS_Include) as $path)
		{
			echo '<link rel="stylesheet" type="text/css" href="' . $path . '">'; 
		}
		echo '<style type="text/css">' . $CSS_String . '</style>';
		echo '<style>
			 	.center-container {
					margin: 0 auto;
				    max-width: 960px;
				}
				.tr-title { 
				    background-color: rgb(249, 249, 249);
				  }
			 </style>';
		//END: CSS Includes
		
		echo 	'</head>
				<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">';
		
		//JS Includes
		foreach(explode(',',$JS_Include) as $path)
		{
			echo '<script src="' . $path . '"></script>'; 
		}
		echo '<script type="text/javascript">' . $JS_String . '</script>';
		//END: JS Includes
		echo '<body class="'. $title .'">
				<div class="navbar navbar-fluid-top">
					<div class="navbar-inner">
						<div class="container-fluid">
							<a href="/SPDX/index.php" class="brand">Home</a>
							<a href="/SPDX/add_product.php" class="brand">Add Product</a>
							<a href="http://spdxhub.ist.unomaha.edu/" class="brand">SPDX Hub</a>
						</div>
					</div>
				</div>
				<div class="container-fluid">
  					<div class="center-container row-fluid">
    					<div class="span12">';
	}
	
	function incFooter()
	{
		echo '						</div>
								</div>
							</div>
						<hr>
						<div class="footer" align="center">
	      					<p>
								<small>© University of Nebraska at Omaha 2014</small>
							</p>
						</div>
					</body>
				</html>';
	}

	
?>