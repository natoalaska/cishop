<div class="row">
    <div class="col-md-4">
        <img src="<?php echo base_url("assets/images/big_pics/$big_pic"); ?>" class="img-fluid" alt="<?php echo $title; ?>">
    </div>
    <div class="col-md-5">
        <h2><?php echo $title; ?></h2>
        <div class="clearfix">
            <?php echo nl2br($description); ?>
        </div>
    </div>
    <div class="col-md-3">
        <?php echo Modules::run('cart/_draw_add_to_cart', $item_id); ?>
    </div>
</div>
