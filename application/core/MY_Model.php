<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
	
	private function _get_datatables_query() {
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) {
			if($_POST['search']['value']) {
				if($i===0) {
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
    }
	
	/** Creates a datatable **/
	function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
	
	function count_filtered() {
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	/** Performs count all results **/
	function count_all($where = NULL) {
		$this->db->from($this->table);
		if(isset($where)) {
			$this->db->where($where);
		}
		return $this->db->count_all_results();
	}
	
	/** Performs select by id **/
	function get_by_id($id) {
		if(isset($this->column_select)) {
			$this->db->select($this->column_select);
		}
		$this->db->from($this->table);
		
		$this->db->where('id',$id);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	/** Performs insert **/
	function save($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	
	/** Performs update **/
	function update($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	
	/** Performs delete **/
	function delete_by_id($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	
	/** Performs select all **/
	function select($order = null) {
		if(isset($this->column_select)) {
			$this->db->select($this->column_select);
		}
		if(!empty($order)) {
			$this->db->order_by($order);
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	/** Performs query to return all where **/
	function select_where($where, $order = NULL) {
		$this->db->from($this->table);
		$this->db->where($where);
		if(isset($order)) {
			$this->db->order_by($order);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	/** Gets a list of columns for the datatable **/
	function get_datatable_columns() {
		return $this->column_order;
	}
	
	/** Performs a search on the table **/
	function search($string) {
		$this->db->from($this->table);
		$i = 0;

		foreach ($this->column_search as $item) {
			if(isset($string)) {
				if($i===0) {
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $string);
				} else {
					$this->db->or_like($item, $string);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		$query = $this->db->get();
		
		if($query->num_rows() == 0) {
			return 0;
		}
		return $query->result();
	}
    
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */