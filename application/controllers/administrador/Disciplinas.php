<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplinas extends MY_Controller {

	public function index($id=-1)
	{

		$aluno = $this->session->userdata('aluno');
		$this->load->model('Disciplinas_model');


		
		$data["disciplinas"] = $this->Disciplinas_model->getDisciplinaById($id);


		$data =[
			"professores" => $this->Disciplinas_model->getTodosProfessores(),
			"cursos" => $this->Disciplinas_model->getTodosCursos()
		];
		
		$this->load->view('administrador/disciplina_cadastro_tpl',$data);
		
	}

	public function lista(){
		
		$this->load->helper('text');

		$usuario = $this->session->userdata('usuario');

		$this->load->model('Disciplinas_model');
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinasAdmin();
		$this->load->view('administrador/lista_disciplinas_tpl',$data);

	}

	public function execCadastraDisciplina(){
	
		
		$disciplina = $this->input->post('disciplina');

		$this->form_validation->set_rules('disciplina',       'Disciplina',          'trim|required|max_length[1000]');
		$this->form_validation->set_rules('professor',   	  'professor',         	 'trim|required');
		$this->form_validation->set_rules('curso',   	  	  'curso',         	     'trim|required');



		if($this->form_validation->run() == FALSE)
		{
			$this->index();

			return;
			
		}


		$this->load->model('Disciplinas_model');


		$disciplina = $this->Disciplinas_model->cadastraDisciplina([
			"nome" =>	set_value('disciplina'),
			"professor" =>	set_value('professor'),
			"curso" =>	set_value('curso')
		]);

		if(!empty($disciplina)){
			redirect('administrador/disciplinas/index?aviso=1');
		}

		redirect('administrador/disciplinas/index?aviso=2');	

	}

	public function alterar($id=-1){

		$aluno = $this->session->userdata('usuario');
		$this->load->model('Disciplinas_model');

		$data =[
			"professores" => $this->Disciplinas_model->getTodosProfessores(),
			"cursos" => $this->Disciplinas_model->getTodosCursos(),
			"disciplinas" => $this->Disciplinas_model->getDisciplinaById($id)
		];

		$this->load->view('administrador/disciplina_alterar_tpl',$data);
	}

	public function execAlterarDisciplina($id){
		
		$id = (int)$id;
		$this->form_validation->set_rules('disciplina',       'Disciplina',          'trim|required|max_length[1000]');
		$this->form_validation->set_rules('professor',   	  'professor',         	 'required');
		$this->form_validation->set_rules('curso',   	  	  'curso',         	 	 'required');



		if($this->form_validation->run() == FALSE)
		{
			$this->alterar();

			return;
			
		}


		$this->load->model('Disciplinas_model');


		$disciplina = [
			"nome" =>	set_value('disciplina'),
			"professor" =>	set_value('professor'),
			"curso" =>	set_value('curso')
		];

		$retorno = $this->Disciplinas_model->alteraDisciplina($disciplina, $id);

		if(!empty($retorno)){
			redirect('administrador/disciplinas/alterar/'.$id.'?aviso=1');
		}

		redirect('administrador/disciplinas/alterar/'.$id.'?aviso=2');	
	}

	public function inativar($id){
		$id = (int)$id;
		
		$this->load->model('Disciplinas_model');


		$retorno = $this->Disciplinas_model->inativaDisciplina($id);

		if(!empty($retorno)){
			redirect('administrador/disciplinas/lista?aviso=1');
		}

		redirect('administrador/disciplinas/lista?aviso=2');	
	}
	


}
