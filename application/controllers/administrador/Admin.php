<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function index() {

		$this->load->model('Perguntas_model');

		$data = [
			"questoes" => $this->Perguntas_model->getQuestoes()
		];

		foreach($data['questoes'] as $id => $questao)
		{
			$data['questoes'][$id]['alternativas'] = $this->Perguntas_model->getAlternativas($questao['id']);
		}


		$this->load->view('administrador/quantidade_dados_tpl');

	}

	public function carregaDados() {

		$aluno = $this->session->userdata('usuario');

		$this->load->model('Provas_model');

		$dados = $this->Provas_model->getRespostas();

		print json_encode($dados);

	}

	public function dadosAdmin() {

		$aluno = $this->session->userdata('usuario');

		$dados = [];

		$this->load->model('Provas_model');

		$dados = [
		'disciplinas'=> $this->Provas_model->getDadosDisciplinas(),
		'questoes'=> $this->Provas_model->getDadosQuestoes(),
		'professores'=> $this->Provas_model->getDadosProfessores(),
		];

		print json_encode($dados);

	}

	public function acertosPorQuestoes(){

		$this->load->view('administrador/index_tpl');

	}





}
