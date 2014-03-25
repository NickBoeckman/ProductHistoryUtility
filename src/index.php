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
	incHeader('PHU | Home');
	
	/* --- Queries --- */
	$qryProducts = getProducts();
	/* --- END: Queries ---*/
?>	
<div class="span12" style="width: 100%;">
	<div class="row-fluid">
		<h1>Products</h1>
		<div class="span11" style="width: 90%" align="center">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Product Type</th>
						<th>Parent Product</th>
						<th>Created At</th>
						<th>Last Updated</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(sizeof($qryProducts) > 0) {
							foreach($qryProducts as $row)
							{
								/*--- Get parent Products ---*/
								if($row['parent_product_id'] != 0) {
									$qryParentProducts = getProducts($row['parent_product_id']);
								}	
								
						  		echo '<tr title="' . $row['product_description'] . '">';
								echo 	'<td><a href="view_product.php?product_id=' . $row['id'] . '">' . $row['product_name'] . '</a></td>';
								echo    '<td>' . $row['product_type'] . '</td>';
								if($row['parent_product_id'] != 0) {
									echo    '<td><a href="view_product.php?product_id=' . $row['parent_product_id'] . '">' .  $qryParentProducts[0]['product_name'] . '</a></td>';
								}
								else {
									echo '<td></td>';	
								}
								echo    '<td>' . date("M d, Y", strtotime($row['created_at'])) . '</td>';
								echo    '<td>' . date("M d, Y", strtotime($row['created_at'])) . '</td>';
								echo '</tr>';
							}
						}
						else {
							echo '<tr><td colspan="5">There are currently 0 product records. Go to the <a href="add_product.php">Add Product</a> page to create a new product record.</td></tr>';
						}			
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
	incFooter();
?>