<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_mdl extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	/**
	 * Obtiene todos los registros de una tabla
	 * @param  string $table Nombre de la tabla
	 * @return array         Array de registros
	 */
	public function fetch_all($table){
		$rows = $this->db->get($table);
		return $rows->result();
	}

	public function fetch_by_field($table, $field, $value, $limit = null){
		$this->db->where($field, $value);
		if (!is_null($limit)) $this->db->limit($limit);
		$rows = $this->db->get($table);
		return $rows->result();	
	}

	function get_type_name_by_id($type, $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                $type . '_id' => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }
        }
    }
}