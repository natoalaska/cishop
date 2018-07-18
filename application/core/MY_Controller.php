<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {
    
    function __construct() {
        parent::__construct();
        
        $uri = uri_string();
        $match = fnmatch('admin*', $uri);
        if ($match) {
            $role = $this->session->role;
            if(!isset($role) || $role !== 'admin') {
                redirect(site_url());
            }
        }
        
    }
    
    function count($table, $where = NULL) {
		return $this->{$table}->count_all($where);
	}
    
}