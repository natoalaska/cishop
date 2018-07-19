<?php echo $this->load->view('header'); ?>

<?php echo $this->load->view('nav'); ?>

<main role="main">
    <div class="container">
        <?php $this->load->view($view_module . '/' . $view_file); ?>
    </div><!-- /.container -->
</main>

<?php echo $this->load->view('footer'); ?>
