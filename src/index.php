<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	include("function/software.php");
	incHeader('PHU | Home');
	
	/* --- Queries --- */
	$qryProducts = getProducts();
	$qrySoftware = getSoftware();
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
						if(mysql_num_rows($qryProducts) > 0) {
							while($row = mysql_fetch_assoc($qryProducts))
							{
						  		echo '<tr title="' . $row[product_description] . '">';
								echo 	'<td><a href="view_product.php?product_id=' . $row[product_id] . '">' . $row[product_name] . '</a></td>';
								echo    '<td>' . $row[product_type] . '</td>';
								echo    '<td><a href="view_product.php?product_id=' . $row[parent_product_id] . '">' .  $row[parent_product_name] . '</a></td>';
								echo    '<td>' . date("M d, Y", strtotime($row[created_at])) . '</td>';
								echo    '<td>' . date("M d, Y", strtotime($row[created_at])) . '</td>';
								echo '</tr>';
							}
						}
						else {
							echo '<tr><td colspan="4">There are currently 0 product records. Go to the <a href="add_product.php">Add Product</a> page to create a new product record.</td></tr>';
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