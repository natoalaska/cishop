<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _draw_add_to_cart($item_id) {
        $submitted_color = $this->input->post('submitted_color', TRUE);
        if ($submitted_color == "") {
            $color_options[''] = "Select...";
        }

        $submitted_size = $this->input->post('submitted_size', TRUE);
        if ($submitted_size == "") {
            $size_options[''] = "Select...";
        }

        $query = Modules::run('store_item_colors/get_where_custom', 'item_id', $item_id);
        $data['num_colors'] = $query->num_rows() ;
        foreach($query->result() as $row) {
            $color_options[$row->id] = $row->color;
        }

        $query = Modules::run('store_item_sizes/get_where_custom', 'item_id', $item_id);
        $data['num_sizes'] = $query->num_rows() ;
        foreach($query->result() as $row) {
            $size_options[$row->id] = $row->size;
        }

        $data['item_id'] = $item_id;
        $data['color_options'] = $color_options;
        $data['size_options'] = $size_options;
        $data['submitted_color'] = $submitted_color;
        $data['submitted_size'] = $submitted_size;
        $this->load->view('add_to_cart', $data);
    }


}
