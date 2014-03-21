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
	incHeader('PHU | Product');
	
	$product_id = $_GET['product_id'];
		
	$width = $height = 500;
	$url   = urlencode('http://' . $_SERVER['SERVER_NAME'] . '/SPDX/phu/view_product.php?product_id=' . $product_id);
	
	$parameters = "chs={$width}x{$height}&cht=qr&chl=$url";
	
	$host       = abs(crc32($parameters) % 10);
?>
<div align="center">
	<?php
			echo "<img src=\"http://$host.chart.apis.google.com/chart?$parameters\" alt=\"\" />";
			echo "<br>";
			echo "<a href=\"/SPDX/phu/view_product.php?product_id=$product_id\">Go Back</a>";
	?>
</div>
<?php
	incFooter();
?>