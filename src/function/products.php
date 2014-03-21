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
	
	function getProducts($product_id = "")
	{	
		$product_id = mysql_real_escape_string($product_id);
		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/products";
		
		if(!empty($product_id) && $product_id != NULL) {
			$serviceurl .= "/" . $product_id;
		}		   
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
	}
	
	function getChildProducts($product_id = "")
	{	
		$product_id = mysql_real_escape_string($product_id);
		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/child_products";
		
		if(!empty($product_id) && $product_id != NULL) {
			$serviceurl .= "/" . $product_id;
		}
							   
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
	}
	
	function insertProducts($product_name = "", $product_type = "", $product_description = "", $parent_product_id = "")
	{
		include("Data_Source.php");
		mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
		mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
		
		$product_name 	     = mysql_real_escape_string($product_name);
		$product_type 	     = mysql_real_escape_string($product_type);
		$product_description = mysql_real_escape_string($product_description);
		$parent_product_id   = mysql_real_escape_string($parent_product_id);

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
		
		$product_id = mysql_real_escape_string($product_id);
						
		$sql = "UPDATE products SET updated_at = NOW() WHERE id = $product_id";
				
		
		$updProduct = mysql_query($sql);
		
		mysql_close();
		return $updProduct;
	}
?>
