<SPDX-License-Identifier: Apache-2.0>
<!--
Copyright 2014 David Le, Nick Boeckman, & Zac McFarland

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
	incHeader('PHU | Child Products');
	
	/* Params */
	$product_id = $_GET['product_id'];
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct       = getProducts($product_id);
	$qryChildProducts = getChildProducts($product_id);
	/* --- END: Queries --- */
?>
<h2>
	<a href="index.php">Products</a> > 
	<?php if(sizeof($qryProduct) == 1) {
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0]['product_name'] . '</a> > ';
		  }
	?>
	Child Products
</h2>
<div class="row-fluid">
	<div class="span11" style="width: 90%" align="center">
		<table class="table table-bordered">
			<thead>
       				<tr>
                			<th>Product Name</th>
                			<th>Product Type</th>
                			<th>Created At</th>
                			<th>Last Updated At</th>
        			</tr>
			</thead>
			<tbody>
       		 		<?php
						if(sizeof($qryChildProducts) > 0) {
							foreach($qryChildProducts as $row)
							{
						  		echo '<tr title="' . $row['product_description'] . '">';
								echo 	'<td><a href="view_product.php?product_id=' . $row['product_id'] . '">' . $row['product_name'] . '</a></td>';
								echo    '<td>' . $row['product_type'] . '</td>';
								echo    '<td>' . date("M d, Y", strtotime($row['created_at'])) . '</td>';
								echo    '<td>' . date("M d, Y", strtotime($row['updated_at'])) . '</td>';
								echo '</tr>';
							}
						}
						else {
							echo '<tr><td colspan="4">This product does not have any child products. <a href="add_product.php?product_id=' . $product_id . '">Add Child</a> to this product.</td></tr>';
						}	
        			?>
   			</tbody>
		</table>
	</div>
</div>
<div align="center" >
	<p>
		<a href="add_product.php?product_id=<?php echo $product_id?>">Add child</a> to this product.
	</p>
</div>
<?php
	incFooter();
?>


