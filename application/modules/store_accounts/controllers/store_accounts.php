<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_accounts extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_store_accounts';
        $this->load->model($this->model);
    }

    function manage() {
        Modules::run('site_security/_is_admin');

        $data['view_module'] = 'store_accounts';
        $data['view_file'] = "manage";
        $data['accounts'] = $this->get('lastname');
        echo Modules::run('templates/admin', $data);
    }

    function create($id = null) {
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('firstname', 'First Name', 'required');

            if ($this->form_validation->run($this) == TRUE) {
                $data = $this->fetch_data_from_post();
                //$data['url'] = url_title($data['title']);

                if (is_numeric($id)) {
                    // update account
                    $this->_update($id, $data);
                    $value = "<div class='alert alert-success' role='alert'>The account details were successfully updated.</div>";
                    $this->session->set_flashdata('alert', $value);
                } else {
                    // insert account
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $value = "<div class='alert alert-success' role='alert'>The account was successfully added.</div>";
                    $this->session->set_flashdata('alert', $value);
                    redirect("store_accounts/create/$update_id");
                }
            }
        }

        if ((is_numeric($id)) && ($submit != "submit")) {
            $data = $this->fetch_data_from_db($id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($id)) {
            $data['headline'] = "Create New Account";
        } else {
            $data['headline'] = "Update Account Details";
        }

        $data['update_id'] = $id;
        $data['view_module'] = 'store_accounts';
        $data['view_file'] = "create";

        echo Modules::run('templates/admin', $data);
    }

    function fetch_data_from_db($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }

        // $data['firstname'] = $row->firstname;
        // $data['lastname'] = $row->lastname;
        // $data['company'] = $row->company;
        // $data['address1'] = $row->address1;
        // $data['address2'] = $row->address2;
        // $data['town'] = $row->town;
        // $data['country'] = $row->country;
        // $data['postcode'] = $row->postcode;
        // $data['telnum'] = $row->telnum;
        // $data['email'] = $row->email;
        // $data['date_made'] = $row->date_made;
        // $data['pword'] = $row->pword;
        $data = $this->autogen('db');

        return $data;
    }

    function fetch_data_from_post() {
        // $data['firstname'] = $this->input->post('firstname', TRUE);
        // $data['lastname'] = $this->input->post('lastname', TRUE);
        // $data['was_price'] = $this->input->post('was_price', TRUE);
        // $data['description'] = $this->input->post('description', TRUE);
        // $data['status'] = $this->input->post('status', TRUE);
        $data = $this->autogen('post');

        return $data;
    }

    # TODO: add this to a site_function
    // $type = post or db
    function autogen($type, $id = NULL) {
        $sql = "SHOW COLUMNS FROM store_accounts";
        $query = $this->_custom_query($sql);

        if (is_numeric($id) && $id != NULL) {
            $db_query = $this->get_where($id);
        }

        foreach($query->result() as $row) {
            $column_name = $row->Field;
            if ($column_name != 'id') {
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
