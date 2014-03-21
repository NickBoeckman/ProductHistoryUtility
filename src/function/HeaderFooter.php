<?php
	/*
	<SPDX-License-Identifier: Apache-2.0>

	Copyright 2014 David Le, Nick Boeckman, & Zac McFarland
	
	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at
	
	    http://www.apache.org/licenses/LICENSE-2.0
	
	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License. */
	
	date_default_timezone_set('UTC');
	function incHeader($title = "", $JS_String = "", $JS_Include = "", $CSS_Include = "", $CSS_String = "", $MenuFlag = "true")
	{
		echo '<!DOCTYPE html>
				<html> 
					<head>
					    <meta charset="utf-8">
					    <title>'. $title .'</title>
					    <meta content="width=device-width, initial-scale=1.0" name="viewport">
					    <link href="/SPDX/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
						<script src="/SPDX/bower_components/jquery/jquery.js"></script>
						<script src="/SPDX/phu/js/bootstrap.js"></script>';
		
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
			  	<div class="navbar navbar-default navbar-static-top">
					<div class="navbar-inner">
				    	<div class="container-fluid">
				        	<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
				            	<span class="icon-bar"></span>
				            	<span class="icon-bar"></span>
				            	<span class="icon-bar"></span>
				          	</a>
				            <a href="/SPDX/" class="navbar-brand">Home</a>
					        <a href="/SPDX/phu/index.php" class="navbar-brand">Products</a>
					        <a href="/SPDX/phu/add_product.php" class="navbar-brand">Add Product</a>
				            <div class="container-fluid nav-collapse">
				            	<ul class="nav">
				            	</ul>
				          	</div>
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
								<small>&copy; University of Nebraska at Omaha 2014</small>
							</p>
						</div>
					</body>
				</html>';
	}

	
?>
