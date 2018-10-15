<?php



class Disciplinas_model extends CI_Model {

	
	function cadastraDisciplina($disciplina){
		$this->db->replace('disciplinas', $disciplina);
		return $this->db->insert_id();
	}
	function getDisciplinaById($id)
	{
		$this->db->select('*');
		$this->db->from('disciplinas');
		$this->db->where('id',$id);
		$this->db->where('situacao','ativo');
		$resultado= $this->db->get()->result_array();
		return  reset($resultado);
	}
	
	function getTodasDisciplinas(){
		return $this->db
		->select('usuarios.nome professor, disciplinas.nome, disciplinas.id, disciplinas.situacao')
		->join('usuarios','disciplinas.professor = usuarios.id')
		->order_by('nome')
		->get('disciplinas')
		->result_array();

	}

	function getTodosProfessores(){
		return $this->db
		->where('contexto','professor')
		->order_by('nome')
		->get('usuarios')
		->result_array();

	}

	function alteraDisciplina($data,$id){
		$this->db->where('id' , $id);
		$retorno = $this->db->update('disciplinas', $data);

		return $retorno;

	}

	function inativaDisciplina($id){
		$this->db->where('id' , $id);
		$retorno = $this->db
		->set('situacao','inativo')
		->update('disciplinas');

		return $retorno;

	}
}