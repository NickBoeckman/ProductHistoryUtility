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
	
	function getPackages($package_id = "")
	{
		$package_id  = mysql_real_escape_string($package_id);

		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/packages";
		
		if(!empty($package_id)) {
			$serviceurl .= "/" . $package_id;
		}				   
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
	}
	function getSoftwarePackages($software_id = "")
	{
		$software_id = mysql_real_escape_string($software_id);

		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/software_packages";
		
		if(!empty($software_id)) {
			$serviceurl .= "/" . $software_id;
		}				   
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
	}
	
	function getNonProductPackages($product_id = "")
	{
		$product_id = mysql_real_escape_string($product_id);

		$serviceurl = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/avalible_packages";
		
		if(!empty($product_id)) {
			$serviceurl .= "/" . $product_id;
		}				   
		$data = json_decode(file_get_contents($serviceurl), true);
		
		return $data;
	}
	
?>
