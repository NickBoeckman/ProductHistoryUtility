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
	incHeader('PHU | Software');
	
	/* Params */
	$product_id = $_GET['product_id'];
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct         = getProducts($product_id);
    $qryProductSoftware = getProductSoftware($product_id);
    $qryChildSoftware   = getChildSoftware($product_id);
	/* --- END: Queries --- */
?>
<h2>
	<a href="index.php">Products</a> > 
	<?php if(sizeof($qryProduct) == 1) {
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0]['product_name'] . '</a> > ';
		  }
	?>
	Product Software
</h2>
<div class="row-fluid">
	<h3>Product Software</h3>
	<div class="span11" style="width: 90%; margin-top:20px;" align="center">
		<table class="table table-bordered"> 
			<thead>
				<tr>
					<th>Software</th>
					<th>Version</th>
					<th>Created At</th>
					<th>Last Updated At</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Enter the while loop when software exists
					if(sizeof($qryProductSoftware) > 0) {
						// while a row of data exists, place that data into an associative array
						foreach($qryProductSoftware as $row)
						{
					  		echo '<tr title="' . $row['software_description'] . '">';
							echo 	'<td><a href="view_software.php?software_id=' . $row['id'] . '&product_id=' . $product_id . '">' . $row['software_name'] . '</a></td>';
							echo    '<td>' . $row['software_version'] . '</td>';
							echo 	'<td>' . date("M d, Y", strtotime($row['created_at'])) . '</td>';
							echo    '<td>' . date("M d, Y", strtotime($row['updated_at'])) . '</td>';
							echo '</tr>';
						}
					}
					else {
						echo '<tr><td colspan="4">This product does not have any software. <a href="add_software.php?product_id=' . $product_id . '">Add software</a>.</td></tr>';
					}			
				?>
			</tbody>					
		</table>				
	</div>
</div>
<div align="center">
	<p>
		<a href="add_software.php?product_id=<?php echo $product_id?>">Add software</a>
		 to this product.
	</p>
</div>

<div class="row-fluid" <?php if(sizeof($qryChildSoftware) == 0){ echo 'style="display:none;"';}?> >
	<h3>Child Product Software</h3>
	<div class="span11" style="width: 90%; margin-top:20px;" align="center">
		<table class="table table-bordered"> 
			<thead>
				<tr>
					<th>Software</th>
					<th>Version</th>
					<th>Child Product</th>
					<th>Created At</th>
					<th>Last Updated At</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(sizeof($qryChildSoftware) > 0) {
						foreach($qryChildSoftware as $row)
						{
					  		echo '<tr title="' . $row['software_description'] . '">';
							echo 	'<td><a href="view_software.php?software_id=' . $row['id'] . '&product_id=' . $row['product_id'] . '">' . $row['software_name'] . '</a></td>';
							echo    '<td>' . $row['software_version'] . '</td>';
							echo    '<td><a href="view_product.php?product_id=' . $row['product_id'] .'">' . $row['product_name'] . '</a></td>';
							echo 	'<td>' . date("M d, Y", strtotime($row['created_at'])) . '</td>';
							echo    '<td>' . date("M d, Y", strtotime($row['updated_at'])) . '</td>';
							echo '</tr>';
						}
					}
					else {
						echo '<tr><td colspan="4">This product does not have any software. <a href="add_software.php?product_id=' . $product_id . '">Add software</a>.</td></tr>';
					}			
				?>
			</tbody>					
		</table>				
	</div>
</div>
<?php
	incFooter();
?>