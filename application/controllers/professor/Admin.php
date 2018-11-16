<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	
	public function index() {

		$this->load->view('professor/quantidade_dados_tpl');

	}
	public function carregaDados() {

		$aluno = $this->session->userdata('usuario');

		$this->load->model('Provas_model');

		$dados = $this->Provas_model->getRespostas();

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
		$this->load->view('professor/acertos_alunos_tpl');
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
