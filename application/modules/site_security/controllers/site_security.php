<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_security extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _is_admin() {
        $is_admin = TRUE;

        if ($is_admin != TRUE) {
            redirect('site_security/not_allowed');
        }
    }

    function not_allowed() {
        echo 'not allowed here';
    }

}
