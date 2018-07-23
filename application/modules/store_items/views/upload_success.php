<h1><?php echo $headline; ?></h1>
<hr>

<?php echo $this->session->flashdata('alert'); ?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Upload Success</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
        </div>
        <div class="box-content">
        	<p>
        		<a href="<?php echo base_url("store_items/create/$update_id"); ?>" class="btn btn-primary">Return to main update item page.</a>
        	</p>
        </div>
    </div>
</div>
