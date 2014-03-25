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
	include("function/packages.php");
	incHeader('PHU | Add Software');
	
	/* --- Params ---*/
	$product_id = $_GET['product_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct  = getProducts($product_id);
	$softid      = getSoftwareAuto();
	$qryPackages = getPackages();
	/* --- END: Queries --- */
	
	/* --- Set return location for cancel button --- */
	$cancelLocation = "view_product_software.php?product_id=" . $product_id;
	/* --- END: Set return location for cancel button --- */
?>
<script>
	$(document).on('click','.sub',function() {
		if($('#softwareName').val() == '')
		{
			alert('Must Enter a software name');
		}
		else if($('#softwareDescription').val() == '')
		{
			alert('Must Enter a software description');;
		}
		else
		{
			var data = "software_name=" + $('#softwareName').val() + "&software_version=" + $('#selPackage option:selected').attr('id') + "&software_descrption=" + $('#softwareDescription').val();
			
			$.ajax({
			  type: "POST",
			  async: false,
			  url: "http://spdxdev.ist.unomaha.edu:3000/api/insert_software?" + data,		  
			  success: function (result)
			  {
			  		data = "software_id=<?php echo $softid[0]['Auto_increment'];?>&product_id=<?echo $product_id;?>&package_id=" + $('#selPackage').val();
			
					$.ajax({
					  type: "POST",
					  async: false,
					  url: "http://spdxdev.ist.unomaha.edu:3000/api/insert_product_software?" + data,		  
					  success: function (result)
					  {
					  		alert('Successfully added software');
					  },
					  error: function(result)
					  {
					  	alert('Error adding software');
					  }
					});
			  },
			  error: function(result)
			  {
			  	alert('Error adding software');
			  }
			});
		}
	});
</script>
<h3>
	<a href="index.php">Products</a> > 
	<?php if(sizeof($qryProduct) == 1) {
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0][product_name] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '">Product Software</a> > ';
		  }
	?>
	Add Software
</h3>
<div class="row-fluid">
	 <form style="margin-left:50px;" method="post" enctype="multipart/form-data" id="addForm" target="formSubFrame" onsubmit="formSubmit()" role="form">
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
						echo '<option value="' . $row['id'] . '" id="' . $row['package_version'] . '" >' . $row['package_name'] . '</option>';
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
			<button type="button" class="btn sub">Submit</button>
			<button type="button" class="btn" onclick="window.location.href='<?php echo $cancelLocation; ?>'">Cancel</button>
		</div>
	</form>
</div>
<?php
	incFooter();
?>
