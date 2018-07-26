<h1>CMS</h1>
<hr>
<?php echo $this->session->flashdata('alert'); ?>

<p><a href="<?php echo base_url('webpages/create'); ?>" class="btn btn-primary">Create Page</a></p>

<div class="row-fluid sortable">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white file"></i><span class="break"></span>Pages</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Headline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($query->result() as $row) { ?>
    			<tr>
    				<td><?php echo $row->title; ?></td>
    				<td><?php echo $row->url; ?></td>
    				<td class="center span2">
    					<a class="btn btn-success" href="<?php echo base_url($row->url); ?>">
    						<i class="halflings-icon white zoom-in"></i>
    					</a>
    					<a class="btn btn-info" href="<?php echo base_url("webpages/create/$row->id"); ?>">
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
