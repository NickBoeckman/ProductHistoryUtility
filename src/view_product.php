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
	incHeader('PHU | Product');
	
	/* Params */
	$product_id = $_GET['product_id'];
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct           = getProducts($product_id);
	$qryChildProducts     = getChildProducts($product_id);
	$qryProductSoftware   = getProductSoftware($product_id);
	$qryChildSoftware     = getChildSoftware($product_id);
	/* --- END: Queries --- */
?>
<h1>
	<a href="index.php">Products</a> > 
	<?php echo $qryProduct[0]['product_name'];?>
</h1>
<style>
	.blue {
    	color: #2E64FE;
	}	
</style>
<hr>
<div class="row-fluid">
	<div><h3 style="float:left;display:inline-block;">Product Info</h3><span style="float:right;display:inline-block;" class="glyphicon glyphicon-edit"></span></div>
	<div class="span6">
	    <table class="table table-bordered">
	      <tbody>
	      	<?php
		        echo '<tr>';
		        echo 	'<td class="tr-title">Product Name</td>';
		        echo  '<td>' . $qryProduct[0]['product_name'] . '</td>';
		        echo '</tr>';
		        echo '<tr>';
		        echo 	'<td class="tr-title">Product Type</td>';
		        echo  '<td>' . $qryProduct[0]['product_type'] . '</td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Created At</td>';
		        echo  '<td>' . date("M d, Y", strtotime($qryProduct[0]['created_at'])) . '</td>';
		        echo '</tr>';
		        echo '<tr>';
		        echo 	'<td class="tr-title">Updated At</td>';
		        echo  '<td>' . date("M d, Y", strtotime($qryProduct[0]['updated_at'])) . '</td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Software</td>';
		        echo  '<td><a href=view_product_software.php?product_id=' . $product_id .'>' . (sizeof($qryProductSoftware) + sizeof($qryChildSoftware)) . ' Records</a></td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Child Products</td>';
		        echo  '<td><a href="view_child_products.php?product_id=' .$product_id . '">' . sizeof($qryChildProducts) . ' Records</a></td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Product Description</td>';
		        echo  '<td>' . $qryProduct[0]['product_description'] . '</td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Product QR Code</td>';
		        echo  '<td><a href="/SPDX/phu/qr.php?product_id=' . $product_id . '">View Code</a></td>';
		        echo '</tr>';
		     ?>
	      </tbody>
	    </table>
	</div>
</div>
<?php
	incFooter();
?>


