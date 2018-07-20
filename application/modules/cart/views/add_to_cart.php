<div class="card bg-light mb-3" style="max-width: 18rem;">
    <div class="card-header"><h4>Add to Cart</h4></div>
    <div class="card-body">
        <form class="" action="index.html" method="post">
            <div class="form-group row">
                <label for="color" class="col-sm-4 col-form-label">Item ID: </label>
                <div class="col-sm-8">
                    <input class="form-control text-right float-right" name="qty" value="<?php echo $item_id; ?>" disabled>
                </div>
            </div>
            <?php if ($num_colors > 0) { ?>
            <div class="form-group row">
                <label for="color" class="col-sm-4 col-form-label">Color: </label>
                <div class="col-sm-8">
                    <?php
                    echo form_dropdown('color', $color_options, $submitted_color, "class='custom-select'");
                    ?>
                </div>
            </div>
            <?php } ?>
            <?php if ($num_sizes > 0) { ?>
            <div class="form-group row">
                <label for="size" class="col-sm-4 col-form-label">Size: </label>
                <div class="col-sm-8">
                    <?php
                    echo form_dropdown('size', $size_options, $submitted_size, "class='custom-select'");
                    ?>
                </div>
            </div>
            <?php } ?>
            <div class="form-group row">
                <label for="qty" class="col-sm-4 col-form-label">Qty: </label>
                <div class="col-sm-8">
                    <input class="form-control text-right float-right" name="qty" value="1">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-primary" type="button" name="button"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>
        </form>
    </div>
</div>
