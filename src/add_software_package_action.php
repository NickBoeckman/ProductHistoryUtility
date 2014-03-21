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
	
	include("function/product_software.php");
	include("function/packages.php");
	include("function/products.php");
	include("function/software.php");
	
	/*---- Variables ----*/
	$result = array();
	
	$product_id        = $_POST['product_id'];
	$software_id	   = $_POST['software_id'];
	$package_id		   = $_POST['package_id'];
	/* ---- END: Variables ----*/
	
	/* ---- Validation. ---- */
	if($package_id == "")
	{
		array_push($result,"Please select a package.");
	}
	/* --- END: Validation --- */
	
	/* --- If no errors insert into db --- */
	if(empty($result)) {
		$insProductSoftware = insertProductSoftware($product_id, $software_id,$package_id);
		if(!empty($insProductSoftware) && $insProductSoftware != 'true')
		{
			array_push($result,"Database insert failure.");
		}
		else 
		{
			$updSoftware = updateSoftware($software_id);
			$updProduct  = updateProduct($product_id);
			if((!empty($updSoftware) && $updSoftware != 'true') OR (!empty($updProduct) && $updProduct != 'true'))
			{
				array_push($result,"Database update failure.");
			}
		}
		
	}
	/* --- END: Insert --- */
	
	echo json_encode($result);
?>
