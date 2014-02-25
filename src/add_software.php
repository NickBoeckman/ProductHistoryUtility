<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	include("function/packages.php");
	incHeader('PHU | Add Software','','http://' . $_SERVER['SERVER_NAME'] .'/SPDX/js/form.js');
	
	/* --- Params ---*/
	$product_id = $_GET['product_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct  = getProducts($product_id);
	$qryPackages = getPackages();
	/* --- END: Queries --- */
	
	/* --- Set return location for canel button --- */
	$cancelLocation = "view_product_software.php?product_id=" . $product_id;
	/* --- END: Set return location for canel button --- */
?>
<h3>
	<a href="index.php">Products</a> > 
	<?php if(mysql_numrows($qryProduct) == 1) {
		  	 $row = mysql_fetch_assoc($qryProduct); 
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $row[product_name] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '">Product Software</a> > ';
		  }
		  
	?>
	Add Software
</h3>
<div class="row-fluid">
	<form style="margin-left:50px;" action="add_software_action.php" method="post" enctype="multipart/form-data" id="addForm" target="formSubFrame" onsubmit="formSubmit()">
		<div id="formSubmission" style="display:none;">
			<p>
				<img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>
				Submiting form, please wait...
			</p>
		</div> 		
		<fieldset>
			<label>Software Name</label>
			<input type="text" placeholder="Software #1..." name="software_name" style="width: 300px;">  
			     				
			<label>Base Package</label>
			<select name="package_id" id="selPackage" style="width: 317px;">
				<?php 
					while($row = mysql_fetch_assoc($qryPackages))
					{
						echo '<option value="' . $row[package_id] . '">' . $row[package_name] . '</option>';
					}
				?>
			</select>
			
			<label>Software Description</label>
			<textarea name="software_description" rows="5" style="width: 300px;"></textarea>
			
			<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">	
			<div style="margin-top:5px;">
				<button type="submit" class="btn">Submit</button>
				<button type="button" class="btn" onclick="window.location.href='<?php echo $cancelLocation; ?>'">Cancel</button>
			</div>
		</fieldset>
	</form>
	<iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()">
	</iframe>
</div>
<?php
	incFooter();
?>
