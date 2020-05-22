<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_mdl extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function fetch_all(){
		$rows = $this->db->get('category');
		return $rows->result();
	}
}