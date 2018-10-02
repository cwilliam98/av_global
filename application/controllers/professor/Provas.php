<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provas extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		if ($aluno['contexto'] != 'professor') {
			$this->load->view('aviso_permissao');
		}

	}

	public function index(){

		$this->load->model('Disciplinas_model');
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinas();
		$this->load->view('professor/prova_cadastro_tpl', $data);
	}

	public function execCadastraProva(){


		$this->form_validation->set_rules('nome',          'nome',           			'trim|required|max_length[1000]');
		$this->form_validation->set_rules('aplicacao',     'data',           			'trim|required');
		$this->form_validation->set_rules('qtd_questoes',  'quantidade de questoes',    'trim|required');
		$this->form_validation->set_rules('reaproveitar',  'reaproveitar',    			'trim|required');
		$this->form_validation->set_rules('tipo_prova',    'tipo de prova',    			'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			redirect('professor/provas/index');
		}

		set_time_limit(0);


		$this->load->model('Provas_model');

		$data = array(
			"nome" =>	set_value('nome'),
			"aplicacao" =>	set_value('aplicacao'),
			"qtd_questoes" => set_value('qtd_questoes'),
			"reaproveitar" => set_value('reaproveitar'),
			"tipo_prova" => set_value('tipo_prova'),
			"professor"  => $aluno['id']
		);

		if($this->Provas_model->cadastraProva($data)){
			redirect('professor/disciplinas/index?aviso=1');
		}

		redirect('professor/disciplinas/index?aviso=2');	

	}


	
	public function acompanhaProvas(){


			$this->load->model('Provas_model');

			$provas['prova'] = $this->Provas_model->getProvas();

			$prova['prova'] = $provas['prova'];

			$this->load->view('professor/acompanhamento_provas_tpl', $prova);

		
	}

}
