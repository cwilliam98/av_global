<?php



class Formularios_model extends CI_Model {
	
	function cadastra($data){
		$this->db->insert('formularios', $data);
	    return $this->db->insert_id();
	}
	
	
}