<?php



class Itens_prova_model extends CI_Model {
	
	function cadastra($data){
		$this->db->insert('itens_prova', $data);
	    return $this->db->insert_id();
	}
	
	
}