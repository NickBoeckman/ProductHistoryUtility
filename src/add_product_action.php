<?php
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