<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	incHeader('PHU | Add Product','','http://' . $_SERVER['SERVER_NAME'] .'/SPDX/js/form.js');
	
	/* --- Params ---*/
	$product_id = $_GET['product_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct        = getProducts($product_id);
	$qryParentProducts = getProducts();
	/* --- END: Queries --- */
	
	/* --- Set return location for canel button --- */
	if(mysql_numrows($qryProduct) == 1) {
		$cancelLocation = "view_product.php?product_id=" . $product_id;
	}
	else {
		$cancelLocation = "index.php";
	}
	/* --- END: Set return location for canel button --- */
?>
<h3>
	<a href="index.php">Products</a> > 
	<?php if(mysql_numrows($qryProduct) == 1) {
		  	 $row = mysql_fetch_assoc($qryProduct); 
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $row[product_name] . '</a> > <a href="view_child_products.php?product_id=' . $product_id . '">Child Products</a> > ';
		  }
		  
	?>
	Add Product
</h3>
<div class="row-fluid">
	<form style="margin-left:50px;" action="add_product_action.php" method="post" enctype="multipart/form-data" id="addForm" target="formSubFrame" onsubmit="formSubmit()">
		<div id="formSubmission" style="display:none;">
			<p>
				<img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>
				Submiting form, please wait...
			</p>
		</div> 		
		<fieldset>
			<label>Product Name</label>
			<input type="text" placeholder="Product #1..." name="product_name" style="width:300px;">
			       				
			<label>Product Type</label>
			<input type="text" placeholder="Television..." name="product_type" style="width:300px;">
			
			<?php
				if(mysql_numrows($qryProduct) == 1) {
					echo '<input type="hidden" name="parent_product" value="' . $product_id . '">';	
				}
				else {
					echo '<label>Parent Product</label>';
					echo '<select name="parent_product" style="width:317px;">';
					echo 	'<option value="">None</option>';
					while($row = mysql_fetch_assoc($qryParentProducts))
					{
						echo 	'<option value="' . $row[product_id] . '">' . $row[product_name] . '</option>'; 
					}
					echo '</select>';
				}
					
			?>
			
			<label>Product Description</label>
			<textarea name="product_description" rows="5" style="width:300px;"></textarea>
			
			
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

