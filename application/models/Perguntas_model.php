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
		->select('questoes.id, questoes.descricao pergunta, questoes.disciplina, alternativas.id alternativa, alternativas.descricao, alternativas.correta,questoes.disciplina')
		->from('questoes')
		->join('alternativas','alternativas.questao = "'.$id.'"')
		->where('questoes.id',$id)
		->get()
		->result_array();
		return $retorno;
	}

	function getQuestoesPeloId($questao){
		return $this->db
		->from('questoes')
		->where('id', $questao)
		->get()
		->result_array();

		
		return $retorno;
		
	}


	function getAlternativas($questao){
		$retorno = $this->db
		->from('alternativas')
		->where('questao', $questao)
		->get()
		->result_array();
		
		return $retorno;
		
	}

	function getAlternativa($questao){
		$retorno = $this->db
		->select('id  alternativa')
		->from('alternativas')
		->where('questao', $questao)
		->get()
		->result_array();
		
		return $retorno;
		
	}

	function alteraPergunta($data,$id,$disciplina){
		

		$this->db->where('id', $id);
		$this->db->set('descricao',$data['questao']);
		$this->db->set('disciplina',$disciplina);
		$retorno = $this->db->update('questoes');
		
		return $retorno;

	}

	function alteraAlternativa($data,$id,$alternativa){


		$this->db->where('questao', $id);
		$this->db->where('id', $alternativa);
		$retorno = $this->db->update('alternativas', $data);
		return $retorno;
	}

	function alteraAlternativaCorreta($id){
		
		$this->db->where('id', $id);
		$this->db->set('correta',(bool)$id);
		$retorno = $this->db->update('alternativas');
		return $retorno;
	}

	function marcaComoErrada($id){
		$this->db->where('questao', $id);
		$this->db->set('correta',0);
		$update = $this->db->update('alternativas');

		
		return $update;
	}

	function inativaPergnta($id){
		$this->db->where('id' , $id);
		$retorno = $this->db
		->set('situacao','inativo')
		->update('questoes');

		return $retorno;

	}
	
}
