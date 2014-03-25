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
	include("function/packages.php");
	include("function/software.php");
	incHeader('PHU | Packages');
	
	/* Params */
	$product_id = $_GET['product_id'];
	$software_id = $_GET['software_id'];
	$difCounter  = 1;
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct       = getProducts($product_id);
	$qrySoftware      = getSoftware($software_id);
	$qryPackages      = getSoftwarePackages($software_id);
	/* --- END: Queries --- */
?>
<style>
	.summary tbody tr td label {
		text-align: right;
		margin-right: 5px;
	}
</style>
<h3>
	<a href="index.php">Products</a> > 
	<?php 
		  if(sizeof($qryProduct) == 1) {
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0]['product_name'] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '&software_id=' . $software_id. '">Product Software</a> > ';
		  }
		  if(sizeof($qrySoftware) == 1) {
		  	 echo '<a href="view_software.php?software_id=' . $software_id . '&product_id=' . $product_id . '">' . $qrySoftware[0]['software_name'] . '</a> > ';
		  }
	?>
	Packages
</h3>
<div class="row-fluid">
	<h3>Software Packages</h3>
	<div class="span11" style="width: 90%; margin-top:20px;" align="center">
		<form action="compare.php">
			<table class="table table-bordered"> 
				<thead>
					<tr>
						<th>Select</th>
						<th>Package Name</th>
						<th>Version</th>
						<th>Created At</th>
						<th>Last Updated At</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(sizeof($qryPackages) > 0) {
							foreach($qryPackages as $row)
							{
						  		echo '<tr title="' . $row['package_name'] . '">';
						  		echo    '<td style="text-align:center;"><input type="checkbox" class="compCheckbox" id="' . $row['id'] . '" name="package_id" value="' . $row['id'] . '" /></td>';
								echo 	'<td><a href="' . $row['package_home_page'] . '">' . $row['package_name'] . '</a></td>';
								echo    '<td>' . $row['package_version'] . '</td>';
								echo 	'<td>' . date("M d, Y", strtotime($row['created_at'])) . '</td>';
								echo    '<td>' . date("M d, Y", strtotime($row['updated_at'])) . '</td>';
								echo '</tr>';
							}
						}
						else {
							echo '<tr><td colspan="5">This software does not have any packages. <a href="add_software_package.php?product_id=' . $product_id . '&software=' . $software .'">Add Package</a> to software.</td></tr>';
						}			
					?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" style="text-align:center;">
							<button type="submit" id="submitForm" style="margin-left:40px;">Compare</button>
						</td>
					</tr>
				</tfoot>					
			</table>
		</form>				
	</div>
</div>
<div align="center">
	<p>
		<a href="add_software_package.php?software_id=<?php echo $software_id . '&product_id=' . $product_id; ?>">Add Package</a>
		 to this software.
	</p>
</div>
<?php
	incFooter();
?>