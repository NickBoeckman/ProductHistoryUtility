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
