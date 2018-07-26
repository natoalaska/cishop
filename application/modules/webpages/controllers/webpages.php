<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Webpages extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_webpages';
        $this->load->model($this->model);
    }

    function view($id) {
        if (!is_numeric($id)) {
            redirect('site_security/not_allowed');
        }

        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);

        $data['view_module'] = '';
        $data['view_file'] = "";
        echo Modules::run('templates/public_bootstrap', $data);
    }

    function manage() {
        Modules::run('site_security/_is_admin');

        $data['view_module'] = 'webpages';
        $data['view_file'] = "manage";
        $data['query'] = $this->get('url');
        echo Modules::run('templates/admin', $data);
    }

    function create($id = null) {
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('title', 'Page Title', 'required|max_length[250]'); // TODO: change callback to is_unique???
            $this->form_validation->set_rules('content', 'Page Content', 'required');

            if ($this->form_validation->run($this) == TRUE) {
                $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post');
                $data['url'] = url_title($data['title']);
                if (is_numeric($id)) {
                    // update page
                    if ($id < 3) {
                        unset($data['url']);
                    }
                    $this->_update($id, $data);
                    $value = "<div class='alert alert-success' role='alert'>The page details were successfully updated.</div>";
                    $this->session->set_flashdata('alert', $value);
                } else {
                    // insert page
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $value = "<div class='alert alert-success' role='alert'>The page was successfully added.</div>";
                    $this->session->set_flashdata('alert', $value);
                    redirect("webpages/create/$update_id");
                }
            }
        }

        if ((is_numeric($id)) && ($submit != "submit")) {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        } else {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post');
        }

        if (!is_numeric($id)) {
            $data['page_headline'] = "Create New Page";
        } else {
            $data['page_headline'] = "Update Page Details";
        }

        $data['update_id'] = $id;
        $data['view_module'] = 'webpages';
        $data['view_file'] = "create";

        echo Modules::run('templates/admin', $data);
    }

    function deleteconf($id) {
        echo $id;
        if (!is_numeric($id) || $id == null) {
            redirect('site_security/not_allowed');
        } else if ($id < 3) {
            redirect('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $data['page_headline'] = "Delete Page";
        $data['update_id'] = $id;
        $data['view_module'] = 'webpages';
        $data['view_file'] = "deleteconf";

        echo Modules::run('templates/admin', $data);
    }

    function delete($id) {
        if (!is_numeric($id) || $id == null) {
            redirect('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $value = "<div class='alert alert-success' role='alert'>The page was successfully deleted.</div>";
        $this->session->set_flashdata('alert', $value);

        $this->_process_delete($id);

        redirect('webpages/manage');
    }

    function _process_delete($id) {
        // delete page
        $this->_delete($id);
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
