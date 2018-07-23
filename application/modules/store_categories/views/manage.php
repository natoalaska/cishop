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
            <?php
            echo Modules::run('store_categories/_draw_sortable_list', $parent_cat_id);
            ?>
    	</div>
    </div><!--/span-->

    </div><!--/row-->
