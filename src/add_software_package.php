<?php
	include("function/HeaderFooter.php");
	include_once("function/products.php");
	include_once("function/software.php");
	include_once("function/packages.php");
	incHeader('PHU | Add Software','','http://' . $_SERVER['SERVER_NAME'] .'/SPDX/js/form.js');
	
	/* --- Params ---*/
	$product_id  = $_GET['product_id'];
	$software_id = $_GET['software_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct  = getProducts($product_id);
	$qrySoftware = getSoftware($software_id);
	$qryPackages = getPackages('',$software_id,$product_id,true);
	/* --- END: Queries --- */
	
	/* --- Set return location for canel button --- */
	$cancelLocation = "view_packages.php?product_id=" . $product_id . '&software_id=' . $software_id;
	/* --- END: Set return location for canel button --- */
?>

<h4>
	<a href="index.php">Products</a> > 
	<?php 
		  	 $row = mysql_fetch_assoc($qryProduct);
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $row[product_name] . '</a> > '; 
		  	 echo '<a href="view_product_software.php?product_id=' . $product_id . '">Product Software</a> > ';
		  	 $row = mysql_fetch_assoc($qrySoftware); 
		  	 echo '<a href="view_software.php?product_id=' . $product_id . '&software_id=' . $software_id . '">' . $row[software_name] . '</a> > ';
		  	 echo '<a href="view_packages.php?product_id=' . $product_id . '&software_id=' . $software_id . '">Packages</a> > ';
	?>
	Add Package
</h4>
<div class="row-fluid">
	<hr>
	<form style="margin-left:50px;" action="add_software_package_action.php" method="post" enctype="multipart/form-data" id="addForm" target="formSubFrame" onsubmit="formSubmit()">
		<div id="formSubmission" style="display:none;">
			<p>
				<img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>
				Submiting form, please wait...
			</p>
		</div> 		
		<fieldset> 		
			<?php 	     				
				if(mysql_num_rows($qryPackages) > 0) {
					echo '<label>Package</label>';
					echo '<select name="package_id" id="selPackage" style="width:300px !important;">';
						while($row = mysql_fetch_assoc($qryPackages))
						{
							echo '<option value="' . $row[package_id] . '">' . $row[package_name] . '</option>';
						}
					echo '</select>';
					echo '<input type="hidden" name="product_id"  value="'. $product_id . '">';
					echo '<input type="hidden" name="software_id" value="' .$software_id . '">';		
					echo '<div style="margin-top:5px;">';
					echo 	'<button type="submit" class="btn" style="margin-right:5px;">Submit</button>';
					echo 	'<button type="button" class="btn" onclick="window.location.href=\''. $cancelLocation .'\'">Cancel</button>';
					echo '</div>';	
				}
				else {
					echo 'No packages avalible to add.';
				}
				
			?>
			
		</fieldset>
	</form>
	<iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()">
	</iframe>
</div>
<?php
	incFooter();
?>