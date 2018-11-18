<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provas extends MY_Controller {

	public function index(){


		$this->load->model('Disciplinas_model');
		$data = [
			"periodos_letivo" => $this->Disciplinas_model->getPeriodosLetivos(),
		];
		$this->load->view('administrador/prova_cadastro_tpl', $data);
	}

	public function execCadastraProva(){

		$aluno = $this->session->userdata('usuario');

		$this->form_validation->set_rules('nome',          'nome',           			'trim|required|max_length[1000]');
		$this->form_validation->set_rules('aplicacao',     'data',           			'trim|required');
		$this->form_validation->set_rules('qtd_questoes',  'quantidade de questoes',    'trim|required');
		$this->form_validation->set_rules('tipo_prova',    'tipo da prova',    			'trim|required');
		$this->form_validation->set_rules('periodo_letivo','periodo letivo',    		'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			$this->index();

			return;
			
		}

		set_time_limit(0);


		$this->load->model('Provas_model');



		$data = array(
			"nome" =>	set_value('nome'),
			"aplicacao" =>	set_value('aplicacao'),
			"qtd_questoes" => set_value('qtd_questoes'),
			"tipo_prova" => set_value('tipo_prova'),
			"periodo_letivo" => set_value('periodo_letivo'),
			"professor"  => $aluno['id']
		);

		if($this->Provas_model->cadastraProva($data)){
			redirect('administrador/provas/index?aviso=1');
		}

		redirect('administrador/provas/index?aviso=2');	

	}
	
	public function acompanhaProvas(){

		$this->load->model('Provas_model');

		$provas['prova'] = $this->Provas_model->getProvas();

		$prova['prova'] = $provas['prova'];

		$this->load->view('administrador/acompanhamento_provas_tpl', $prova);

	}

	public function alterar($id){

		$this->load->helper('date');

		$this->load->model('Disciplinas_model');
		$this->load->model('Provas_model');


		$data = [
			"prova" => $this->Provas_model->getProvaById($id),
			"periodos_letivo" => $this->Disciplinas_model->getPeriodosLetivos(),
		];
		$this->load->view('administrador/reagendar_prova_tpl', $data);
	}

	public function execAlteraProva($id){

		$usuario = $this->session->userdata('usuario');

		$this->form_validation->set_rules('nome',          'nome',           			'trim|required|max_length[1000]');
		$this->form_validation->set_rules('aplicacao',     'data',           			'trim|required');
		$this->form_validation->set_rules('qtd_questoes',  'quantidade de questoes',    'trim|required');
		$this->form_validation->set_rules('tipo_prova',    'tipo da prova',    			'trim|required');
		$this->form_validation->set_rules('periodo_letivo','periodo letivo',    		'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			$this->alterar($id);

			return;
			
		}


		$this->load->model('Provas_model');



		$data = array(
			"nome" =>	set_value('nome'),
			"aplicacao" =>	set_value('aplicacao'),
			"qtd_questoes" => set_value('qtd_questoes'),
			"periodo_letivo" => set_value('periodo_letivo'),
			"tipo_prova" => set_value('tipo_prova'),
			"professor"  => $usuario['id']
		);

		if($this->Provas_model->alteraProva($data,$id)){
			redirect('administrador/provas/alterar/'.$id.'?aviso=1');
		}

		redirect('administrador/provas/alterar/'.$id.'?aviso=2');	

	}

	
}
