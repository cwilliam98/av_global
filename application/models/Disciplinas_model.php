<?php



class Disciplinas_model extends CI_Model {

	
	function cadastraDisciplina($disciplina){
		$this->db->insert('disciplinas', $disciplina);
	    return $this->db->insert_id();
	}
	function getDisciplinaById($id)
	{
		$this->db->select('*');
		$this->db->from('disciplinas');
		$this->db->where('id',$id);
		$resultado= $this->db->get()->result_array();
		return  reset($resultado);
	}
	
	function getTodasDisciplinas(){
		return $this->db->order_by('nome')->get('disciplinas')->result_array();

	}

	function getTodosProfessores(){
		return $this->db
		->where('contexto','professor')
		->order_by('nome')
		->get('usuarios')
		->result_array();

	}
}