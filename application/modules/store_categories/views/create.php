<h1><?php echo $headline; ?></h1>
<hr>

<?php echo validation_errors("<div class='alert alert-error' role='alert'>","</div>"); ?>
<?php echo $this->session->flashdata('alert'); ?>

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
                  <?php if ($num_dropdown_options > 1) { ?>
                  <div class="control-group">
                      <label class="control-label" for="parent_cat_id">Parent Category</label>
                      <div class="controls">
                          <?php
                          $additional_data = 'id="parent_cat_id" class="span6"';
                          echo form_dropdown('parent_cat_id', $options, $additional_data);
                          ?>
                      </div>
                  </div>
                  <?php } else {
                      echo form_hidden('parent_cat_id', 0);
                  } ?>
                  
    			<div class="control-group">
    			  <label class="control-label" for="title">Title</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
    			  </div>
    			</div>



                <div class="form-actions">
    			  <button type="submit" name="submit" class="btn btn-primary" value="submit">Save changes</button>
    			  <a href="<?php echo base_url("store_categories/manage"); ?>" class="btn btn-default">Cancel</a>
    			</div>
    		  </fieldset>
    		</form>
    	</div>
    </div><!--/span-->
</div><!--/row-->
