<style>
    .sort {
        list-style: none;
        border: 1px #bbb solid;
        color: #333;
        padding: 10px;
        margin-bottom: 4px;
        background-color: #fff;
    }
</style>

<ul id="sortlist">
    <?php
    foreach($query->result() as $row) {
        $num_sub_cats = Modules::run('store_categories/_count_sub_cats', $row->id);

        if ($row->parent_cat_id == 0) {
            $parent_cat_title = ' ';
        } else {
            $parent_cat_title = Modules::run('store_categories/_get_cat_title', $row->parent_cat_id);
        }
    ?>
    <li class="sort clearfix" id="<?php echo $row->id; ?>">
        <i class="icon-sort"></i> <?php echo $row->title; ?>
        <?php echo $parent_cat_title; ?>

        <div class="pull-right">
        <?php
        if ($num_sub_cats > 0) {
            if ($num_sub_cats == 1) $entity = 'Category';
            else $entity = 'Categories';
            ?>
            <a class="btn btn-default btn-mini" href="<?php echo base_url("store_categories/manage/$row->id"); ?>">
                <i class="halflings-icon white eye-open"></i> Sub <?php echo $num_sub_cats . ' ' . $entity; ?>
            </a>
        <?php }?>
            <a class="btn btn-info btn-mini" href="<?php echo base_url("store_categories/create/$row->id"); ?>">
                <i class="halflings-icon white edit"></i>
            </a>
        </div>
    </li>
    <?php } ?>
</ul>
