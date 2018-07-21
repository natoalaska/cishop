<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url('admin'); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-tag"></i>
        Store Items
    </li>
</ul>

<h1>Manage Items</h1>
<hr>
<?php echo $this->session->flashdata('alert'); ?>

<p><a href="<?php echo base_url('store_items/create'); ?>" class="btn btn-primary">Create Item</a></p>

<div class="row-fluid sortable">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white tag"></i><span class="break"></span>Item Inventory</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Previous Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($items->result() as $row) { ?>
    			<tr>
    				<td><?php echo $row->title; ?></td>
    				<td><?php echo $row->price; ?></td>
    				<td><?php echo $row->was_price; ?></td>
    				<td class="center">
                        <?php
                            if ($row->status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php } else { ?>
                                <span class="label label-default">Deactive</span>
                            <?php } ?>

    				</td>
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
