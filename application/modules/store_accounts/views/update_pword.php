<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url('admin'); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('store_accounts/manage'); ?>">Store Accounts</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="<?php echo base_url('store_accounts/create/<?php echo $update_id; ?>'); ?>">Create</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        Update Password
    </li>
</ul>

<h1><?php echo $headline; ?></h1>
<hr>
<?php echo validation_errors("<div class='alert alert-error' role='alert'>","</div>"); ?>
<?php echo $this->session->flashdata('alert'); ?>

<div class="row-fluid">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Update Password</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
    	</div>
    	<div class="box-content">
    		<form class="form-horizontal" action="<?php echo base_url('store_accounts/update_pword/' . $update_id); ?>" method="post">
    		  <fieldset>
    			<div class="control-group">
    			  <label class="control-label" for="pword">Password</label>
    			  <div class="controls">
    				<input type="password" class="span6" name="pword">
    			  </div>
    			</div>
                <div class="control-group">
                  <label class="control-label" for="repeat_pword">Repeat Password</label>
                  <div class="controls">
                    <input type="password" class="span6" name="repeat_pword">
                  </div>
                </div>
    			<div class="form-actions">
    			  <button type="submit" name="submit" class="btn btn-primary" value="submit">Save changes</button>
    			  <a href="<?php echo base_url("store_accounts/create/$update_id"); ?>" class="btn btn-default">Cancel</a>
    			</div>
    		  </fieldset>
    		</form>
    	</div>
    </div><!--/span-->
</div><!--/row-->
