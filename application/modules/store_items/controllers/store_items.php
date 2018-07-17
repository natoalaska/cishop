<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_items extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_store_items';
        $this->load->model($this->model);
    }

    function manage() {
        Modules::run('site_security/_is_admin');

        $data['view_module'] = 'store_items';
        $data['view_file'] = "manage";
        echo Modules::run('templates/admin', $data);
    }

    function create() {
        Modules::run('site_security/_is_admin');

        $data['view_module'] = 'store_items';
        $data['view_file'] = "create";

        $submit = $this->input->post('submit', TRUE);

        $update_id = $this->uri->segment(3);

        if ($submit == "submit") {

        }

        if ((is_numeric($update_id)) && ($submit != "submit")) {
            $data['item'] = $this->fetch_data_from_db($update_id);
        } else {
            $data['item'] = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Create New Item";
        } else {
            $data['headline'] = "Update Item Details";
        }

        echo Modules::run('templates/admin', $data);
    }

    function fetch_data_from_db($id) {
        $query = $this->get_where($id);
        foreach($query->result() as $row) {
            $data['title'] = $row->title;
            $data['url'] = $row->url;
            $data['price'] = $row->price;
            $data['description'] = $row->description;
            $data['big_pic'] = $row->big_pic;
            $data['small_pic'] = $row->small_pic;
            $data['was_price'] = $row->was_price;
        }

        if (!isset($data)) {
            $data = "";
        }

        return $data;
    }

    function fetch_data_from_post() {
        $data['title'] = $this->input->post('title', TRUE);
        $data['price'] = $this->input->post('price', TRUE);
        $data['was_price'] = $this->input->post('was_price', TRUE);
        $data['description'] = $this->input->post('description', TRUE);

        return $data;
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
