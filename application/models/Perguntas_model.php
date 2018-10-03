<?php
class Perguntas_model extends CI_Model {

	function getPerguntasID($disciplina){
		
		$perguntas = $this->db
		->select('id')
		->where('disciplina', $disciplina)
		->order_by('id','random')
		->limit(5)
		->get('questoes')
		->result_array();
		
		return array_column($perguntas, 'id');

	}
	function cadastraPergunta($data){
		$this->db->insert('questoes',$data);
		return $this->db->insert_id();

	}
	function cadastraAlternativa($data){
		$this->db->insert('alternativas',$data);
		return $this->db->insert_id();
	}

	
	function getProva($questao){
		$this->db
		->select('*')
		->from('itens_prova')
		->where('questao',$questao);
		
	}

	function getTodasAlternativas()
	{
		return $this->db
		->select('*')
		->join('alternativas', 'questoes.id = alternativas.questao')
		->get('questoes')
		->result_array();
	}
	function getQuestoes(){
		return $this->db
		->from('questoes')
		->get()
		->result_array();
	}

	function getQuestoesById($id){
		$retorno = $this->db
		->select('questoes.id, questoes.descricao pergunta, questoes.disciplina, alternativas.id alternativa, alternativas.descricao, alternativas.correta')
		->from('questoes')
		->join('alternativas','alternativas.questao = '.$id.'')
		->where('questoes.id',$id)
		->get()
		->result_array();
		
		return reset($retorno);
	}

	function getAlternativas($questao){
		return $this->db
		->from('alternativas')
		->where('questao', $questao)
		->get()
		->result_array();
		
	}

	function alteraPergunta($id,$data){
		$this->db->where('id' , $id);
		$retorno = $this->db->update('questoes', $data);

		return $retorno;

	}

	function alteraAlternativa($id,$data){
		$this->db->where('questao' , $id);
		$retorno = $this->db->update('alternativa', $data);

		return $retorno;

	}
	
}
