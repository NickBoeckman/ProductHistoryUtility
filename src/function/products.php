<?php

	function getProducts($product_id = "",$parent_product_id = "")
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
		$sql = "SELECT p.id AS product_id,
					   p.product_name,
					   p.product_type,
					   p.product_description,
					   p.parent_product_id,
					   p.created_at,
					   p.updated_at,
					   pp.product_name AS parent_product_name
					   
			    FROM   products AS p
			    	   LEFT OUTER JOIN products AS pp ON p.parent_product_id = pp.id
			    	   
			    WHERE 1 = 1 ";
					   
		
		if(!empty($product_id) && $product_id != NULL) {
			$sql .= "AND p.id = $product_id ";
		}
		if(!empty($parent_product_id) && $parent_product_id != NULL) {
			$sql .= "AND p.parent_product_id = $parent_product_id ";
		}
		
	    $qryProducts = mysql_query($sql);
		
		mysql_close();
		return $qryProducts;
	}
	
	function insertProducts($product_name = "", $product_type = "", $product_description = "", $parent_product_id = "")
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
		if($parent_product_id == "" || $parent_product_id == NULL) {
			$parent_product_id = 'NULL';
		}
		else {
			$parent_product_id = intval($parent_product_id);
		}
						
		$sql = "INSERT INTO products (product_name,product_type,product_description,parent_product_id,created_at,updated_at)
				VALUES ('$product_name','$product_type','$product_description',$parent_product_id,NOW(),NOW())";
				
		
		$insProduct = mysql_query($sql);
		
		mysql_close();
		return $insProduct;
	}
	function updateProduct($product_id)
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
						
		$sql = "UPDATE products SET updated_at = NOW() WHERE id = $product_id";
				
		
		$updProduct = mysql_query($sql);
		
		mysql_close();
		return $updProduct;
	}
?>
