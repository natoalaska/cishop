<h1>Manage Categories</h1>
<hr>

<?php echo $this->session->flashdata('alert'); ?>

<p><a href="<?php echo base_url('store_categories/create'); ?>" class="btn btn-primary">Create Category</a></p>

<div class="row-fluid sortable">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Categories</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Parent Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($categories->result() as $row) { ?>
    			<tr>
    				<td><?php echo $row->title; ?></td>
    				<td><?php echo $row->parent; ?></td>
    				<!-- <td class="center">
                        <?php
                            if ($row->status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php } else { ?>
                                <span class="label label-default">Deactive</span>
                            <?php } ?>

    				</td> -->
    				<td class="center">
    					<a class="btn btn-success" href="<?php echo base_url("store_items/view/$row->id"); ?>">
    						<i class="halflings-icon white zoom-in"></i>
    					</a>
    					<a class="btn btn-info" href="<?php echo base_url("store_items/create/$row->id"); ?>">
    						<i class="halflings-icon white edit"></i>
    					</a>
    					<!-- <a class="btn btn-danger" href="#">
    						<i class="halflings-icon white trash"></i>
    					</a> -->
    				</td>
    			</tr>
                <?php } ?>
    		  </tbody>
    	  </table>
    	</div>
    </div><!--/span-->

    </div><!--/row-->
