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
	include("function/compare.php");
	incHeader('PHU | Comparison');
	
	/* --- Queries --- */
	$package_ids = $_GET['package_id'];
	$compare = comparePackages($package_ids);
	/* --- END: Queries ---*/
?>	
<div class="span12" style="width: 100%;">
	<div class="row-fluid">
		<h1>Difference Summary</h1>
		<div class="span11" style="width: 90%" align="center">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product Name</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($compare as $row) 
						{
							foreach(array_keys($row) as $keys)
							{
								var_dump($keys);
								if($row[$keys] != 'same')
								{
									echo '<tr>';
									echo 	'<td>' . $keys . '</td>';
									echo 	'<td>' . $row[$keys] . '</td>';
									echo '</tr>';
								}
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
	incFooter();
?>
