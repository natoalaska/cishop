<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_store_item_sizes extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->table = "store_item_sizes";
    }

    function get($order_by) {
        $this->db->order_by($order_by);
        $query=$this->db->get($this->table);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get($this->table);
        return $query;
    }

    function get_where($id) {
        $this->db->where('id', $id);
        $query=$this->db->get($this->table);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->db->where($col, $value);
        $this->db->order_by('size');
        $query=$this->db->get($this->table);
        return $query;
    }

    function _insert($data) {
        $this->db->insert($this->table, $data);
    }

    function _update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function count_where($column, $value) {
        $this->db->where($column, $value);
        $query=$this->db->get($this->table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $query=$this->db->get($this->table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        $row=$query->row();
        $id=$row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

}
