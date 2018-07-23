<h1><?php echo $headline; ?></h1>
<hr>
<?php echo validation_errors("<div class='alert alert-error' role='alert'>","</div>"); ?>
<?php echo $this->session->flashdata('alert'); ?>

<?php if (is_numeric($update_id) ) { ?>
<div class="row-fluid">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Account Options</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <a href="<?php echo base_url("store_accounts/update_pword/$update_id"); ?>" class="btn btn-primary">Update Password</a>
            <a href="<?php echo base_url("store_accounts/deleteconf/$update_id"); ?>" class="btn btn-danger">Delete Account</a>
        </div>
    </div>
</div>
<?php } ?>
<div class="row-fluid">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white edit"></i><span class="break"></span>Account Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
    	</div>
    	<div class="box-content">
    		<form class="form-horizontal" action="<?php echo base_url('store_accounts/create/' . $update_id); ?>" method="post">
    		  <fieldset>
    			<div class="control-group">
    			  <label class="control-label" for="firstname">First Name</label>
    			  <div class="controls">
    				<input type="text" class="span6" name="firstname" value="<?php echo isset($firstname) ? $firstname : ''; ?>">
    			  </div>
    			</div>
                <div class="control-group">
                  <label class="control-label" for="lastname">Last Name</label>
                  <div class="controls">
                    <input type="text" class="span6" name="lastname" value="<?php echo isset($lastname) ? $lastname : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="company">Company</label>
                  <div class="controls">
                    <input type="text" class="span6" name="company" value="<?php echo isset($company) ? $company : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="address1">Address Line 1</label>
                  <div class="controls">
                    <input type="text" class="span6" name="address1" value="<?php echo isset($address1) ? $address1 : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="address2">Address Line 2</label>
                  <div class="controls">
                    <input type="text" class="span6" name="address2" value="<?php echo isset($address2) ? $address2 : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="town">Town</label>
                  <div class="controls">
                    <input type="text" class="span6" name="town" value="<?php echo isset($town) ? $town : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="country">Country</label>
                  <div class="controls">
                    <input type="text" class="span6" name="country" value="<?php echo isset($country) ? $country : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="postcode">Post Code</label>
                  <div class="controls">
                    <input type="text" class="span6" name="postcode" value="<?php echo isset($postcode) ? $postcode : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="telnum">Tel. Number</label>
                  <div class="controls">
                    <input type="text" class="span6" name="telnum" value="<?php echo isset($telnum) ? $telnum : ''; ?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="email">Email</label>
                  <div class="controls">
                    <input type="text" class="span6" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                  </div>
                </div>

<!--                 <div class="control-group">
    			  <label class="control-label" for="status">Status</label>
    			  <div class="controls">
                      <?php
                      $additional_data = 'id="status" class="span6"';
                      $options = array(
                          '' => 'Select Status...',
                          1 => 'Active',
                          0 => 'Deactive'
                      );
                      echo form_dropdown('status', $options, $status, $additional_data);
                      ?>
                  </div>
    			</div> -->
    			<div class="form-actions">
    			  <button type="submit" name="submit" class="btn btn-primary" value="submit">Save changes</button>
    			  <a href="<?php echo base_url("store_accounts/manage"); ?>" class="btn btn-default">Cancel</a>
    			</div>
    		  </fieldset>
    		</form>
    	</div>
    </div><!--/span-->
</div><!--/row-->
