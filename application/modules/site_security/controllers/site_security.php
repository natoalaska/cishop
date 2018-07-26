<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_security extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _is_admin() {
        $is_admin = TRUE;

        if ($is_admin != TRUE) {
            redirect('site_security/not_allowed');
        }
    }

    function not_allowed() {
        echo 'not allowed here';
    }

    function _hash_string($str) {
        $hashed_string = password_hash($str, PASSWORD_BCRYPT, array(
            'cost' => 11
        ));

        return $hashed_string;
    }

    function _verify_hash($str, $hashed_string) {
        $result = password_verify($str, $hashed_string);

        return $result;
    }

    function _generate_random_string($length) {
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

}
