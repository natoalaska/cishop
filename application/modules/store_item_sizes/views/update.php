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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>New Size Options</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            Add new options as required. When you are finished adding options, press 'Finished';
            <form class="form-horizontal" action="<?php echo base_url('store_item_sizes/submit/' . $update_id); ?>" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">New Option</label>
                        <div class="controls">
                            <input type="text" class="span6" name="size">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
                        <button type="submit" class="btn btn-success" name="submit" value="finished">Finished</button>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </div>
</div>

<?php if ($num_rows > 0) { ?>
<div class="row-fluid sortable">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Size Options</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $count = 0;
                foreach($sizes->result() as $row) {
                    $count++;
                ?>
    			<tr>
                    <td><?php echo $count; ?></td>
    				<td><?php echo $row->size; ?></td>
    				<td class="center">
    					<a class="btn btn-danger" href="<?php echo base_url("store_item_sizes/delete/$row->id"); ?>">
    						<i class="halflings-icon white trash"></i>
    					</a>
    				</td>
    			</tr>
                <?php } ?>
    		  </tbody>
    	  </table>
    	</div>
    </div><!--/span-->
<?php } ?>
