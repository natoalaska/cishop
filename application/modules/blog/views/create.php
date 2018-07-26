<h1><?php echo $page_headline; ?></h1>
<hr>

<?php echo validation_errors("<div class='alert alert-error' role='alert'>","</div>"); ?>
<?php echo $this->session->flashdata('alert'); ?>


<?php if (is_numeric($update_id) ) { ?>
<div class="row-fluid">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Options</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <a href="<?php echo base_url("blog/deleteconf/$update_id"); ?>" class="btn btn-danger">Delete Post</a>
            <a href="<?php echo base_url($url); ?>" class="btn btn-default">View Post</a>
        </div>
    </div>
</div>
<?php } ?>
<div class="row-fluid">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Post Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
    	</div>
    	<div class="box-content">
    		<form class="form-horizontal" action="<?php echo base_url('blog/create/' . $update_id); ?>" method="post">
    		  <fieldset>
    			<div class="control-group">
    			  <label class="control-label" for="title">Title</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
    			  </div>
    			</div>
                <div class="control-group">
    			  <label class="control-label" for="date_published">Date Published</label>
    			  <div class="controls">
    				<input type="text" class="span6 datepicker hadDatepicker" name="date_published" value="<?php echo isset($date_published) ? $date_published : ''; ?>">
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
                <div class="control-group">
    			  <label class="control-label" for="author">Author</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="author" value="<?php echo isset($author) ? $author : ''; ?>">
    			  </div>
    			</div>
    			<div class="form-actions">
    			  <button type="submit" name="submit" class="btn btn-primary" value="submit">Save changes</button>
    			  <a href="<?php echo base_url("blog/manage"); ?>" class="btn btn-default">Cancel</a>
    			</div>
    		  </fieldset>
    		</form>
    	</div>
    </div><!--/span-->
</div><!--/row-->
