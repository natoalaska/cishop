<?php echo $this->load->view('header'); ?>

<?php echo $this->load->view('nav'); ?>

<main role="main">
    <div class="container">
        <?php if (isset($content)) {
            if ($url == "") {
                require_once('homepage_content.php');
            } else if ($url == "contactus") {
                echo Modules::run('contactus/_draw_form');
            } else {
                echo nl2br($content);
            }

        } else if (isset($view_file)) {
            $this->load->view($view_module . '/' . $view_file);
        } ?>
    </div><!-- /.container -->
</main>

<?php echo $this->load->view('footer'); ?>
