<?php
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