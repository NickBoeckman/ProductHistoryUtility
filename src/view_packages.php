<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	include("function/packages.php");
	include("function/software.php");
	incHeader('PHU | Packages');
	
	/* Params */
	$product_id = $_GET['product_id'];
	$software_id = $_GET['software_id'];
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct       = getProducts($product_id);
	$qrySoftware      = getSoftware($software_id);
	$qryPackages      = getPackages('',$software_id,$product_id);
	/* --- END: Queries --- */
?>

<h3>
	<a href="index.php">Products</a> > 
	<?php 
		  if(mysql_numrows($qryProduct) == 1) {
		  	 $row = mysql_fetch_assoc($qryProduct); 
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $row[product_name] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '&software_id=' . $software_id. '">Product Software</a> > ';
		  }
		  if(mysql_numrows($qrySoftware) == 1) {
		  	 $row = mysql_fetch_assoc($qrySoftware); 
		  	 echo '<a href="view_software.php?software_id=' . $software_id . '&product_id=' . $product_id . '">' . $row[software_name] . '</a> > ';
		  }
	?>
	Packages
</h3>
<div class="row-fluid">
	<div class="span11" style="width: 90%; margin-top:20px;" align="center">
		<table class="table table-bordered"> 
			<thead>
				<tr>
					<th>Package Name</th>
					<th>Version</th>
					<th>Created At</th>
					<th>Last Updated At</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(mysql_num_rows($qryPackages) > 0) {
						while($row = mysql_fetch_assoc($qryPackages))
						{
					  		echo '<tr title="' . $row[package_name] . '">';
							echo 	'<td><a href="' . $row[package_home_page] . '">' . $row[package_name] . '</a></td>';
							echo    '<td>' . $row[package_version] . '</td>';
							echo 	'<td>' . date("M d, Y", strtotime($row[created_at])) . '</td>';
							echo    '<td>' . date("M d, Y", strtotime($row[updated_at])) . '</td>';
							echo '</tr>';
						}
					}
					else {
						echo '<tr><td colspan="4">This software does not have any packages. <a href="add_software_package.php?product_id=' . $product_id . '&software=' . $software .'">Add Package</a> to software.</td></tr>';
					}			
				?>
			</tbody>					
		</table>				
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
