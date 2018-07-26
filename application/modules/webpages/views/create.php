<h1><?php echo $page_headline; ?></h1>
<hr>

<?php echo validation_errors("<div class='alert alert-error' role='alert'>","</div>"); ?>
<?php echo $this->session->flashdata('alert'); ?>


<?php if (is_numeric($update_id) ) { ?>
<div class="row-fluid">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Page Options</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php if ($update_id > 2) { ?><a href="<?php echo base_url("webpages/deleteconf/$update_id"); ?>" class="btn btn-danger">Delete Item</a><?php } ?>
            <a href="<?php echo base_url($url); ?>" class="btn btn-default">View Page</a>
        </div>
    </div>
</div>
<?php } ?>
<div class="row-fluid">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Page Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
    	</div>
    	<div class="box-content">
    		<form class="form-horizontal" action="<?php echo base_url('webpages/create/' . $update_id); ?>" method="post">
    		  <fieldset>
    			<div class="control-group">
    			  <label class="control-label" for="title">Title</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
    			  </div>
    			</div>
                <div class="control-group">
    			  <label class="control-label" for="keywords">Keywords</label>
    			  <div class="controls">
    				<textarea class="span6" name="keywords" id="keywords" rows="3"><?php echo isset($keywords) ? $keywords : ''; ?></textarea>
    			  </div>
    			</div>
                <div class="control-group">
    			  <label class="control-label" for="description">Description</label>
    			  <div class="controls">
    				<textarea class="span6" name="description" id="description" rows="3"><?php echo isset($description) ? $description : ''; ?></textarea>
    			  </div>
    			</div>
    			<div class="control-group">
    			  <label class="control-label" for="content">Content</label>
    			  <div class="controls">
    				<textarea class="cleditor span10" name="content" id="content" rows="3"><?php echo isset($content) ? $content : ''; ?></textarea>
    			  </div>
    			</div>
    			<div class="form-actions">
    			  <button type="submit" name="submit" class="btn btn-primary" value="submit">Save changes</button>
    			  <a href="<?php echo base_url("webpages/manage"); ?>" class="btn btn-default">Cancel</a>
    			</div>
    		  </fieldset>
    		</form>
    	</div>
    </div><!--/span-->
</div><!--/row-->
