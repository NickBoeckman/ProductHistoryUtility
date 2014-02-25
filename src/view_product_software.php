<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	include("function/software.php");
	incHeader('PHU | Software');
	
	/* Params */
	$product_id = $_GET['product_id'];
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct       = getProducts($product_id);
	$qrySoftware      = getSoftware('',$product_id);
	$qryChildSoftware = getChildSoftware($product_id);
	/* --- END: Queries --- */
?>
<h2>
	<a href="index.php">Products</a> > 
	<?php if(mysql_numrows($qryProduct) == 1) {
		  	 $row = mysql_fetch_assoc($qryProduct); 
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $row[product_name] . '</a> > ';
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
					if(mysql_num_rows($qrySoftware) > 0) {
						while($row = mysql_fetch_assoc($qrySoftware))
						{
					  		echo '<tr title="' . $row[software_description] . '">';
							echo 	'<td><a href="view_software.php?software_id=' . $row[software_id] . '&product_id=' . $product_id . '">' . $row[software_name] . '</a></td>';
							echo    '<td>' . $row[software_version] . '</td>';
							echo 	'<td>' . date("M d, Y", strtotime($row[created_at])) . '</td>';
							echo    '<td>' . date("M d, Y", strtotime($row[updated_at])) . '</td>';
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

<div class="row-fluid" <?php if(mysql_num_rows($qryChildSoftware) == 0){ echo 'style="display:none;"';}?> >
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
					if(mysql_num_rows($qryChildSoftware) > 0) {
						while($row = mysql_fetch_assoc($qryChildSoftware))
						{
					  		echo '<tr title="' . $row[software_description] . '">';
							echo 	'<td><a href="view_software.php?software_id=' . $row[software_id] . '&product_id=' . $row[product_id] . '">' . $row[software_name] . '</a></td>';
							echo    '<td>' . $row[software_version] . '</td>';
							echo    '<td><a href="view_product.php?product_id=' . $row[product_id] .'">' . $row[product_name] . '</a></td>';
							echo 	'<td>' . date("M d, Y", strtotime($row[created_at])) . '</td>';
							echo    '<td>' . date("M d, Y", strtotime($row[updated_at])) . '</td>';
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
