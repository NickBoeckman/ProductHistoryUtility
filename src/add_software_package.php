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
	include_once("function/products.php");
	include_once("function/software.php");
	include_once("function/packages.php");
	incHeader('PHU | Add Software','','http://' . $_SERVER['SERVER_NAME'] .'/SPDX/phu/js/form.js');
	
	/* --- Params ---*/
	$product_id  = $_GET['product_id'];
	$software_id = $_GET['software_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct  = getProducts($product_id);
	$qrySoftware = getSoftware($software_id);
	$qryPackages = getPackages($product_id);
	/* --- END: Queries --- */
	
	/* --- Set return location for canel button --- */
	$cancelLocation = "view_packages.php?product_id=" . $product_id . '&software_id=' . $software_id;
	/* --- END: Set return location for canel button --- */
?>

<h4>
	<a href="index.php">Products</a> > 
	<?php 
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0]['product_name'] . '</a> > '; 
		  	 echo '<a href="view_product_software.php?product_id=' . $product_id . '">Product Software</a> > ';
		  	 echo '<a href="view_software.php?product_id=' . $product_id . '&software_id=' . $software_id . '">' . $qrySoftware[0][software_name] . '</a> > ';
		  	 echo '<a href="view_packages.php?product_id=' . $product_id . '&software_id=' . $software_id . '">Packages</a> > ';
	?>
	Add Package
</h4>
<div class="row-fluid">
	<hr>
	<form style="margin-left:50px;" action="add_software_package_action.php" method="post" enctype="multipart/form-data" id="addForm" target="formSubFrame" onsubmit="formSubmit()" role="form">
		<div id="formSubmission" style="display:none;">
			<p>
				<img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>
				Submiting form, please wait...
			</p>
		</div> 			
		<div class="form-group">
			<?php 	     				
				if(sizeof($qryPackages) > 0) {
					echo '<label>Package</label>';
					echo '<select name="package_id" id="selPackage" style="width:300px !important;" class="form-control">';
						foreach($qryPackages as $row)
						{
							echo '<option value="' . $row[package_id] . '">' . $row[package_name] . '</option>';
						}
					echo '</select>';
					echo '<input type="hidden" name="product_id"  value="'. $product_id . '">';
					echo '<input type="hidden" name="software_id" value="' .$software_id . '">';		
					echo '<div style="margin-top:10px;">';
					echo 	'<button type="submit" class="btn" style="margin-right:5px;">Submit</button>';
					echo 	'<button type="button" class="btn" onclick="window.location.href=\''. $cancelLocation .'\'">Cancel</button>';
					echo '</div>';	
				}
				else {
					echo 'No packages avalible to add.';
				}
				
			?>
		</div>
	</form>
	<iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()">
	</iframe>
</div>
<?php
	incFooter();
?>

