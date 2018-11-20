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
