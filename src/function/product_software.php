<?php
	function insertProductSoftware($product_id = "", $software_id = "", $package_id = "")
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		

						
		$sql = "INSERT INTO product_software (product_id,software_id,package_id,created_at,updated_at)
				VALUES ($product_id,$software_id,$package_id,NOW(),NOW())";
				
		
		$insProductSoftware = mysql_query($sql);
		
		mysql_close();
		return $insProductSoftware;
	}

?>