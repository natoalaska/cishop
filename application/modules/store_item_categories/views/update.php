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
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>New Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <p>Choose a new category and hit 'Add'.</p>
            <form class="form-horizontal" action="<?php echo base_url('store_item_categories/submit/' . $item_id); ?>" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">New Category</label>
                        <div class="controls">
							<?php
                            $additional_data = 'id="category_id" class="span6"';
                            echo form_dropdown('category_id', $options, $additional_data);
                            ?>
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
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Categories</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Count</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $count = 0;
                foreach($query->result() as $row) {
                    $count++;
					$title = Modules::run('store_categories/_get_cat_title', $row->category_id);
					$parent_cat_title = Modules::run('store_categories/_get_parent_cat_title', $row->category_id);
                ?>
    			<tr>
                    <td><?php echo $count; ?></td>
    				<td><?php echo $parent_cat_title . " > " . $title; ?></td>
    				<td class="center">
    					<a class="btn btn-danger" href="<?php echo base_url("store_item_categories/delete/$row->id"); ?>">
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
