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

    function update_pword($id) {
        if (!is_numeric($id)) {
            redirect('store_accounts/manage');
        }
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('pword', 'Password', 'required|min_length[7]|max_length[35]');
            $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'required|matches[pword]');

            if ($this->form_validation->run($this) == TRUE) {
                $password = Modules::run('site_security/_hash_string', $this->input->post('pword', TRUE));
                $data['pword'] = $password;

                $this->_update($id, $data);
                $value = "<div class='alert alert-success' role='alert'>The account password was successfully updated.</div>";
                $this->session->set_flashdata('alert', $value);
                redirect("store_accounts/create/$id");
            }
        }

        $data['page_headline'] = 'Update Account Password';
        $data['update_id'] = $id;
        $data['view_module'] = 'store_accounts';
        $data['view_file'] = "update_pword";

        echo Modules::run('templates/admin', $data);
    }

    function create($id = null) {
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('firstname', 'First Name', 'required');

            if ($this->form_validation->run($this) == TRUE) {
                $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post', NULL, array('pword', 'date_made'));

                if (is_numeric($id)) {
                    // update account
                    $this->_update($id, $data);
                    $value = "<div class='alert alert-success' role='alert'>The account details were successfully updated.</div>";
                    $this->session->set_flashdata('alert', $value);
                } else {
                    // insert account
                    $data['date_made'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $value = "<div class='alert alert-success' role='alert'>The account was successfully added.</div>";
                    $this->session->set_flashdata('alert', $value);
                    redirect("store_accounts/create/$update_id");
                }
            }
        }

        if ((is_numeric($id)) && ($submit != "submit")) {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id, array('pword', 'date_made'));
        } else {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post', NULL, array('pword', 'date_made'));
        }

        if (!is_numeric($id)) {
            $data['page_headline'] = "Create New Account";
        } else {
            $data['page_headline'] = "Update Account Details";
        }

        $data['update_id'] = $id;
        $data['view_module'] = 'store_accounts';
        $data['view_file'] = "create";

        echo Modules::run('templates/admin', $data);
    }

    function deleteconf($id) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $data['page_headline'] = "Delete Account";
        $data['update_id'] = $id;
        $data['view_module'] = 'store_accounts';
        $data['view_file'] = "deleteconf";

        echo Modules::run('templates/admin', $data);
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
