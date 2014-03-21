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
	function getSoftware($software_id = "", $product_id = "")
	{
		$product_id 	   = mysql_real_escape_string($software_id);
		$parent_product_id = mysql_real_escape_string($product_id);

		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/software";
		
		if(!empty($software_id) && $software_id != NULL) {
			$serviceurl .= "/" . $software_id;
		}				   
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
	}
	
	function getProductSoftware($product_id = "")
	{
		$product_id = mysql_real_escape_string($product_id);

		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/product_software";
		
		if(!empty($product_id) && $product_id != NULL) {
			$serviceurl .= "/$product_id";
		}				   
		
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
	}
	
	function getChildSoftware($parent_product_id = "")
	{
		$parent_product_id = mysql_real_escape_string($parent_product_id);

		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/child_software";
		
		if(!empty($parent_product_id) && $parent_product_id != NULL) {
			$serviceurl .= "/$parent_product_id";
		}			   
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
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
