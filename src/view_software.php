<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	include("function/software.php");
	include("function/packages.php");
	incHeader('PHU | Software');
	
	/* --- Params --- */ 
	$product_id  = $_GET['product_id'];
	$software_id = $_GET['software_id'];
	/* --- END: Params --- */
	
	/* --- Queries --- */
	$qryProduct  	 = getProducts($product_id);
	$qrySoftware 	 = getSoftware($software_id);
	$qryPackages     = getPackages('',$software_id,$product_id);
	/* --- END: Queries --- */
?>
<h2>
	<a href="index.php">Products</a> > 
	<?php 
		  if(mysql_numrows($qryProduct) == 1) {
		  	 $row = mysql_fetch_assoc($qryProduct); 
		  	 echo '<a href="view_product.php?product_id=' . $product_id . '">' . $row[product_name] . '</a> > <a href="view_product_software.php?product_id=' . $product_id . '&software_id=' . $software_id. '">Product Software</a> > ';
		  }
		  if(mysql_numrows($qrySoftware) == 1) {
		  	 $row = mysql_fetch_assoc($qrySoftware); 
		  	 echo $row[software_name];
		  }
	?>
</h2>
<hr>
<div class="row-fluid">
	<h3>Software Info</h3>
	<div class="span6">
	    <table class="table table-bordered">
	      <tbody>
	      	<?php
	      		$qryPackageCountRow = mysql_fetch_assoc($qryPackageCount);
		        echo '<tr>';
		        echo 	'<td class="tr-title">Software Name</td>';
		        echo  '<td>' . $row[software_name] . '</td>';
		        echo '</tr>';
		        echo '<tr>';
		        echo 	'<td class="tr-title">Software Version</td>';
		        echo  '<td>' . $row[software_version] . '</td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Created At</td>';
		        echo  '<td>' . date("M d, Y", strtotime($row[created_at])) . '</td>';
		        echo '</tr>';
		        echo '<tr>';
		        echo 	'<td class="tr-title">Updated At</td>';
		        echo  '<td>' . date("M d, Y", strtotime($row[updated_at])) . '</td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Packages</td>';
		        echo  '<td><a href="view_packages.php?software_id=' . $software_id . '&product_id=' . $product_id .'">' . mysql_num_rows($qryPackages) . ' Records</a></td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Software Description</td>';
		        echo  '<td>' . $row[software_description] . ' </a></td>';
		        echo '</tr>';
		     ?>
	      </tbody>
	    </table>
	  </div>
	  <div class="span5">
	  	<ul class="nav nav-tabs nav-stacked">
	  		<li>
	  			<a href="javascript:void(0);">Comments (0)</a>
	  		</li>
	  	</ul>
	  	<form accept-charset="UTF-8" action="/packages/10/comments" class="new_comment" id="new_comment" method="post">
	  		<div style="margin:0;padding:0;display:inline">
	  			<input name="utf8" type="hidden"/>
	  		</div>
			<div class="input-append">
		    	<input class="span10" disabled="disabled" id="comment_content" name="comment[content]" placeholder="Comment on this package" size="30" type="text" />
		    	<input class="btn btn-primary" disabled="disabled" name="commit" type="submit" value="Add comment" />
		    </div>
		</form>  
	  </div>
</div>
<?php
	incFooter();
?>

