<?php



class Matriculas_model extends CI_Model {

	
	
	
	function cadastraMatricula($data){
		$this->db->insert('matriculas',$data);
	}
	function getAlunosID($disciplina)
	{
		$this->db->select('aluno');
		$this->db->from('matriculas');
		$this->db->where('disciplina', $disciplina);
		$alunos =  $this->db->get()->result_array();
		
		return array_column($alunos,'aluno');
	}
	


}










