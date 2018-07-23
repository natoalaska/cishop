<h1><?php echo $headline; ?></h1>
<hr>

<?php echo validation_errors("<div class='alert alert-error' role='alert'>","</div>"); ?>
<?php echo $this->session->flashdata('alert'); ?>

<?php if (is_numeric($update_id) ) { ?>
<div class="row-fluid">
    <div class="box span12">
        <!-- <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php if ($big_pic == "") { ?>
            <a href="<?php echo base_url("store_items/upload_image/$update_id"); ?>" class="btn btn-primary">Upload Item Image</a>
            <?php } else { ?>
            <a href="<?php echo base_url("store_items/delete_image/$update_id"); ?>" class="btn btn-danger">Delete Item Image</a>
            <?php } ?>
            <a href="<?php echo base_url("store_item_colors/update/$update_id"); ?>" class="btn btn-primary">Update Item Color</a>
            <a href="<?php echo base_url("store_item_sizes/update/$update_id"); ?>" class="btn btn-primary">Update Item Size</a>
            <a href="<?php echo base_url('store_items'); ?>" class="btn btn-primary">Update Item Category</a>
            <a href="<?php echo base_url("store_items/deleteconf/$update_id"); ?>" class="btn btn-danger">Delete Item</a>
            <a href="<?php echo base_url("store_items/view/$update_id"); ?>" class="btn btn-default">View Item</a>
        </div> -->
    </div>
</div>
<?php } ?>
<div class="row-fluid">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Category Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
    	</div>
    	<div class="box-content">
    		<form class="form-horizontal" action="<?php echo base_url('store_categories/create/' . $update_id); ?>" method="post">
    		  <fieldset>
    			<div class="control-group">
    			  <label class="control-label" for="title">Title</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
    			  </div>
    			</div>
                <!-- <div class="control-group">
    			  <label class="control-label" for="status">Status</label>
    			  <div class="controls">
                      <?php
                      $additional_data = 'id="status" class="span6"';
                      $options = array(
                          '' => 'Select Status...',
                          1 => 'Active',
                          0 => 'Deactive'
                      );
                      echo form_dropdown('status', $options, $status, $additional_data);
                      ?>
                  </div>
    			</div> -->
    			<div class="form-actions">
    			  <button type="submit" name="submit" class="btn btn-primary" value="submit">Save changes</button>
    			  <a href="<?php echo base_url("store_categories/manage"); ?>" class="btn btn-default">Cancel</a>
    			</div>
    		  </fieldset>
    		</form>
    	</div>
    </div><!--/span-->
</div><!--/row-->
