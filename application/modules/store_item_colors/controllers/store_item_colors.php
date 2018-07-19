<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

# TODO have the checking security be a function. this is now used in a lot of differant areas.
class Store_item_colors extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_store_item_colors';
        $this->load->model($this->model);
    }

    function update($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $data['colors'] = $this->get_where_custom('item_id', $id);
        $data['num_rows'] = $data['colors']->num_rows();
        $data['headline'] = "Update Item Colors";
        $data['update_id'] = $id;
        $data['view_module'] = 'store_item_colors';
        $data['view_file'] = "update";

        echo Modules::run('templates/admin', $data);
    }

    function submit($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);
        $color = trim($this->input->post('color', TRUE));

        if ($submit == 'finished') {
            redirect("store_items/create/$id");
        } else if ($submit == 'submit') {
            if ($color != '') {
                $data['item_id'] = $id;
                $data['color'] = $color;
                $this->_insert($data);

                $value = "<div class='alert alert-success' role='alert'>The item color has been added.</div>";
                $this->session->set_flashdata('item', $value);

            }
        }

        redirect("store_item_colors/update/$id");
    }

    function delete($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $query = $this->get_where($id);
        foreach($query->result() as $row) {
            $item_id = $row->item_id;
        }

        $this->_delete($id);

        $value = "<div class='alert alert-success' role='alert'>The item color has been deleted.</div>";
        $this->session->set_flashdata('item', $value);

        redirect("store_item_colors/update/$item_id");
    }

    function _delete_for_item($id) {
        $query = "DELETE FROM store_item_colors WHERE item_id = $id";
        $this->_custom_query($query);
    }

    function get($order_by) {
        $query = $this->{$this->model}->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->{$this->model}->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->{$this->model}->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->{$this->model}->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->{$this->model}->_insert($data);
    }

    function _update($id, $data) {
        $this->{$this->model}->_update($id, $data);
    }

    function _delete($id) {
        $this->{$this->model}->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->{$this->model}->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->{$this->model}->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->{$this->model}->_custom_query($mysql_query);
        return $query;
    }

}
