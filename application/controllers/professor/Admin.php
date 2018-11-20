<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	
	public function index() {

		$this->load->model('Provas_model');
		$this->load->helper('date');
		$usuario = $this->session->userdata('usuario');
		

		$provas = ["provas" => $this->Provas_model->getTodasProvasProfessor($usuario['id'])];


		$this->load->view('professor/quantidade_dados_tpl',$provas);

	}
	public function carregaDados() {

		$usuario = $this->session->userdata('usuario');

		$this->load->model('Provas_model');

		$dados = $this->Provas_model->getRespostas($usuario['id']);

		print json_encode($dados);

	}

	
	public function acertosPorQuestoes(){

		$this->load->view('professor/index_tpl');

	}

	public function acertosAlunos() {

		$aluno = $this->session->userdata('usuario');

		$this->load->model('Provas_model');

		$dados = $this->Provas_model->getRespostasAluno($aluno['id']);

		print json_encode($dados);

	} 
	public function acertosPorProva(){

		$this->load->helper('text');
		$prova = $this->input->get('prova');
		$filtro = $prova;

		if ($prova){
			$filtro = explode('?', $prova);
		}
		$usuario = $this->session->userdata('usuario');
		$this->load->model('Alunos_model');

		$this->load->model('Provas_model');

		$dados['dados'] = $this->Provas_model->getRespostasProva($filtro);


		$qtd_peso = 0;
		$qtd_questoes = count($dados['dados']);
		if ($qtd_questoes) {
			$qtd_peso = (10 / $qtd_questoes);
		}
		

		$dados['provas'] = $this->Provas_model->Provas();

		$dados['alunos'] = $this->Alunos_model->alunos();

		$dados['qtd_peso'] = $qtd_peso;


		$this->load->view('professor/acertos_provas_tpl',$dados);
	}
	public function acertosPorAluno(){

		$this->load->helper('text');
		$aluno = $this->input->get('aluno');
		

		$this->load->model('Provas_model');
		$this->load->model('Alunos_model');

		$dados['dados'] = $this->Provas_model->getRespostasAluno($aluno);
		$dados['alunos'] = $this->Alunos_model->alunos();

		$this->load->view('professor/acertos_alunos_tpl',$dados);
	}
	public function dadosAdmin() {

		$aluno = $this->session->userdata('usuario');

		$dados = [];

		$this->load->model('Provas_model');

		$dados = [
			'questoes'=> $this->Provas_model->getDadosQuestoesDoProfessor($aluno['id']),
			'alunos'=> $this->Provas_model->getDadosAlunosDoProfessor($aluno['id']),
		];

		print json_encode($dados);

	}
	



	
}
