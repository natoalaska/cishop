<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_items extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_store_items';
        $this->load->model($this->model);

        $this->load->library('form_validation');
    }

    function _get_item_id_from_item_url($item_url) {
        $query = $this->get_where_custom('url', $item_url);
        foreach($query->result() as $row) {
            $item_id = $row->id;
        }

        if (!isset($item_id)) {
            $item_id = 0;
        }

        return $item_id;
    }

    function view($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }

        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);

        $data['item_id'] = $id;
        $data['view_module'] = 'store_items';
        $data['view_file'] = "view";
        echo Modules::run('templates/public_bootstrap', $data);
    }

    function manage() {
        Modules::run('site_security/_is_admin');

        $data['view_module'] = 'store_items';
        $data['view_file'] = "manage";
        $data['items'] = $this->get('title');
        echo Modules::run('templates/admin', $data);
    }

    # TODO: get this to work with file manager.
    function upload_image($id = null) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "cancel") {
            redirect('store_items/create/' . $id);
        }

        $data['headline'] = "Upload Image";
        $data['update_id'] = $id;
        $data['view_module'] = 'store_items';
        $data['view_file'] = "upload_image";

        echo Modules::run('templates/admin', $data);
    }

    function _generate_thumbnail($file_name) {
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/images/big_pics/' . $file_name;
        $config['new_image']      = './assets/images/small_pics/';
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function delete_image($id) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

        $big_pic_path = "./assets/images/big_pics/$big_pic";
        $small_pic_path = "./assets/images/small_pics/$small_pic";

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        }

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        }

        unset($data);
        $data['big_pic'] = "";
        $data['small_pic'] = "";
        $this->_update($id, $data);

        $value = "<div class='alert alert-success' role='alert'>Your image was successfully deleted.</div>";
        $this->session->set_flashdata('alert', $value);

        redirect("store_items/create/$id");
    }

    # TODO: have the error redirect back to upload_image with flashdata.
    function do_upload($id = null) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "cancel") {
            redirect('store_items/create/' . $id);
        }

        $config['upload_path']      = './assets/images/big_pics/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 150;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<div class='alert alert-error' role='alert'>","</div>"));
            $data['headline'] = "Upload Image";
            $data['update_id'] = $id;
            $data['view_module'] = 'store_items';
            $data['view_file'] = "upload_image";

            echo Modules::run('templates/admin', $data);
        } else {
            $value = "<div class='alert alert-success' role='alert'>Your image was successfully uploaded.</div>";
            $this->session->set_flashdata('alert', $value);
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name);

            $update_data['big_pic'] = $file_name;
            $update_data['small_pic'] = $file_name;
            $this->_update($id, $update_data);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $id;
            $data['view_module'] = 'store_items';
            $data['view_file'] = "upload_success";

            echo Modules::run('templates/admin', $data);
        }
    }

    # TODO: work on optimizing. consider having separate funciton to load form and to add/update data
    function create($id = null) {
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('title', 'Item Title', 'required|max_length[240]|callback_item_check'); // TODO: change callback to is_unique???
            $this->form_validation->set_rules('price', 'Item Price', 'required|numeric');
            $this->form_validation->set_rules('was_price', 'Previous Price', 'numeric');
            $this->form_validation->set_rules('status', 'Status', 'required|numeric');
            $this->form_validation->set_rules('description', 'Item Description', 'required');

            if ($this->form_validation->run($this) == TRUE) {
                $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post', NULL, array('big_pic', 'small_pic'));
                $data['url'] = url_title($data['title']);

                if (is_numeric($id)) {
                    // update item
                    $this->_update($id, $data);
                    $value = "<div class='alert alert-success' role='alert'>The item details were successfully updated.</div>";
                    $this->session->set_flashdata('alert', $value);
                } else {
                    // insert item
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $value = "<div class='alert alert-success' role='alert'>The item was successfully added.</div>";
                    $this->session->set_flashdata('alert', $value);
                    redirect("store_items/create/$update_id");
                }
            }
        }

        if ((is_numeric($id)) && ($submit != "submit")) {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        } else {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post');
        }

        if (!is_numeric($id)) {
            $data['headline'] = "Create New Item";
        } else {
            $data['headline'] = "Update Item Details";
        }

        $data['update_id'] = $id;
        $data['view_module'] = 'store_items';
        $data['view_file'] = "create";

        echo Modules::run('templates/admin', $data);
    }

    function deleteconf($id) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $data['headline'] = "Delete Item";
        $data['update_id'] = $id;
        $data['view_module'] = 'store_items';
        $data['view_file'] = "deleteconf";

        echo Modules::run('templates/admin', $data);
    }

    function delete($id) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $value = "<div class='alert alert-success' role='alert'>The item was successfully deleted.</div>";
        $this->session->set_flashdata('alert', $value);

        $this->_process_delete($id);

        redirect('store_items/manage');
    }

    function _process_delete($id) {
        // delete item colors
        Modules::run('store_item_colors/_delete_for_item', $id);

        // delete item sizes
        Modules::run('store_item_sizes/_delete_for_item', $id);

        // delete item categories
        Modules::run('store_item_categories/_delete_for_item', $id);

        // delete item image
        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

        $big_pic_path = "./assets/images/big_pics/$big_pic";
        $small_pic_path = "./assets/images/small_pics/$small_pic";

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        }

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        }

        unset($data);
        $data['big_pic'] = "";
        $data['small_pic'] = "";
        $this->_update($id, $data);

        // delete item
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

    // Callbacks
    function item_check($str) {
        $item_url = url_title($str);
        $update_id = $this->uri->segment(3);
        $query = "SELECT * FROM store_items WHERE title = '$str' and url = '$item_url'";

        if (is_numeric($update_id)) {
            $query .= " and id != '$update_id'";
        }

        $query = $this->_custom_query($query);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
                $this->form_validation->set_message('item_check', "The {field} '$str' is already used. Enter a different one.");
                return FALSE;
        } else {
                return TRUE;
        }
    }

}
