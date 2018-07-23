<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_categories extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_store_categories';
        $this->load->model($this->model);
    }

    function manage() {
        Modules::run('site_security/_is_admin');

        $data['view_module'] = 'store_categories';
        $data['view_file'] = "manage";
        $data['categories'] = $this->get('title');
        echo Modules::run('templates/admin', $data);
    }

    function create($id = null) {
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('title', 'Title', 'required');

            if ($this->form_validation->run($this) == TRUE) {
                $data = $this->fetch_data('post');

                if (is_numeric($id)) {
                    // update account
                    $this->_update($id, $data);
                    $value = "<div class='alert alert-success' role='alert'>The category details were successfully updated.</div>";
                    $this->session->set_flashdata('alert', $value);
                } else {
                    // insert account
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $value = "<div class='alert alert-success' role='alert'>The category was successfully added.</div>";
                    $this->session->set_flashdata('alert', $value);
                    redirect("store_categories/create/$update_id");
                }
            }
        }

        if ((is_numeric($id)) && ($submit != "submit")) {
            $data = $this->fetch_data('db', $id);
        } else {
            $data = $this->fetch_data('post');
        }

        if (!is_numeric($id)) {
            $data['headline'] = "Create New Category";
        } else {
            $data['headline'] = "Update Category Details";
        }

        $data['update_id'] = $id;
        $data['view_module'] = 'store_categories';
        $data['view_file'] = "create";

        echo Modules::run('templates/admin', $data);
    }

    # TODO: add this to a site_function
    // $type = post or db
    function fetch_data($type, $id = NULL, $ignore = NULL) {
        $ignore[] = 'id';

        $sql = "SHOW COLUMNS FROM store_accounts";
        $query = $this->_custom_query($sql);

        if (is_numeric($id) && $id != NULL) {
            $db_query = $this->get_where($id);
        }

        foreach($query->result() as $row) {
            $column_name = $row->Field;
            if (!in_array($column_name, $ignore)) {
                if ($type == 'post') $data[$column_name] = $this->input->post($column_name, TRUE);
                if ($type == 'db') {
                    if (isset($db_query) && $db_query->num_rows() > 0) {
                        foreach($db_query->result() as $row) {
                            $data["{$column_name}"] = $row->{$column_name};
                        }
                    } else $data = NULL;
                }
            }
        }

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
