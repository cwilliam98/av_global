<?php

class Provas_model extends CI_Model {


	function cadastraProva($data){
		$this->db->insert('provas', $data);
		return $this->db->insert_id();

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
		->select('alternativas.id alternativa,itens_prova.id item_prova,formularios.aluno')
		->from('alternativas, formularios')
		->join('questoes','questoes.id = alternativas.questao')
		->join('itens_prova', 'itens_prova.questao = questoes.id')
		->join('provas','provas.id = formularios.prova')
		->where('alternativas.id', $alternativa)
		->where('questoes.id', $questao)
		->where('formularios.aluno', $aluno)
		->get()
		->result_array();
		
		return reset($resultado);
	}
	function getQuestoesById($id, $qtd_questoes){
		return $this->db
		->from('questoes')
		->where('disciplina', $id)
		->limit($qtd_questoes)
		->get()
		->result_array();
		// echo $this->db->last_query();
		// exit();


	}

	function inserirRespostas($data){
		$this->db->replace('respostas', $data);
		return $this->db->insert_id();
	}

	public function getDisciplinas($prova, $aluno)
	{
		$disciplinas = $this->db
		->select(['disciplinas.id', 'disciplinas.nome', 'formularios.id formulario','formularios.prova'])
		->from('disciplinas')
		->join('matriculas', 'matriculas.disciplina = disciplinas.id')
		->join('formularios', 'formularios.disciplina = matriculas.disciplina AND formularios.aluno = matriculas.aluno')
		->where('formularios.prova', $prova)
		->where('formularios.aluno', $aluno)
		->where('disciplinas.situacao', 'ativo')
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
		 // echo $this->db->last_query();
		 // exit();


		$questoes = $this->db
		->select(['questoes.id questao', 'questoes.descricao'])
		->from('questoes')
		->where_in('id', array_column($questoes,'questao'))
		->order_by('rand()')
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
		->join('disciplinas','disciplinas.id = matriculas.disciplina')
		->join('questoes','questoes.disciplina = matriculas.disciplina')
		->where('provas.id',$id)
		->where('matriculas.aluno',$id)
		->where('disciplinas.situacao','ativo')
		->get()
		->result_array();

	}

	function getProvaAluno($id,$prova){
		return $this->db
		->select('matriculas.disciplina, matriculas.aluno, provas.id prova, provas.qtd_questoes')
		->from('provas,matriculas')
		->where('matriculas.aluno',$id)
		->where('provas.aplicacao', date('Y-m-d'))
		->where('provas.id', $prova)
		->get()
		->result_array();
		// echo $this->db->last_query();
			// exit();

	}


	function getProva($id){ 
		$prova = $this->db
		->select('provas.id, provas.nome, provas.criado_em, provas.aplicacao, provas.qtd_questoes, provas.reaproveitar, provas.tipo_prova, provas.nota, provas.professor, formularios.situacao, formularios.aluno')
		->from('provas')
		->join('formularios','formularios.prova = provas.id AND formularios.aluno = '.$id.'','left')
		->where('aplicacao', date('Y-m-d'))
		->limit(1)
		->get()
		->result();
			// echo $this->db->last_query();
			// exit();
		return reset($prova);
	}

	function atualizaSituacaoProva($id){
		return $this->db
		->where('aluno',$id)
		->set('situacao','finalizada')
		->update('formularios');
		// echo $this->db->last_query();
		// exit();
	}

	function getProvas(){
		$dados =  $this->db
		->select('disciplinas.nome disciplina, usuarios.nome usuario, provas.nome, provas.qtd_questoes, provas.aplicacao,formularios.situacao')
		->from('formularios')
		->join('usuarios','usuarios.id = formularios.aluno')
		->join('disciplinas','disciplinas.id = formularios.disciplina')
		->join('provas','provas.id = formularios.prova')
		->where('provas.aplicacao', date('Y-m-d'))
		->where('disciplinas.situacao','ativo')
		->get()
		->result_array();
		return $dados;
	}

	function getResposta(){
		$dados =  $this->db
		->from('respostas')
		->get()
		->result_array();
		return $dados;
	}

	function getUsuarios(){
		$dados =  $this->db
		->from('usuarios')
		->get()
		->result_array();
		return $dados;
	}


	function getAlternativaCorreta($alternativa){
		$dados =  $this->db
		->select('id alternativa,descricao,correta,questao')
		->from('alternativas')
		->where('id',$alternativa)
		->get()
		->result_array();
		// echo $this->db->last_query();
		// exit();
		return $dados;
	}

	function getQuestaoByAlternativa($id){
		$dados =  $this->db
		->select('id questao,descricao')
		->from('questoes')
		->where('id',$id)
		->get()
		->result_array();
		// echo $this->db->last_query();
		// exit();
		return reset($dados);
	}

	function getRespostas(){
		$dados =  $this->db
		->select('alternativas.id alternativa,alternativas.descricao,COUNT(alternativas.correta) correta,alternativas.questao, questoes.id questao,questoes.descricao, respostas.alternativa, respostas.aluno')
		->from('respostas')
		->join('alternativas', 'respostas.alternativa = alternativas.id')
		->join('questoes', 'alternativas.questao = questoes.id')
		->group_by('alternativas.questao')
		->get()
		->result_array();
		// echo $this->db->last_query();
		// exit();
		return $dados;
	}

	function getDadosProfessores(){

		$dados =  $this->db
		->where('contexto','professor')
		->count_all_results('usuarios');
		return $dados;

	}
	function getDadosQuestoes(){

		return $this->db->count_all_results('questoes');

	}
	function getDadosDisciplinas(){

		return $this->db->count_all_results('disciplinas');
		

	}


	function insereSessao($data){
		$this->db->replace('sessoes', $data);
		return $this->db->insert_id();
	}

	function insereFimSessao($id){
		return $this->db
		->where('usuario',$id)
		->set('termino', date('Y-m-d H:m:s'))
		->update('sessoes');
	}
}