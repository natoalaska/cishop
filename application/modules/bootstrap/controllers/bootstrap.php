<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bootstrap extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _draw_breadcrumbs() {
        $this->load->view('breadcrumbs');
    }

    function _get_showing_statement($total_rows, $offset, $limit) {
        $val1 = $offset + 1;
        $val2 = $offset + $limit;
        $val3 = $total_rows;

        if ($val2 > $val3) {
            $val2 = $val3;
        }
        $statement = "Showing $val1 to $val2 of $val3 results";
        return $statement;
    }

    function _generate_pagination($url, $total_rows, $offeset_segment, $limit = 20) {
        $settings = $this->pagination_settings();

        $this->load->library('pagination');
        $config['base_url'] = base_url($url);
        $config['total_rows'] = $total_rows;
        $config['uri_segment'] = $offeset_segment;
        $config['per_page'] = $limit;

        $config['num_links'] = $settings['num_links'];
        $config['full_tag_open'] = $settings['full_tag_open'];
        $config['full_tag_close'] = $settings['full_tag_close'];
        $config['cur_tag_open'] = $settings['cur_tag_open'];
        $config['cur_tag_close'] = $settings['cur_tag_close'];
        $config['num_tag_open'] = $settings['num_tag_open'];
        $config['num_tag_close'] = $settings['num_tag_close'];
        $config['first_link'] = $settings['first_link'];
        $config['first_tag_open'] = $settings['first_tag_open'];
        $config['first_tag_close'] = $settings['first_tag_close'];
        $config['last_link'] = $settings['last_link'];
        $config['last_tag_open'] = $settings['last_tag_open'];
        $config['last_tag_close'] = $settings['last_tag_close'];
        $config['prev_link'] = $settings['prev_link'];
        $config['prev_tag_open'] = $settings['prev_tag_open'];
        $config['prev_tag_close'] = $settings['prev_tag_close'];
        $config['next_link'] = $settings['next_link'];
        $config['next_tag_open'] = $settings['next_tag_open'];
        $config['next_tag_close'] = $settings['next_tag_close'];
        $config['attributes'] = $settings['attributes'];

        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        return $pagination;
    }

    function pagination_settings() {
        $settings['num_links'] = 10;
        $settings['full_tag_open'] = '<nav aria-label="Pagination"><ul class="pagination">';
        $settings['full_tag_close'] = '</ul></nav>';
        $settings['cur_tag_open'] = '<li class="page-item active"><a class="page-link disabled">';
        $settings['cur_tag_close'] = '</a></li>';
        $settings['num_tag_open'] = '<li class="page-item">';
        $settings['num_tag_close'] = '</li>';
        $settings['first_link'] = 'First';
        $settings['first_tag_open'] = '<li class="page-item">';
        $settings['first_tag_close'] = '</li>';
        $settings['last_link'] = 'Last';
        $settings['last_tag_open'] = '<li class="page-item">';
        $settings['last_tag_close'] = '</li>';
        $settings['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
        $settings['prev_tag_open'] = '<li class="page-item">';
        $settings['prev_tag_close'] = '</li>';
        $settings['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $settings['next_tag_open'] = '<li class="page-item">';
        $settings['next_tag_close'] = '</li>';
        $settings['attributes'] = array('class' => 'page-link');

        return $settings;
    }

}
