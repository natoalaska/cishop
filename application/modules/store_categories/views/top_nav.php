<?php foreach($parent_categories as $key => $value) {
    $parent_id = $key;
    $parent_title = $value;
?>
<li class="dropdown">
<a class="nav-link dropdown-toggle" href="http://example.com" id="category-<?php echo $parent_id; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $parent_title; ?></a>
<div class="dropdown-menu" aria-labelledby="category-<?php echo $parent_id; ?>">
    <?php
    $sub_categories = Modules::run('store_categories/get_where_custom', 'parent_cat_id', $parent_id);
    foreach($sub_categories->result() as $row) {
    ?>
    <a class="dropdown-item" href=""><?php echo $row->title; ?></a>
    <?php } ?>
</div>
</li>
<?php } ?>
