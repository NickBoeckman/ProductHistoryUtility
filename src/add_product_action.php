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
	
	/*---- Variables ----*/
	$result = array();
	
	$product_name        = $_POST['product_name'];
	$product_type        = $_POST['product_type'];
	$product_description = $_POST['product_description'];
	$parent_product_id   = $_POST['parent_product'];
	/* ---- END: Variables ----*/
	
	/* ---- Validation. ---- */
	if($product_name == "") {
		array_push($result,"Missing product name.");	
	}
	if($product_type == "") {
		array_push($result,"Missing product type.");
	}
	if($product_description == "") {
		array_push($result,"Missing product description.");
	}
	/* --- END: Validation --- */
	
	/* --- If no errors insert into db --- */
	if(empty($result)) {
		$insProduct = insertProducts($product_name, $product_type, $product_description, $parent_product_id);
		if(!empty($insProduct) && $insProduct != 'true')
		{
			array_push($result,"Database insert failure.");
		}
	}
	/* --- END: Insert --- */
	
	echo json_encode($result);
?>
