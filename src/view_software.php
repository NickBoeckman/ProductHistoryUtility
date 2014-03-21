<SPDX-License-Identifier: Apache-2.0>
<!--
Copyright 2014 David Le, Nick Boeckman, and Zac McFarland

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->
<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	include("function/software.php");
	include("function/packages.php");
	incHeader('PHU | Software');
	
	/* --- Params --- */ 
	$product_id  = $_GET['product_id'];
	$software_id = $_GET['software_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct  	 = getProducts($product_id);
	$qrySoftware 	 = getSoftware($software_id);
	$qryPackages     = getSoftwarePackages($software_id);
	/* --- END: Queries --- */
?>
<h2>
	<a href="index.php">Products</a> > 
	<?php 
		  // Determine if there is a product associated with product ID and display the path
		  // QUESTION from David: I think all we want is a return value of True or False, right? In which case, the '== 1' isn't really necessary, is it?
		  if(sizeof($qryProduct) == 1) { 
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0]['product_name'] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '&software_id=' . $software_id. '">Product Software</a> > ';
		  }
		  // Determine if software exists, display if it does
		  if(sizeof($qrySoftware) == 1) {
		  	 echo $qrySoftware[0]['software_name'];
		  }
	?>
</h2>
<hr>
<div class="row-fluid">
	<h3>Software Info</h3>
	<div class="span6">
	    <table class="table table-bordered">
	      <tbody>
	      	<?php
				// Creates a table displaying software information in the format:
				// 	Software Name
				// 	Software Version	
				//	Created At		Date
				//	Updated At		Date
				//	Packages
				//	Software Description
		        echo '<tr>';
		        echo 	'<td class="tr-title">Software Name</td>';
		        echo  '<td>' . $qrySoftware[0]['software_name'] . '</td>';
		        echo '</tr>';
		        echo '<tr>';
		        echo 	'<td class="tr-title">Software Version</td>';
		        echo  '<td>' . $qrySoftware[0]['software_version'] . '</td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Created At</td>';
		        echo  '<td>' . date("M d, Y", strtotime($qrySoftware[0]['created_at'])) . '</td>';
		        echo '</tr>';
		        echo '<tr>';
		        echo 	'<td class="tr-title">Updated At</td>';
		        echo  '<td>' . date("M d, Y", strtotime($qrySoftware[0]['updated_at'])) . '</td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Packages</td>';
		        echo  '<td><a href="view_packages.php?software_id=' . $software_id . '&product_id=' . $product_id .'">' . sizeof($qryPackages) . ' Records</a></td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Software Description</td>';
		        echo  '<td>' . $qrySoftware[0]['software_description'] . ' </a></td>';
		        echo '</tr>';
		     ?>
	      </tbody>
	    </table>
	  </div>
</div>
<?php
	incFooter();
?>
