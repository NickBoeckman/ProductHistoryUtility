<?php

	function getSoftware($software_id = "", $product_id = "")
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
		$sql = "SELECT s.id AS software_id,
					   s.software_name,
					   s.software_version,
					   s.software_description,
					   s.created_at,
					   s.updated_at
					   
			    FROM software AS s
			    	 LEFT OUTER JOIN product_software AS ps ON s.id = ps.software_id
			    	 LEFT OUTER JOIN products AS p ON ps.product_id = p.id
			    
			    
			    WHERE 1 = 1 ";
		
		if(!empty($software_id) && $software_id != NULL) {
			$sql .= "AND s.id = $software_id ";
		}
		if(!empty($product_id) && $product_id != NULL) {
			$sql .= "AND p.id = $product_id ";
		}
		
		$sql .= "GROUP BY s.id,
					      s.software_name,
					   	  s.software_version,
					   	  s.created_at,
					   	  s.updated_at";
		
						
	    $qrySoftware = mysql_query($sql);
		
		mysql_close();
		return $qrySoftware;
	}
	
	function getChildSoftware($parent_product_id = "")
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
		$sql = "SELECT s.id AS software_id,
					   s.software_name,
					   s.software_version,
					   s.software_description,
					   s.created_at,
					   s.updated_at,
					   p.id AS product_id,
					   p.product_name
					   
			    FROM products AS p
					 INNER JOIN product_software AS ps ON p.id = ps.product_id
					 LEFT OUTER JOIN software AS s ON ps.software_id = s.id
					 LEFT OUTER JOIN products AS pp ON p.parent_product_id = pp.id
			    
			    WHERE 1 = 1 ";
		
		if(!empty($parent_product_id) && $parent_product_id != NULL) {
			$sql .= "AND p.parent_product_id = $parent_product_id ";
		}
		
		$sql .= "GROUP BY s.id,
					      s.software_name,
					   	  s.software_version,
					   	  s.created_at,
					   	  s.updated_at";
		
						
	    $qrySoftware = mysql_query($sql);
		
		mysql_close();
		return $qrySoftware;
	}
	
	function insertSoftware($software_name = "", $software_version = "", $software_description = "")
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
		$qrySoftwareId = mysql_query("SHOW TABLE STATUS LIKE 'software'");
		$softwareIdRow = mysql_fetch_array($qrySoftwareId);
		$softwareId = $softwareIdRow['Auto_increment'];
						
		$sql = "INSERT INTO software (software_name,software_version,software_description,created_at,updated_at)
				VALUES ('$software_name','$software_version','$software_description',NOW(),NOW())";
				
		
		$insSoftware = mysql_query($sql);
		if(!empty($insSoftware) && $insSoftware != 'true')
		{
			mysql_close();
			return $insSoftware;
		}
		else {
			mysql_close();
			return $softwareId;	
		}
	}
	function updateSoftware($software_id)
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
						
		$sql = "UPDATE products SET updated_at = NOW() WHERE id = $software_id";
				
		
		$updSoftware = mysql_query($sql);
		
		mysql_close();
		return $updSoftware;
	}

?>