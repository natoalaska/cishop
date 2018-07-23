<h1><?php echo $headline; ?></h1>
<hr>

<?php if (isset($error)) {
	foreach($error as $value) {
	echo $value;
}
} ?>
<?php echo $this->session->flashdata('alert'); ?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Upload Image</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        	<p>Please choose a file from your computer and then press 'Upload Image'.</p>
        	<?php echo form_open_multipart(base_url("store_items/do_upload/$update_id"), "class='form-horizontal'"); ?>
	        	<div class="control-group">
	        		<label class="control-label" for="userfile">File input</label>
	        		<div class="controls">
	        			<input class="input-file uniform_on" name="userfile" id="userfile" type="file">
	        		</div>
	        	</div>
	        	<div class="form-actions">
	        		<button type="submit" class="btn btn-primary" name="submit" value="submit">Upload Image</button>
	        		<a href="<?php echo base_url("store_items/create/$update_id"); ?>" class="btn btn-default">Cancel</a>
	        	</div>
			</form>
        </div>
    </div>
</div>
