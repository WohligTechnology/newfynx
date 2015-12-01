<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch(" List of Product");?>
<table class="highlight responsive-table">
<thead>
<tr>
<th data-field="id">ID</th>
<!--<th data-field="subcategory">Subcategory</th>-->
<th data-field="name">Name</th>
<th data-field="quantity">Quantity</th>
<th data-field="sku">Sku</th>

<!--
<th data-field="type">Type</th>
<th data-field="description">Description</th>
<th data-field="visibility">Visibility</th>
-->
<th data-field="price">Price</th>
<!--
<th data-field="relatedproduct">Related Product</th>
<th data-field="category">Category</th>
<th data-field="color">Color</th>
<th data-field="size">Size</th>
<th data-field="sizechart">Size Chart</th>
<th data-field="status">Status</th>
-->
<th data-field="action">action</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createproduct"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.quantity + "</td><td>" + resultrow.sku + "</td><td>" + resultrow.price + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editproduct?id=');?>"+resultrow.id+"'><i class='fa fa-pencil propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deleteproduct?id='); ?>"+resultrow.id+"'><i class='material-icons propericon'>delete</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
