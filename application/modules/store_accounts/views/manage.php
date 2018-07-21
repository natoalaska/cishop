<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url('admin'); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-briefcase"></i>
        Accounts
    </li>
</ul>

<h1>Manage Accounts</h1>
<hr>
<?php echo $this->session->flashdata('alert'); ?>

<p><a href="<?php echo base_url('store_accounts/create'); ?>" class="btn btn-primary">Create Account</a></p>

<div class="row-fluid sortable">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white briefcase"></i><span class="break"></span>Customer Accounts</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($accounts->result() as $row) { ?>
    			<tr>
    				<td><?php echo $row->firstname; ?></td>
    				<td><?php echo $row->lastname; ?></td>
    				<td><?php echo $row->company; ?></td>
    				<td><?php echo Modules::run('timedate/get_nice_date', $row->date_made, 'cool'); ?></td>
    				<!-- <td class="center">
                        <?php
                            if ($row->status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php } else { ?>
                                <span class="label label-default">Deactive</span>
                            <?php } ?>

    				</td> -->
    				<td class="center">
    					<a class="btn btn-success" href="#">
    						<i class="halflings-icon white zoom-in"></i>
    					</a>
    					<a class="btn btn-info" href="<?php echo base_url("store_accounts/create/$row->id"); ?>">
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
