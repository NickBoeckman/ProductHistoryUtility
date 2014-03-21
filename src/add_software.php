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
	include("function/packages.php");
	incHeader('PHU | Add Software','','http://' . $_SERVER['SERVER_NAME'] .'/SPDX/phu/js/form.js');
	
	/* --- Params ---*/
	$product_id = $_GET['product_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct  = getProducts($product_id);
	$qryPackages = getPackages();
	/* --- END: Queries --- */
	
	/* --- Set return location for cancel button --- */
	$cancelLocation = "view_product_software.php?product_id=" . $product_id;
	/* --- END: Set return location for cancel button --- */
?>
<h3>
	<a href="index.php">Products</a> > 
	<?php if(sizeof($qryProduct) == 1) {
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0][product_name] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '">Product Software</a> > ';
		  }
		  
	?>
	Add Software
</h3>
<div class="row-fluid">
	<form style="margin-left:50px;" action="add_software_action.php" method="post" enctype="multipart/form-data" id="addForm" target="formSubFrame" onsubmit="formSubmit()" role="form">
		<div id="formSubmission" style="display:none;">
			<p>
				<img src="img/ajax-loader-circles.gif" height="20px" width="20px"></img>
				Submiting form, please wait...
			</p>
		</div> 	
		<div class="form-group">	
			<label for="softwareName">Software Name</label>
			<input type="text" placeholder="Software #1..." name="software_name" style="width: 300px;" id="softwareName" class="form-control">  
		</div>
		<div class="form-group">	
			<label for="basePackage">Base Package</label>
			<select name="package_id" id="selPackage" style="width: 317px;" id="basePackage" class="form-control">
				<?php 
					foreach($qryPackages as $row)
					{
						echo '<option value="' . $row['id'] . '">' . $row['package_name'] . '</option>';
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="softwareDescription">Software Description</label>
			<textarea name="software_description" rows="5" style="width: 300px;" class="form-control" id="softwareDescription"></textarea>
		</div>			
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">	
		<div style="margin-top:5px;">
			<button type="submit" class="btn">Submit</button>
			<button type="button" class="btn" onclick="window.location.href='<?php echo $cancelLocation; ?>'">Cancel</button>
		</div>
	</form>
	<iframe name="formSubFrame" style="display:none;" id="iframSub" onload="subComp()">
	</iframe>
</div>
<?php
	incFooter();
?>
