<?php echo $this->load->view('header'); ?>

<?php echo $this->load->view('nav'); ?>

<?php echo $this->load->view('sidenav'); ?>

<?php $this->load->view($view_module . '/' . $view_file); ?>

<?php echo $this->load->view('footer'); ?>
