<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_settings extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _get_item_segments() {
        // return the segments for the store_item page (products page)
        $segments = "store/item/";
        return $segments;
    }

    function _get_items_segments() {
        // return the segments for the category pages
        $segments = "store/category/";
        return $segments;
    }

    function _get_page_not_found_message() {
        $msg = "<h1>Page Not Found.</h1><br>";
        $msg .= "<p>This is not the page you are looking for.</p>";
        return $msg;
    }

    function _get_currency_symbol() {
        return '&dollar;';
    }

}
