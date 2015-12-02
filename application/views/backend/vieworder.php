<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createorder"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
    
    var orderitems = "";
    
    for(var i=0;i<resultrow.orderproduct.length;i++) {
        var row= resultrow.orderproduct[i];
        orderitems += "<tr class=\"repeat\"> <td>"+row.productname+" <\/td><td>"+row.price+" <\/td><td>"+row.quantity+" <\/td><td>"+row.finalprice+" <\/td><\/tr>";
    }
    
   var strVar="";
strVar += "<div class=\"ordercard\"> <table> <tr> <td> <span class=\"id\">"+resultrow.id+"<\/span> <\/td><td> <span class=\"name\">"+resultrow.firstname+" " + resultrow.lastname+"<\/span> <\/td><td> <span class=\"email\">"+resultrow.email+"<\/span> <\/td><td> <span class=\"status\">"+resultrow.orderstatus+"<\/span> <\/td><td> <span class=\"finalamount\">"+resultrow.finalamount+"<\/span> <\/td><td> <span class=\"timestamp\">"+resultrow.timestamp+"<\/span> <\/td><\/tr><\/table> <table> <thead> <tr> <th>Product <\/th> <th>Amount <\/th> <th>Quantity <\/th> <th>Total Amount <\/th> <\/tr><\/thead> <tbody>"+orderitems+" <\/tbody> <\/table><\/div>";


return strVar;

}
generateorder("<?php echo $base_url;?>");
</script>
