<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url('admin'); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('store_items/manage'); ?>">Store Items</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Create</a>
    </li>
</ul>

<h1><?php echo $headline; ?></h1>
<hr>
<?php echo validation_errors("<div class='alert alert-error' role='alert'>","</div>"); ?>
<?php //echo isset($flash) ? $flash : ''; ?>
<?php echo $this->session->flashdata('item'); ?>
<div class="row-fluid sortable">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Item Details</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    			<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<form class="form-horizontal" action="<?php echo base_url('store_items/create'); ?>" method="post">
    		  <fieldset>
    			<div class="control-group">
    			  <label class="control-label" for="title">Title</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
    			  </div>
    			</div>
                <div class="control-group">
    			  <label class="control-label" for="price">Price</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="price" value="<?php echo isset($price) ? $price : ''; ?>">
    			  </div>
    			</div>
                <div class="control-group">
    			  <label class="control-label" for="was_price">Previous Price</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="was_price" value="<?php echo isset($was_price) ? $was_price : ''; ?>">
    			  </div>
    			</div>

    			<div class="control-group">
    			  <label class="control-label" for="description">Description</label>
    			  <div class="controls">
    				<textarea class="cleditor" name="description" id="description" rows="3"><?php echo isset($description) ? $description : ''; ?></textarea>
    			  </div>
    			</div>
    			<div class="form-actions">
    			  <button type="submit" name="submit" class="btn btn-primary" value="submit">Save changes</button>
    			  <button type="reset" class="btn">Cancel</button>
    			</div>
    		  </fieldset>
    		</form>
    	</div>
    </div><!--/span-->
</div><!--/row-->
