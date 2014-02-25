<?php
	include("function/HeaderFooter.php");
	include("function/products.php");
	include("function/software.php");
	incHeader('PHU | Products');
	
	/* Params */
	$product_id = $_GET['product_id'];
	/* END: Params */
	
	/* --- Queries --- */
	$qryProduct           = getProducts($product_id);
	$qryChildProducts     = getProducts('',$product_id);
	$qrySoftware          = getSoftware('',$product_id);
	$qryChildSoftware     = getChildSoftware($product_id);
	/* --- END: Queries --- */
?>
<h1>
	<a href="index.php">Products</a> > 
	<?php $row = mysql_fetch_assoc($qryProduct); echo $row[product_name];?>
</h1>
<hr>
<div class="row-fluid">
	<h3>Product Info</h3>
	<div class="span6">
	    <table class="table table-bordered">
	      <tbody>
	      	<?php
		        echo '<tr>';
		        echo 	'<td class="tr-title">Product Name</td>';
		        echo  '<td>' . $row[product_name] . '</td>';
		        echo '</tr>';
		        echo '<tr>';
		        echo 	'<td class="tr-title">Product Type</td>';
		        echo  '<td>' . $row[product_type] . '</td>';
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
		        echo 	'<td class="tr-title">Software</td>';
		        echo  '<td><a href=view_product_software.php?product_id=' . $product_id .'>' . (mysql_num_rows($qrySoftware) + mysql_num_rows($qryChildSoftware)) . ' Records</a></td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Child Products</td>';
		        echo  '<td><a href="view_child_products.php?product_id=' .$product_id . '">' . mysql_num_rows($qryChildProducts) . ' Records</a></td>';
		        echo '</tr>';
				echo '<tr>';
		        echo 	'<td class="tr-title">Product Description</td>';
		        echo  '<td>' . $row[product_description] . '</td>';
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
	  	<form accept-charset="UTF-8" action="/packages/10/comments" class="new_comment" id="new_comment" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="2/QYfHWi+P0Y21VCDCY7mSIzExCJPRpH8WsffQ8TgGw=" /></div>
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
