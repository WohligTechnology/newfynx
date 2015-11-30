<div class="row">
<div class="col s12">
<h4 class="pad-left-15">Edit product</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editproductsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
 <div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('subcatergory', $status, set_value('subcatergory',$before->subcategory)); ?>
                 <label>Sub Catergory</label>
            </div>
        </div>
<div class="row">
<div class="input-field col s6">
<label for="Quantity">Quantity</label>
<input type="text" id="Quantity" name="quantity" value='<?php echo set_value('quantity',$before->quantity);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="sku">Sku</label>
<input type="text" id="sku" name="sku" value='<?php echo set_value('sku',$before->quantity);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Name">Name</label>
<input type="text" id="Name" name="name" value='<?php echo set_value('name',$before->name);?>'>
</div>
</div>
<div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('type', $type, set_value('type',$before->type)); ?>
                 <label>Type</label>
            </div>
        </div>
<div class="row">
<div class="input-field col s6">
<label for="Description">Description</label>
<input type="text" id="Description" name="description" value='<?php echo set_value('description',$before->description);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Visibility">Visibility</label>
<input type="text" id="Visibility" name="visibility" value='<?php echo set_value('visibility',$before->visibility);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Price">Price</label>
<input type="text" id="Price" name="price" value='<?php echo set_value('price',$before->price);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Related Product">Related Product</label>
<input type="text" id="Related Product" name="relatedproduct" value='<?php echo set_value('relatedproduct',$before->relatedproduct);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="Category">Category</label>
<input type="text" id="Category" name="category" value='<?php echo set_value('category',$before->category);?>'>
</div>
</div>
<div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('color', $color, set_value('color',$before->color)); ?>
                 <label>Color</label>
            </div>
        </div>
           <div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('size', $size, set_value('size',$before->size)); ?>
                 <label>Size</label>
            </div>
        </div>   
                   <div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('sizechart', $sizechart, set_value('sizechart',$before->sizechart)); ?>
                 <label>Size Chart</label>
            </div>
        </div>
 <div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('status', $status, set_value('status',$before->status)); ?>
                 <label>Status</label>
            </div>
        </div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewproduct"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
