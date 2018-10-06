<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provas extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}
		
		$aluno = $this->session->userdata('usuario');

		if ($aluno['contexto'] != 'aluno') {
			$this->load->view('aviso_permissao');
		}

	}



	public function aviso(){

		$this->load->view('aluno/prova_aviso');

	}

	public function gerarProva(){

		$aluno = $this->session->userdata('aluno');

		$this->load->model('Provas_model');
		$this->load->model('Itens_prova_model');
		$this->load->model('Formularios_model');



		$prova = $this->Provas_model->getProva($aluno['id']);


		if(!$prova)
		{
			redirect('aluno/provas/aviso');

		} else if($prova->situacao == 'finalizada' && $prova->aluno == $aluno['id']){

			redirect('aluno/provas/aviso');	

		}


		$formularios = $this->Provas_model->getProvaAluno($aluno['id'],$prova->id);


		foreach ($formularios as $formulario) {

			$data_formulario = array(
				"aluno" => $aluno['id'],
				"disciplina" => $formulario['disciplina'],
				"prova" => $formulario['prova'],
				"situacao" => 'em andamento'	
			);

			$id = $this->Formularios_model->cadastra($data_formulario);

			$questoes = $this->Provas_model->getQuestoesById($formulario['disciplina'], $formulario['qtd_questoes']);



			foreach($questoes as $questao)
			{
				$data = array(
					"formulario" => $id,
					"questao" => $questao['id']
				);


				$this->Itens_prova_model->cadastra($data);
			}

		}

		redirect('aluno/provas/fazer');
	}

	public function fazer(){


		$aluno = $this->session->userdata('aluno');

		$this->load->model('alunos_model');
		$this->load->model('Disciplinas_model');
		$this->load->model('Provas_model');
		$this->load->model('Itens_prova_model');
		$this->load->view('aluno/template_alunos_header.php',['aluno' => $aluno]);


		$prova = $this->Provas_model->getProva($aluno['id']);

		if($prova->situacao == 'finalizada' && $prova->aluno == $aluno['id']){

			redirect('aluno/provas/aviso');	
		}

		$prova->disciplinas = $this->Provas_model->getDisciplinas( $prova->id, $aluno['id'] );



		if(!$prova->disciplinas)
		{

			redirect('aluno/provas/gerarProva');
		}


		foreach ($prova->disciplinas as $disciplina)
		{
			$disciplina->questoes = $this->Provas_model->getQuestoesByFormulario( $disciplina->formulario );
			foreach ($disciplina->questoes as $questao)
			{
				$questao->alternativas = $this->Provas_model->getAlternativasByQuestoes( $questao->questao );
			}
		}

		$this->load->view('aluno/relatorio_provas_aluno_tpl',$prova);

		$this->load->view('aluno/template_alunos_footer');

	}



	public function corrigir() {

		$aluno = $this->session->userdata('aluno');
		$this->load->model('Provas_model');


		foreach ($this->input->post('questao') as $questao => $alternativa)
		{
			$resultado =  $this->Provas_model->getAlternativaById($alternativa,$questao,$aluno['id']);

			if($resultado){
				$id = $this->Provas_model->inserirRespostas($resultado);

			}
		}

	}

	public function resultado(){

		$aluno = $this->session->userdata('aluno');

		$this->load->model('Provas_model');

		$id = $this->input->post('id');

		$this->Provas_model->insereFimSessao($id);

		if(!$this->Provas_model->atualizaSituacaoProva($id)){
			echo json_encode('erro');
		}
		else {
			echo json_encode('funcionou');
		}

	}

	
	public function fim(){

		$this->session->sess_destroy();

		$this->load->view('aluno/fim_tpl');

	}

	public function sessao(){
		

		$this->load->model('Provas_model');

		$data = ["usuario" => $this->input->post('id')];	

		$this->Provas_model->insereSessao($data);

	}
}
