<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function item() {
        $item_url = $this->uri->segment(3);
        $item_id = Modules::run('store_items/_get_item_id_from_item_url', $item_url);
        echo Modules::run('store_items/view', $item_id);
    }

    function category() {
        $category_url = $this->uri->segment(3);
        $item_id = Modules::run('store_categories/_get_category_id_from_category_url', $category_url);
        echo Modules::run('store_categories/view', $item_id);
    }

}
