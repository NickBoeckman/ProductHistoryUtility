<?php

	function getPackages($package_id = "",$software_id = "",$product_id = "",$filter = false)
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
		$sql = "SELECT p.id AS package_id,
					   p.package_home_page,
					   p.package_name,
					   p.package_version,
					   p.package_description,
					   p.created_at,
					   p.updated_at
				
				FROM packages AS p
					 LEFT OUTER JOIN product_software AS ps ON p.id = ps.package_id
				
				WHERE 1 = 1 ";

		if(!empty($package_id)) {
			$sql .= "AND p.id = $package_id ";
		}
		if(!empty($software_id) && !$filter) {
			$sql .= "AND ps.software_id = $software_id ";
		}
		if(!empty($product_id ) && !$filter) {
			$sql .= "AND ps.product_id = $product_id ";
		}
		if($filter) {
			$sql .= "AND p.id NOT IN (SELECT pkg.package_id 
								  	  FROM product_software AS pkg
								  	  WHERE 1 = 1 ";
			if(!empty($software_id)) {
				$sql .= "AND pkg.software_id = $software_id ";
			}
			if(!empty($product_id)) {
				$sql .= "AND pkg.product_id = $product_id ";
			}
			$sql .= ") ";
		}
		
		
		$sql .= "GROUP BY p.id,
						  p.package_home_page,
						  p.package_name,
						  p.package_version,
						  p.package_description,
						  p.created_at,
						  p.updated_at
						  
				 ORDER BY p.package_version DESC";	
		
	    $qryPackages = mysql_query($sql);
		
		mysql_close();
		return $qryPackages;
	}
	
?>