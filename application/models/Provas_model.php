<?php



class Provas_model extends CI_Model {


	function cadastraProva($data){
		$this->db->insert('provas', $data);
		return $this->db->insert_id();
	}

	function getProvasAluno($id){
		return $this->db
		->from('provas')
		->where('provas.aluno',$id)
		->get()
		->result_array();
	}
	function getQuestoes($id){
		return $this->db
		->from('itens_prova')
		->join('questoes', 'itens_prova.questao = questoes.id')
		->where('questao',$id)
		->get()
		->result_array();

	}

	function getAlternativas($id){
		return $this->db
		->from('alternativas')
		->where('questao', $id)
		->get()
		->result_array();

	}
	function getAlternativaById($alternativa,$questao,$aluno){
		$resultado = $this->db
		->select('alternativas.id alternativa,itens_prova.id item_prova')
		->from('alternativas')
		->join('questoes','questoes.id = alternativas.questao')
		->join('itens_prova', 'itens_prova.questao = questoes.id')
		->join('provas','provas.id = itens_prova.formulario')
		->where('alternativas.id', $alternativa)
		->where('questoes.id', $questao)
		->where('provas.aluno', $aluno)
		->get()
		->result_array();
		return reset($resultado);
	}
	function getQuestoesById($id){
		return $this->db
		->from('questoes')
		->where('disciplina', $id)
		->get()
		->result_array();

	}

	function inserirRespostas($data){
		$this->db->replace('respostas', $data);
		return $this->db->insert_id();
	}

	public function getDisciplinas($prova, $aluno)
	{
		$disciplinas = $this->db
			->select(['disciplinas.id', 'disciplinas.nome', 'formularios.id formulario'])
			->from('disciplinas')
			->join('matriculas', 'matriculas.disciplina = disciplinas.id')
			->join('formularios', 'formularios.disciplina = matriculas.disciplina AND formularios.aluno = matriculas.aluno')
			->where('formularios.prova', $prova)
			->where('formularios.aluno', $aluno)
			->get()
			->result();
			

		return $disciplinas;
	}
	function getQuestoesByFormulario( $formulario )
	{
		$questoes = $this->db
			->select('questao')
			->from('itens_prova')
			->where('formulario', $formulario)
			->get()
			->result_array();


		$questoes = $this->db
			->select(['questoes.id questao', 'questoes.descricao'])
			->from('questoes')
			->where_in('id', array_column($questoes,'questao'))
			->get()
			->result();	
			
		return $questoes;
	}
	function getAlternativasByQuestoes( $questao )
	{
		$alternativas = $this->db
			->where('questao', $questao)
			->order_by('id', 'random')
			->get('alternativas')
			->result();

		return $alternativas;
	}

	function getDisciplinasById($id){
		return $this->db
		->select('matriculas.aluno, matriculas.disciplina, provas.id prova, questoes.id questao')
		->from('matriculas')
		->join('questoes','questoes.disciplina = matriculas.disciplina')
		->where('provas.id',$id)
		->where('matriculas.aluno',$id)
		->get()
		->result_array();

	}

	function getProvaAluno($id){
		return $this->db
		->select('matriculas.disciplina, matriculas.aluno, provas.id prova')
		->from('provas,matriculas')
		->where('matriculas.aluno',$id)
		->get()
		->result_array();

	}

	function getProva(){
		$prova = $this->db
			->from('provas')
			// ->where('aplicacao', date('Y-m-d'))
			->limit(1)
			->get()
			->result();
		return reset($prova);
	}
}










