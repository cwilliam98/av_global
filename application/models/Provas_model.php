<?php

class Provas_model extends CI_Model {


	function cadastraProva($data){
		$this->db->insert('provas', $data);
		return $this->db->insert_id();

	}

	function alteraProva($data,$id){

		$this->db->where('id', $id);
		return $this->db->update('provas', $data);

	}

	function restore($data){
		// print_r($data);
		// exit();
		$this->db->insert('provas', $data);
		return $this->db->insert_id();

		print_r($this->db->last_query());
		exit();

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
	function getQuestoesByDisciplina($formulario,$questao){
		$dados = $this->db
		->select('id,periodo_letivo')
		->from('questoes')
		->where('disciplina', $formulario['disciplina'])
		->where_in('periodo_letivo', [$questao['periodo_letivo'],'0'])
		->limit($formulario['qtd_questoes'])
		->order_by('id', 'random')
		->get()
		->result_array();
		// echo $this->db->last_query();
		// exit();
		return $dados;

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

		if(!$questoes){
			return;
		}

		$questoes = $this->db
		->select(['questoes.id questao', 'questoes.descricao'])
		->from('questoes')
		->where_in('id', array_column($questoes,'questao'))
		->get()
		->result();	
		// echo $this->db->last_query();
		//  exit();
		return $questoes;
	}
	function getAlternativasByQuestoes( $questao )
	{
		$alternativas = $this->db
		->where('questao', $questao)
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
		date_default_timezone_set('America/Sao_Paulo'); 
		$data = date('Y-m-d H:i:s');

		return $this->db
		->select('matriculas.disciplina, matriculas.aluno, provas.id prova, provas.qtd_questoes,provas.periodo_letivo')
		->from('provas,matriculas')
		->where('matriculas.aluno',$id)
		->where('aplicacao >=', date('Y-m-d H:i:00'))
		->where('provas.id', $prova)
		->order_by('provas.id','DESC')
		->get()
		->result_array();

		// echo "<pre>";
		// print_r($data);
		//  echo $this->db->last_query();
		// exit();

	}

	function verificaQuestoesByDisciplina($disciplina)
	{

		$retorno = $this->db
		->select('id,periodo_letivo')
		->from('questoes')
		->where('questoes.disciplina',$disciplina)
		->get()
		->result_array();
		
		return $retorno;
		
		// echo "<pre>";
		// print_r($data);
		//  echo $this->db->last_query();
		// exit();
	}


	function getProva($id){
		$prova = $this->db
		->select('provas.id, provas.nome, provas.criado_em, provas.aplicacao, provas.qtd_questoes, provas.tipo_prova, provas.nota, provas.professor, formularios.situacao, formularios.aluno')
		->from('provas')
		->join('formularios','formularios.prova = provas.id AND formularios.aluno = '.$id.'','left')
		->where('aplicacao >=', date('Y-m-d H:i:00'))
		->limit(1)
		->order_by('provas.id','DESC')
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
		->where('aplicacao >=', date('Y-m-d H:i:00'))
		->where('disciplinas.situacao','ativo')
		->get()
		->result_array();

		return $dados;
	}

	function getResposta($aluno,$prova){
		$dados =  $this->db
		->from('respostas')
		->join('formularios','formularios.aluno = respostas.aluno')
		->join('itens_prova','itens_prova.formulario = formularios.id AND itens_prova.id = respostas.item_prova')
		->where('formularios.prova',$prova)
		->where('respostas.aluno',$aluno)
		->get()
		->result_array();
		// print_r($this->db->last_query());
		// exit();
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
		return reset($dados);
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

	function getRespostas($id){
		$dados =  $this->db
		->select('alternativas.id alternativa,alternativas.descricao,COUNT(alternativas.correta) correta,alternativas.questao, questoes.id questao,questoes.descricao, respostas.alternativa, respostas.aluno')
		->from('respostas')
		->join('alternativas', 'respostas.alternativa = alternativas.id')
		->join('questoes', 'alternativas.questao = questoes.id')
		->where('questoes.professor', $id)
		->group_by('alternativas.questao')
		->get()
		->result_array();
		// echo $this->db->last_query();
		// exit();
		return $dados;
	}

	function getRespostasAdmin(){
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
	function getRespostasAluno($aluno){
		$dados =  $this->db
		->select('alternativas.id alternativa,alternativas.descricao descricao_alternativa,COUNT(alternativas.correta) correta,alternativas.questao, questoes.id questao,questoes.descricao, respostas.alternativa, respostas.aluno, usuarios.nome')
		->from('respostas')
		->join('alternativas', 'respostas.alternativa = alternativas.id')
		->join('questoes', 'alternativas.questao = questoes.id')
		->join('itens_prova', 'questoes.id = itens_prova.questao')
		->join('formularios', 'formularios.id = itens_prova.formulario')
		->join('usuarios', 'usuarios.id = respostas.aluno')
		->where('respostas.aluno',$aluno)
		->where('alternativas.correta','1')
		->group_by('alternativas.questao')
		->order_by('correta','DESC')
		->get()
		->result_array();
		// echo $this->db->last_query();
		// exit();
		return $dados;
	}

	function getRespostasProva($filtro=null){
		if ( !is_null($filtro) )
			$this->db->where('formularios.prova', $filtro[1]);
		if ( !is_null($filtro) )
			$this->db->where('usuarios.id', $filtro[0]);
			$this->db->where('respostas.aluno', $filtro[0]);
			$this->db->where('formularios.aluno', $filtro[0]);
		$dados =  $this->db
		->select('alternativas.id alternativa,alternativas.descricao,COUNT(alternativas.correta) qtd_correta,alternativas.correta alternativa_correta,alternativas.questao, questoes.id questao,questoes.descricao descricacao_questao, respostas.alternativa, respostas.aluno')
		->from('respostas')
		->join('alternativas', 'respostas.alternativa = alternativas.id')
		->join('questoes', 'alternativas.questao = questoes.id')
		->join('itens_prova', 'questoes.id = itens_prova.questao')
		->join('formularios', 'formularios.id = itens_prova.formulario')
		->join('usuarios', 'usuarios.id = respostas.aluno')
		->group_by('alternativas.questao')
		->order_by('correta','DESC')
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
	function getDadosAlunos(){

		$dados =  $this->db
		->where('contexto','aluno')
		->count_all_results('usuarios');
		return $dados;

	}
	function getDadosQuestoes(){

		return $this->db->count_all_results('questoes');

	}
	function getDadosQuestoesDoProfessor($id){

		return $this->db
		->where('professor',$id)
		->count_all_results('questoes');

	}
	function getDadosAlunosDoProfessor($id){
		$dados =  $this->db
		->join('matriculas','matriculas.disciplina = disciplinas.id')
		->join('usuarios','usuarios.id = matriculas.aluno')
		->where('disciplinas.professor',$id)
		->count_all_results('disciplinas');
		
		return $dados;

	}
	function getDadosDisciplinas(){

		return $this->db->count_all_results('disciplinas');
	}


	function insereSessao($data){

		$this->db->insert('sessoes', $data);
		
		return $this->db->insert_id();

	}

	function insereFimSessao($id){
		return $this->db
		->where('usuario',$id)
		->set('termino', date('Y-m-d H:i:s'))
		->update('sessoes');
	}

	function getDataInicio($alunoId){
		$data =$this->db
		->select('inicio')
		->from('sessoes')
		->where('usuario', $alunoId)
		->get()
		->result_array();
		return reset($data);
		// echo $this->db->last_query();
		// exit();

	}

	function getTodasProvas(){
		return $this->db
		->select('provas.id, provas.nome, provas.aplicacao, usuarios.nome professor,periodo_letivo.codigo_periodo')
		->from('provas')
		->join('usuarios','usuarios.id = provas.professor')
		->join('periodo_letivo','periodo_letivo.id = provas.periodo_letivo')
		->order_by('aplicacao','DESC')
		->get()
		->result_array();
	}

	function getTodasProvasProfessor($id){
		return $this->db
		->select('provas.id, provas.nome, provas.aplicacao, usuarios.nome professor,periodo_letivo.codigo_periodo')
		->from('provas')
		->join('usuarios','usuarios.id = provas.professor')
		->join('periodo_letivo','periodo_letivo.id = provas.periodo_letivo')
		->where('provas.professor',$id)
		->order_by('aplicacao','DESC')
		->get()
		->result_array();
	}
	function getProvaById($id){
		$prova = $this->db
		->from('provas')
		->where('id',$id)
		->get()
		->result_array();

		return reset($prova);
	}

	function Provas(){
		$prova = $this->db
		->from('provas')
		->get()
		->result_array();

		return $prova;
	}

	function inativarUsuario($id){
		$this->db->where('id' , $id);
		$retorno = $this->db
		->set('situacao','inativo')
		->update('provas');

		return $retorno;

	}
}