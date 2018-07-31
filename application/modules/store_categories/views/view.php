<h1><?php echo $title; ?></h1>

<div class="row">
<?php foreach($query->result() as $row) { ?>
    <div class="col-md-2 card mb-4 mr-3" style="height: 300px;">
        <a href="<?php echo base_url($item_segments . $row->url); ?>">
            <img class="card-img-top" src="<?php echo base_url("assets/images/small_pics/$row->small_pic"); ?>" alt="<?php echo $row->title; ?>"></a>
        </a>
        <div class="card-body">
            <h6 class="card-title"><a href="<?php echo base_url($item_segments . $row->url); ?>"><?php echo $row->title; ?></a></h6>
            <p class="card-text">
                <?php echo $symbol . number_format($row->price, 2); ?>
                <?php if ($row->was_price > 0) { ?>
                    <span style="color:#999; font-weight:normal; text-decoration:line-through;"><?php echo $symbol . $row->was_price; ?></span>
                <?php } ?>
            </p>
        </div>
    </div>
<?php } ?>
</div>
