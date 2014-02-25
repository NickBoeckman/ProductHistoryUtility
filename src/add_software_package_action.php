<?php
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