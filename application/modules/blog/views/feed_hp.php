
<h2>Blog</h2>
<?php foreach($query->result() as $row) { ?>
<div class="row mb-3">
    <div class="col-md-3">
        <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/images/blog_pics/' . str_replace('.', '_thumb.', $row->picture)); ?>" alt="">
    </div>
    <div class="col-md-9">
        <h4><a href="<?php echo base_url("blog/post/$row->url"); ?>"><?php echo $row->title; ?></a></h4>
        <p class="small">
            <strong><?php echo $row->author; ?></strong>
            - <?php echo Modules::run('timedate/get_nice_date', $row->date_published, 'datetime'); ?>
        </p>
        <p><?php echo word_limiter($row->content, 25); ?></p>
    </div>
</div>
<?php } ?>
