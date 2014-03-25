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
	incHeader('PHU | Add Product');
	
	/* --- Params ---*/
	$product_id = $_GET['product_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct        = getProducts($product_id);
	$qryParentProducts = getProducts();
	/* --- END: Queries --- */
	
	/* --- Set return location for canel button --- */
	if(sizeof($qryProduct) == 1) {
		$cancelLocation = "view_product.php?product_id=" . $product_id;
	}
	else {
		$cancelLocation = "index.php";
	}
	/* --- END: Set return location for canel button --- */
?>
<script>
	$(document).on('click','.sub',function() {
		if($('#productName').val() == '')
		{
			alert('Must Enter a product name');
		}
		else if($('#productType').val() == '')
		{
			alert('Must Enter a product type');
		}
		else if($('#productDescription').val() == '')
		{
			alert('Must Enter a product description');;
		}
		else
		{
			var data = "product_name=" + $('#productName').val() + "&product_type=" + $('#productType').val() + "&product_descrption=" + $('#productDescription').val() + "&parent_product_id=" + $('#parentProduct').val();
			
			$.ajax({
			  type: "POST",
			  async: false,
			  url: "http://spdxdev.ist.unomaha.edu:3000/api/insert_products?" + data,		  
			  success: function (result)
			  {
				alert('Successfully added product');
			  },
			  error: function(result)
			  {
			  	alert('Error adding product.');
			  }
			});
		}
	});
</script>
<h3>
	<a href="index.php">Products</a> > 
	<?php if(sizeof($qryProduct) == 1) {
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0]['product_name'] . '</a> > <a href="view_child_products.php?product_id=' . $product_id . '">Child Products</a> > ';
	      }		  
	?>
	Add Product
</h3>
<div class="row-fluid">
	<form style="margin-left:50px;" method="post" enctype="multipart/form-data" id="addForm" target="formSubFrame" onclick="formSubmit()" role="form">
		<div class="form-group">	
			<label for="productName">Product Name</label></td>
			<input type="text" placeholder="Product #1..." name="product_name"  class="form-control" style="width:300px;" id="productName">
		</div>
		<div class="form-group">
			<label for="productType">Product Type</label>
		    <input type="text" placeholder="Television..." name="product_type" class="form-control" style="width:300px;" id="productType">
		</div>
		<div class="form-group">
					<?php
						if(sizeof($qryProduct) == 1) {
							echo '<input type="hidden" name="parent_product" value="' . $product_id . '" id="parentProduct" >';	
						}
						else {
							echo '<label for="parentProduct">Parent Product</label>';
							echo '<select name="parent_product" style="width:317px;" class="form-control" id="parentProduct">';
							echo 	'<option value="0">None</option>';
							foreach($qryParentProducts as $row)
							{
								echo 	'<option value="' . $row['id'] . '">' . $row['product_name'] . '</option>'; 
							}
							echo '</select>';
						}
							
					?>
		</div>
		<div class="form-group">
			<label for="productDescription">Product Description</label>
			<textarea name="product_description" rows="5" class="form-control" style="width:300px;" id="productDescription"></textarea>
		</div>
		<div style="margin-top:10px;">
			<button type="button" class="btn sub">Submit</button>
			<button type="button" class="btn" onclick="window.location.href='<?php echo $cancelLocation; ?>'">Cancel</button>
		</div>
	</form>
	<iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()">
	</iframe>
</div>
<?php
	incFooter();
?>
