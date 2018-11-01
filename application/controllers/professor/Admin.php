<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	
	public function index() {

		$this->load->view('professor/index_admin_professor_tpl');

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
	



	
}
