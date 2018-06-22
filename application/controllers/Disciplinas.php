<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Disciplinas extends CI_Controller {

	
		public function index()
		{
			if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

			$aluno = $this->session->userdata('aluno');

			$this->load->model('Disciplinas_model');
			$data["professores"] = $this->Disciplinas_model->getTodosProfessores();
			$this->load->view('disciplina_cadastro_tpl',$data);
			
		}

		public function execCadastraDisciplina(){
		
			
		
			$disciplina = $this->input->post('disciplina');
			
			$this->form_validation->set_rules('disciplina',       'Disciplina',          'trim|required|max_length[1000]');
			$this->form_validation->set_rules('professor',   	  'professor',         	 'required');
			$this->form_validation->set_rules('periodo',   	   	  'periodo',           	 'required');
			


			if($this->form_validation->run() == FALSE)
			{
				$this->index();
				return;
			}


			$this->load->model('Disciplinas_model');
			
			
			$disciplina = $this->Disciplinas_model->cadastraDisciplina([
				"nome" =>	set_value('disciplina'),
				"professor" =>	set_value('professor'),
				"periodo" =>	set_value('periodo')
			]);
			
			if(!empty($disciplina)){
				redirect('disciplinas/index?aviso=1');
			}
			
			redirect('disciplinas/index?aviso=2');	
			
			
			
		}
		
		
	}
