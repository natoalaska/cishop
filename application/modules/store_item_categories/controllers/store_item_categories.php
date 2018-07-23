<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

# TODO have the checking security be a function. this is now used in a lot of differant areas.
class Store_item_categories extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_store_item_categories';
        $this->load->model($this->model);
    }

    function update($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        // get all sub categories
        $sub_categories = Modules::run('store_categories/_get_all_sub_categories_for_dropdown');

        // get all assigned categories
        $query = $this->get_where_custom('item_id', $id);
        $data['query'] = $query;
        $data['num_rows'] = $query->num_rows();
        foreach($query->result() as $row) {
            $category[$row->category_id] = Modules::run('store_categories/_get_cat_title', $row->category_id);
            $parent_cat_title = Modules::run('store_categories/_get_parent_cat_title', $row->category_id);
            $assigned_categories[$parent_cat_title] = $category;
        }

        if (!isset($category)) {
            $assigned_categories = "";
        } else {
            foreach($assigned_categories as $k => $subArr) {
                foreach($subArr as $key => $value) {
                    unset($sub_categories[$k][$key]);
                }
            }
        }

        $data['headline'] = "Update Item Categories";
        $data['item_id'] = $id;
        $data['options'] = $sub_categories;
        $data['view_module'] = 'store_item_categories';
        $data['view_file'] = "update";

        echo Modules::run('templates/admin', $data);
    }

    function submit($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);
        $category_id = trim($this->input->post('category_id', TRUE));

        if ($submit == 'finished') {
            redirect("store_items/create/$id");
        } else if ($submit == 'submit') {
            if ($category_id != '') {
                $data['item_id'] = $id;
                $data['category_id'] = $category_id;

                $this->_insert($data);

                $value = "<div class='alert alert-success' role='alert'>The item category has been assigned.</div>";
                $this->session->set_flashdata('alert', $value);

            }
        }

        redirect("store_item_categories/update/$id");
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

        $value = "<div class='alert alert-success' role='alert'>The item category has been deleted.</div>";
        $this->session->set_flashdata('alert', $value);

        redirect("store_item_categories/update/$item_id");
    }

    function _delete_for_item($id) {
        $query = "DELETE FROM store_item_categories WHERE item_id = $id";
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
