<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_categories extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->model = 'mdl_store_categories';
        $this->load->model($this->model);
    }

    function test() {
        $users['han'] = 42;
        $users['luke'] = 32;
        $users['yoda'] = 900;
        $users['chewie'] = 200;
        $users['zebadee'] = 12;

        echo "<h1>Who's the oldest?</h1>";
        echo $this->get_highest($users);
    }

    function get_highest($array) {
        foreach ($array as $key => $value) {
            if (!isset($highest)) {
                $highest = $key;
            } else if ($value > $array[$highest]) {
                $highest = $key;
            }
        }

        return $highest;
    }

    function _get_category_id_from_category_url($category_url) {
        $query = $this->get_where_custom('url', $category_url);
        foreach($query->result() as $row) {
            $category_id = $row->id;
        }

        if (!isset($category_id)) {
            $category_id = 0;
        }

        return $category_id;
    }

    function _draw_top_nav() {
        $sql = "SELECT * FROM store_categories WHERE parent_cat_id = 0 ORDER BY priority";
        $query = $this->_custom_query($sql);
        foreach($query->result() as $row) {
            $parent_categories[$row->id] = $row->title;
        }
        $data['target_url_start'] = base_url(Modules::run('site_settings/_get_items_segments'));
        $data['parent_categories'] = $parent_categories;

        $this->load->view('top_nav', $data);
    }

    function _get_parent_cat_title($id) {
        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        $parent_cat_id = $data['parent_cat_id'];
        $parent_cat_title = $this->_get_cat_title($parent_cat_id);
        return $parent_cat_title;
    }

    function _get_all_sub_categories_for_dropdown() {
        $parents = $this->get_where_custom('parent_cat_id', 0);

        $categories[''] = "Please Select...";
        foreach($parents->result() as $parent) {
            $sql = "SELECT * FROM store_categories WHERE parent_cat_id = $parent->id ORDER BY title";
            $query = $this->_custom_query($sql);

            print_r($query->result());

            $sub_categories = array();

            foreach($query->result() as $row) {
                $sub_categories[$row->id] = $row->title;
            }

            $categories[$parent->title] = $sub_categories;
        }

        return $categories;
    }

    function view($id) {
        if (!is_numeric($id)) {
            Modules::run('site_security/not_allowed');
        }

        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);

        $query = $this->_custom_query($this->_generate_mysql_query($id));
        $total_items = $query->num_rows();

        $data['query'] = $this->_custom_query($this->_generate_mysql_query($id, TRUE));

        $data['showing_statement'] = Modules::run('bootstrap/_get_showing_statement', $total_items, $this->get_offset(), $this->get_limit());
        $data['pagination'] = Modules::run('bootstrap/_generate_pagination', $this->get_target_url(), $total_items, 4, $this->get_limit());
        $data['symbol'] = Modules::run('site_settings/_get_currency_symbol');
        $data['item_segments']= Modules::run('site_settings/_get_item_segments');
        $data['category_id'] = $id;
        $data['view_module'] = 'store_categories';
        $data['view_file'] = "view";
        echo Modules::run('templates/public_bootstrap', $data);
    }

    function _generate_mysql_query($id, $use_limit = FALSE) {
        $sql = "SELECT store_items.title, store_items.url, store_items.price, store_items.small_pic, store_items.was_price
                FROM store_item_categories INNER JOIN store_items ON store_item_categories.item_id = store_items.id
                WHERE store_item_categories.category_id = $id AND store_items.status = 1";

        if ($use_limit == TRUE) {
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $sql .= " LIMIT $offset, $limit";
        }

        return $sql;
    }

    function get_target_url() {
        $first = $this->uri->segment(1);
        $second = $this->uri->segment(2);
        $third = $this->uri->segment(3);

        $target_url = $first . "/" . $second . "/" . $third;

        return $target_url;
    }

    function get_limit() {
        $limit = 5;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(4);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
    }

    function sort() {
        Modules::run('site_security/_is_admin');

        $number = $this->input->post('number', TRUE);

        for($i = 1; $i <= $number; $i++) {
            $update_id = $_POST['order' . $i];
            $data['priority'] = $i;
            $this->_update($update_id, $data);
        }
    }

    function _count_sub_cats($id) {
        $query = $this->get_where_custom('parent_cat_id', $id);

        return $query->num_rows();
    }

    function _draw_sortable_list($id) {
        $sql = "SELECT * FROM store_categories WHERE parent_cat_id = $id ORDER BY priority";
        $data['query'] = $this->_custom_query($sql);
        $this->load->view('sortable_list', $data);
    }

    function manage($parent_cat_id = NULL) {
        Modules::run('site_security/_is_admin');

        if (!is_numeric($parent_cat_id)) {
            $parent_cat_id = 0;
        }

        $data['sort_this'] = TRUE;
        $data['parent_cat_id'] = $parent_cat_id;
        $data['view_module'] = 'store_categories';
        $data['view_file'] = "manage";
        $data['categories'] = $this->get_where_custom('parent_cat_id', $parent_cat_id);
        echo Modules::run('templates/admin', $data);
    }

    function create($id = null) {
        Modules::run('site_security/_is_admin');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "submit") {

            $this->form_validation->set_rules('title', 'Title', 'required');

            if ($this->form_validation->run($this) == TRUE) {
                $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post', NULL, array('priority'));
                $data['url'] = url_title($data['title']);

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
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        } else {
            $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'post');
        }

        if (!is_numeric($id)) {
            $data['page_headline'] = "Create New Category";
        } else {
            $data['page_headline'] = "Update Category Details";
        }

        $data['options'] = $this->_get_dropdown_options($id);
        $data['num_dropdown_options'] = count($data['options']);
        $data['update_id'] = $id;
        $data['view_module'] = 'store_categories';
        $data['view_file'] = "create";

        echo Modules::run('templates/admin', $data);
    }

    function _get_cat_title($id) {
        $data = Modules::run('site_functions/fetch_data', $this->{$this->model}->table, 'db', $id);
        $cat_title = $data['title'];
        return $cat_title;
    }

    function _get_dropdown_options($id) {
        if (!is_numeric($id)) {
            $id = 0;
        }
        $sql = "SELECT * FROM store_categories WHERE parent_cat_id = 0 AND id != $id";
        $query = $this->_custom_query($sql);

        $options[''] = 'Please Select...';

        foreach($query->result() as $row) {
            $options[$row->id] = $row->title;
        }

        return $options;
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
