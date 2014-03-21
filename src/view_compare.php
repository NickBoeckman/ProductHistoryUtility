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
	include("function/software.php");
	include("functon/compare.php");
	incHeader('PHU | Package Comparison');
	
	/* Params */
	$product_id = $_GET['product_id'];
	$software_id = $_GET['software_id'];
	$package_ids = $_GET['package_ids'];
	$difCounter  = 1;
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct       = getProducts($product_id);
	$qrySoftware      = getSoftware($software_id);
	$qryPackages      = getSoftwarePackages($software_id);
	$packageParams    = comparePackages($package_ids);
	/* --- END: Queries --- */
?>
<style>
	.summary tbody tr td label {
		text-align: right;
		margin-right: 5px;
	}
</style>

<script>
	$(document).on('click','.sectionLink', function() {
		$('.' + $(this).attr('id')).goTo();
	});
	(function($) {
    	$.fn.goTo = function() {
	        $('html').animate({
	            scrollTop: $(this).offset().top + 'px'
	        }, 'fast');
	        return this; // for chaining...
	    }
	})(jQuery);
</script>

<h3>
	<a href="index.php">Package Comparison</a> > 
	<?php 
		  if(sizeof($qryProduct) == 1) {
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $qryProduct[0]['product_name'] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '&software_id=' . $software_id. '">Product Software</a> > ';
		  }
		  if(sizeof($qrySoftware) == 1) {
		  	 echo '<a href="view_software.php?software_id=' . $software_id . '&product_id=' . $product_id . '">' . $qrySoftware[0]['software_name'] . '</a> > ';
		  }
	?>
	Package Comparison
</h3>
<div class="row-fluid">
	<h3>Package Comparison</h3>
	<div class="span11" style="width: 90%; margin-top:20px;" align="center">
		<table class="table table-bordered"> 
			<thead>
				<tr>
					<th>Attribute</th>
					<?php
						foreach ($pacakgeParams as $row) {
							echo '<th>' . $row['package_name'] . '</th>';
						}
					?>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(sizeof($packageParams) > 1) {
						foreach ($pacakgeParams[0] as $key => $value) {
							if ($key != "files") {
								echo '<tr title="' . $key . '">';
								echo    '<td style="text-align:center;">' . $key . '</td>';
								
								foreach($packageParams as $row) {
							  		echo '<td>' . $row[$key] . '</td>';
								}
								echo 	'<td>' . $packageParams["result"][$key] .'</td>';
								echo '</tr>';
							} else {
								foreach ($key["files"] as $fileName => $values) {
									foreach ($values as $param) {
										echo '<tr title="' . $fileName . '/">';
										echo 	'<td style="text-align:center;">' . $fileName . '/' . $param . '</td>';
										foreach ($packageParams as $row) {
											echo '<td>' . $row["files"][$fileName][$param] . '</td>';
										}
										echo 	'<td>' . $packageParams["result"]["files"][$fileName] . '</td>';
										echo '</tr>';
									}
								}
							}
						}
					}
					else {
						echo '<tr><td colspan="500">Not enough packages supplied for valid comparison.</td></tr>';
					}			
				?>
			</tbody>					
		</table>				
	</div>
</div>
<?php
	incFooter();
?>
