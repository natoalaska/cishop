<h1>Blog</h1>
<hr>
<?php echo $this->session->flashdata('alert'); ?>

<p><a href="<?php echo base_url('blog/create'); ?>" class="btn btn-primary">Create Post</a></p>

<div class="row-fluid sortable">
    <div class="box span12">
    	<div class="box-header" data-original-title>
    		<h2><i class="halflings-icon white file"></i><span class="break"></span>Posts</h2>
    		<div class="box-icon">
    			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
    		</div>
    	</div>
    	<div class="box-content">
    		<table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Author</th>
                        <th>Date Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($query->result() as $row) {
                    $thumbnail = str_replace('.', '_thumb.', $row->picture);
                ?>
    			<tr>
                    <td><img src="<?php echo base_url("assets/images/blog_pics/$thumbnail"); ?>" alt=""></td>
    				<td><?php echo $row->title; ?></td>
    				<td><?php echo $row->url; ?></td>
    				<td><?php echo $row->author; ?></td>
    				<td><?php echo Modules::run('timedate/get_nice_date', $row->date_published, 'datetime'); ?></td>
    				<td class="center span2">
    					<a class="btn btn-success" href="<?php echo base_url($row->url); ?>">
    						<i class="halflings-icon white zoom-in"></i>
    					</a>
    					<a class="btn btn-info" href="<?php echo base_url("blog/create/$row->id"); ?>">
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
