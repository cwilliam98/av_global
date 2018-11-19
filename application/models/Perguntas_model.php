<?php
class Perguntas_model extends CI_Model {

	function getAlunos(){
		return $this->db
		->select('nome')
		->where('contexto','aluno')
		->where('situacao','ativo')
		->get('usuarios')
		->result_array();
	}

	function getPerguntasID($disciplina){
		
		$perguntas = $this->db
		->select('id')
		->where('disciplina', $disciplina)
		->where('situacao','ativo')
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
		->where('situacao','ativo')
		->where('questao',$questao);
		
	}

	function getTodasAlternativas()
	{
		return $this->db
		->join('alternativas', 'questoes.id = alternativas.questao')
		->where('situacao','ativo')
		->get('questoes')
		->result_array();
	}
	function getQuestoes($periodo_letivo=null){
		return $this->db
		->from('questoes')
		->where('situacao','ativo')
		->get()
		->result_array();
		// print_r($this->db->last_query());
		// exit();
	}

	function getQuestoesPorPeriodoAdmin($periodo_letivo=null){
		if ( !is_null($periodo_letivo) )
			$this->db->where('periodo_letivo', $periodo_letivo);

		return $this->db
		->from('questoes')
		->where('situacao','ativo')
		->get()
		->result_array();
		// print_r($this->db->last_query());
		// exit();
	}

	function getQuestoesPorPeriodo($periodo_letivo=null,$id){
		if ( !is_null($periodo_letivo) )
			$this->db->where('periodo_letivo', $periodo_letivo);

		return $this->db
		->from('questoes')
		->where('professor',$id)
		->where('situacao','ativo')
		->get()
		->result_array();
		// print_r($this->db->last_query());
		// exit();
	}
	function getPeriodoLetivo(){
		return $this->db
		->from('periodo_letivo')
		->get()
		->result_array();
	}

	function getQuestoesById($id){
		$retorno = $this->db
		->select('questoes.id, questoes.descricao pergunta, questoes.disciplina, alternativas.id alternativa, alternativas.descricao, alternativas.correta,questoes.disciplina')
		->from('questoes')
		->join('alternativas','alternativas.questao = "'.$id.'"')
		->where('questoes.id',$id)
		->where('situacao','ativo')
		->get()
		->result_array();
		return $retorno;
	}

	function getQuestoesByProfessor($id){
		$retorno = $this->db
		->from('questoes')
		->where('professor',$id)
		->where('situacao','ativo')
		->get()
		->result_array();
		return $retorno;
	}

	function getQuestoesPeloId($questao){
		return $this->db
		->from('questoes')
		->where('id', $questao)
		->where('situacao', 'ativo')
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
		$this->db->set('descricao',$data['descricao']);
		$this->db->set('disciplina',$disciplina);
		$this->db->set('periodo_letivo',$data['periodo_letivo']);
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
