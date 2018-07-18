<?php
// Header("content-type: text/javascript");
?>


$(document).ready(function() {
    $('#all_posts').DataTable({
        ajax: '<?php echo site_url('blog/getPosts/json'); ?>'
    })
});