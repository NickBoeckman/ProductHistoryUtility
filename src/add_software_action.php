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
	include("function/products.php");
	include("function/software.php");
	include("function/product_software.php");
	include("function/packages.php");
	
	/*---- Variables ----*/
	$result = array();
	
	$software_name        = $_POST['software_name'];
	$package_id           = $_POST['package_id'];
	$software_description = $_POST['software_description'];
	$product_id           = $_POST['product_id'];
	/* ---- END: Variables ----*/
	
	/* ---- Validation. ---- */
	if($software_name == "") {
		array_push($result,"Missing software name.");	
	}
	if($package_id == "") {
		array_push($result,"You must select a package.");
	}
	if($product_id == "") {
		array_push($result,"Missing product.");
	}
	/* --- END: Validation --- */
	
	/* --- If no errors insert into db --- */
	if(empty($result)) {
		/* --- Queries --- */
		$qryPackage = getPackages($package_id);
		/* --- END: Queries ---*/
		
		$row = mysql_fetch_assoc($qryPackage);
		$insSoftware = insertSoftware($software_name, $row[package_version],$software_description);
		if(!is_numeric($insSoftware))
		{
			array_push($result,"Database insert failure." . $insSoftware);
		}
		else {
			$insProductSoftware = insertProductSoftware($product_id, $insSoftware, $package_id);
			if(!empty($insProductSoftware) && $insProductSoftware != 'true')
			{
				array_push($result,"Database insert failure." . $insProductSoftware);
			}
		}
		
	}
	/* --- END: Insert --- */
	
	echo json_encode($result);
?>
