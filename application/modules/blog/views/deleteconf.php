<h1><?php echo $page_headline; ?></h1>
<hr>

<?php echo $this->session->flashdata('alert'); ?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Delete?</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <p>Are you sure that you want to delete this page?</p>
        	<p>
        		<a href="<?php echo base_url("blog/delete/$update_id"); ?>" class="btn btn-danger">Delete Page</a>
                <a href="<?php echo base_url("blog/create/$update_id"); ?>" class="btn btn-default">Cancel</a>
        	</p>
        </div>
    </div>
</div>
