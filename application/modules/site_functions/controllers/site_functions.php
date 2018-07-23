<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_functions extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Returns the data from either a post or database.
     *
     * @param mixed $model  The model where the data fields will come from.
     * @param mixed $type   The type of the data. e.g. POST, Database
     * @param int   $id     The id of the database object trying to return.
     * @param array $ignore Additional fields to ignore while creating the data.
     *
     * @return array Data for tables, data input, etc.
     */
    function fetch_data($table, $type, int $id = NULL, array $ignore = NULL) {
        $ignore[] = 'id';

        $model_path = $table . '/mdl_' . $table;
        $model = 'mdl_' . $table;
        $this->load->model($model_path);
        $sql = "SHOW COLUMNS FROM $table";
        $query = $this->$model->_custom_query($sql);

        if (is_numeric($id) && $id != NULL) {
            $db_query = $this->$model->get_where($id);
        }

        foreach($query->result() as $row) {
            $column_name = $row->Field;
            if (!in_array($column_name, $ignore)) {
                if ($type == 'post') $data[$column_name] = $this->input->post($column_name, TRUE);
                if ($type == 'db') {
                    if (isset($db_query) && $db_query->num_rows() > 0) {
                        foreach($db_query->result() as $row) {
                            $data["{$column_name}"] = $row->{$column_name};
                        }
                    } else $data = NULL;
                }
            }
        }

        return $data;
    }

}
