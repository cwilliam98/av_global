<?php

class Disciplinas_model extends CI_Model {

	
	function cadastraDisciplina($disciplina){
		$this->db->replace('disciplinas', $disciplina);
		return $this->db->insert_id();
	}

	function cadastraBackupDisciplina($disciplina){

		$this->db->query($disciplina[0]);
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
	
	function getTodasDisciplinas($professor){
		return $this->db
		->select('usuarios.nome professor, disciplinas.nome, disciplinas.id, disciplinas.situacao,curso.nome curso')
		->join('usuarios','disciplinas.professor = usuarios.id')
		->join('curso','curso.id = disciplinas.curso')
		->where('disciplinas.professor',$professor)
		->where('disciplinas.situacao','ativo')
		->order_by('nome')
		->get('disciplinas')
		->result_array();
		
	}

	function getTodasDisciplinasAdmin(){
		return $this->db
		->select('usuarios.nome professor, disciplinas.nome, disciplinas.id, disciplinas.situacao,curso.nome curso')
		->join('usuarios','disciplinas.professor = usuarios.id')
		->join('curso','curso.id = disciplinas.curso')
		->where('disciplinas.situacao','ativo')
		->order_by('usuarios.nome')
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

	function getTodosCursos(){
		return $this->db
		->order_by('nome')
		->get('curso')
		->result_array();

	}

	function getPeriodosLetivos(){
		return $this->db
		->get('periodo_letivo')
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