<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BLog extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_blog';
        $this->load->model($this->model);
    }

    function _draw_feed_hp() {
        $this->load->helper('text');
        $sql = "SELECT * FROM blog ORDER BY date_published DESC LIMIT 0,3 ";
        $data['query'] = $this->_custom_query($sql);

        $this->load->view('feed_hp', $data);
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

        $data['view_module'] = 'blog';
        $data['view_file'] = "manage";
        $data['query'] = $this->get('date_published DESC');
        echo Modules::run('templates/admin', $data);
    }

    function upload_image($id = null) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "cancel") {
            redirect('blog/create/' . $id);
        }

        $data['page_headline'] = "Upload Image";
        $data['update_id'] = $id;
        $data['view_module'] = 'blog';
        $data['view_file'] = "upload_image";

        echo Modules::run('templates/admin', $data);
    }

    function do_upload($id = null) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "cancel") {
            redirect('blog/create/' . $id);
        }

        $config['upload_path']      = './assets/images/blog_pics/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 200;
        $config['max_width']        = 2024;
        $config['max_height']       = 1268;
        $config['file_name']        = Modules::run('site_security/_generate_random_string', 16);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<div class='alert alert-error' role='alert'>","</div>"));
            $data['page_headline'] = "Upload Image";
            $data['update_id'] = $id;
            $data['view_module'] = 'blog';
            $data['view_file'] = "upload_image";

            echo Modules::run('templates/admin', $data);
        } else {
            $value = "<div class='alert alert-success' role='alert'>Your image was successfully uploaded.</div>";
            $this->session->set_flashdata('alert', $value);
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];

            //print_r($upload_data); die;

            $raw_name = $upload_data['raw_name'];
            $file_ext = $upload_data['file_ext'];
            $thumbnail_name = $raw_name . "_thumb" . $file_ext;

            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name, $thumbnail_name);

            $update_data['picture'] = $file_name;
            $this->_update($id, $update_data);

            $data['page_headline'] = "Upload Success";
            $data['update_id'] = $id;
            $data['view_module'] = 'blog';
            $data['view_file'] = "upload_success";

            echo Modules::run('templates/admin', $data);
        }
    }

    function delete_image($id) {
        if (!is_numeric($id) || $id == null) {
            Modules::run('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        $picture = $data['picture'];

        $big_pic_path = "./assets/images/blog_pics/$picture";
        $small_pic_path = "./assets/images/blog_pics/" . str_replace(".", "_thumb.", $picture);

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        }

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        }

        unset($data);
        $data['picture'] = "";
        $this->_update($id, $data);

        $value = "<div class='alert alert-success' role='alert'>Your image was successfully deleted.</div>";
        $this->session->set_flashdata('alert', $value);

        redirect("blog/create/$id");
    }

    function _generate_thumbnail($file_name, $thumbnail_name) {
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/images/blog_pics/' . $file_name;
        $config['new_image']      = './assets/images/blog_pics/' . $thumbnail_name;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 200;
        $config['height']           = 200;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function create($id = null) {
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('title', 'Page Title', 'required|max_length[250]'); // TODO: change callback to is_unique???
            $this->form_validation->set_rules('content', 'Page Content', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('date_published', 'Date Published', 'required');

            if ($this->form_validation->run($this) == TRUE) {
                $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post', NULL, array('picture'));
                $data['url'] = url_title($data['title']);
                $data['time_published'] = $this->input->post('time_published', true);
                $data['date_published'] = Modules::run('timedate/make_timestamp_from_datepicker', $data['date_published'], $data['time_published']);

                unset($data['time_published']);

                if (is_numeric($id)) {
                    // update post
                    $this->_update($id, $data);
                    $value = "<div class='alert alert-success' role='alert'>The post details were successfully updated.</div>";
                    $this->session->set_flashdata('alert', $value);
                    redirect("blog/create/$id");
                } else {
                    // insert post
                    $this->_insert($data);
                    $update_id = $this->get_max();

                    $value = "<div class='alert alert-success' role='alert'>The post was successfully added.</div>";
                    $this->session->set_flashdata('alert', $value);
                    redirect("blog/create/$update_id");
                }
            }
        }

        if ((is_numeric($id)) && ($submit != "submit")) {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        } else {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post');
        }

        //echo $data['date_published']; die;

        if (!is_numeric($id)) {
            $data['page_headline'] = "Create New Post";
        } else {
            $data['page_headline'] = "Update Post Details";
        }

        $data['time_published'] = $this->input->post('time_published', true);

        if ($data['date_published'] > 0 && $data['time_published'] == "") {
            echo $data['time_published'];
            $data['time_published'] = Modules::run('timedate/get_time', $data['date_published']);
            $data['date_published'] = Modules::run('timedate/get_nice_date', $data['date_published'], 'datepicker');
        } else {
            $data['time_published'] = date('h:i A');
            $data['date_published'] = date('m/d/Y');
        }

        $data['update_id'] = $id;
        $data['view_module'] = 'blog';
        $data['view_file'] = "create";

        echo Modules::run('templates/admin', $data);
    }

    function deleteconf($id) {
        echo $id;
        if (!is_numeric($id) || $id == null) {
            redirect('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $data['page_headline'] = "Delete Page";
        $data['update_id'] = $id;
        $data['view_module'] = 'blog';
        $data['view_file'] = "deleteconf";

        echo Modules::run('templates/admin', $data);
    }

    function delete($id) {
        if (!is_numeric($id) || $id == null) {
            redirect('site_security/not_allowed');
        }
        Modules::run('site_security/_is_admin');

        $value = "<div class='alert alert-success' role='alert'>The post was successfully deleted.</div>";
        $this->session->set_flashdata('alert', $value);

        $this->_process_delete($id);

        redirect('blog/manage');
    }

    function _process_delete($id) {
        // delete post
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
