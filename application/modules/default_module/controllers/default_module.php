<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Default_module extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $first_bit = trim($this->uri->segment(1));

        $query = Modules::run('webpages/get_where_custom', 'url', $first_bit);
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            foreach($query->result() as $row) {
                $data = Modules::run('site_functions/fetch_data', 'webpages', 'db', $row->id);
            }
        } else {
            $data['content'] = Modules::run('site_settings/_get_page_not_found_message');
        }
        echo Modules::run('templates/public_bootstrap', $data);
    }

}
