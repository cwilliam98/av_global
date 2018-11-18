<?php



class Alunos_model extends CI_Model {

	
	function cadastraUsuario($data){
		$this->db->insert('usuarios', $data);
		return $this->db->insert_id();
	}

	function alteraUsuario($data,$id){

		$this->db->where('id', $id);
		$retorno = $this->db->update('usuarios', $data);
		return $retorno;
	}
	
	function getAlunoById($id){

		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id',$id);
		$resultado = $this->db->get()->result_array();
		return  reset($resultado);
	}

	function getProfessorById($id){

		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id',$id);
		$resultado = $this->db->get()->result_array();
		return  reset($resultado);
	}

	function listaProfessor(){

		$resultado = $this->db
		->select('usuarios.id professor, usuarios.nome, usuarios.codigo')
		->from('usuarios')
		->join('disciplinas','disciplinas.professor = usuarios.id')
		->where('contexto','professor')
		->group_by('usuarios.nome')
		->get()
		->result_array();
		return  $resultado;
	}

	function listaTodosProfessor(){

		$resultado = $this->db
		->select('id')
		->from('usuarios')
		->where('contexto','professor')
		->get()
		->result_array();
		return $resultado;
	}

	function listaDisciplinasByIdAluno($id){

		$retorno = $this->db
		->from('matriculas')
		->where_in('aluno',$id)
		->get()
		->result_array();


		return  $retorno;
	}

	function listaDisciplinasById($id){

		$retorno = $this->db
		->select('curso.nome curso, disciplinas.id, disciplinas.nome disciplina')
		->from('disciplinas')
		->join('curso','curso.id = disciplinas.curso')
		->where_in('professor',$id)
		->get()
		->result_array();


		return  $retorno;
	}

	function listaAlunos(){

		return $this->db
		->select('usuarios.id, usuarios.nome, usuarios.codigo, curso.nome curso, disciplinas.nome disciplina,disciplinas.id disciplina_id')
		->from('usuarios')
		->join('matriculas','usuarios.codigo = matriculas.aluno')
		->join('disciplinas','matriculas.disciplina = disciplinas.id')
		->join('curso','disciplinas.curso = curso.id')
		->where('contexto','aluno')
		->group_by('usuarios.nome')
		->get()
		->result_array();

		// print_r($this->db->last_query());
		// exit();
		// $resultado = $this->db->get()->result_array();
		// return  $resultado;
	}


}










