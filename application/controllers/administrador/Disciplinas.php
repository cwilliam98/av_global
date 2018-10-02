<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disciplinas extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}
		$aluno = $this->session->userdata('aluno');

		if ($aluno['contexto'] == 'aluno' || $aluno['contexto'] == 'professor') {
			$this->load->view('aviso_permissao');
		}
	}


	public function index($id=-1)
	{

		$aluno = $this->session->userdata('aluno');
		$this->load->model('Disciplinas_model');


		
		$data["disciplinas"] = $this->Disciplinas_model->getDisciplinaById($id);


		$data["professores"] = $this->Disciplinas_model->getTodosProfessores();
		$this->load->view('administrador/disciplina_cadastro_tpl',$data);
		
	}

	public function lista(){

		$this->load->model('Disciplinas_model');
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinas();
		$this->load->view('administrador/lista_disciplinas_tpl',$data);

	}


	public function alterar($id=-1){

		$aluno = $this->session->userdata('aluno');
		$this->load->model('Disciplinas_model');
		
		$data["disciplinas"] = $this->Disciplinas_model->getDisciplinaById($id);

		$data["professores"] = $this->Disciplinas_model->getTodosProfessores();
		$this->load->view('administrador/disciplina_alterar_tpl',$data);
	}

	public function execAlterarDisciplina($id){
		
		$id = (int)$id;
		$this->form_validation->set_rules('disciplina',       'Disciplina',          'trim|required|max_length[1000]');
		$this->form_validation->set_rules('professor',   	  'professor',         	 'required');



		if($this->form_validation->run() == FALSE)
		{
			redirect('administrador/disciplinas/index');
		}


		$this->load->model('Disciplinas_model');


		$disciplina = [
			"nome" =>	set_value('disciplina'),
			"professor" =>	set_value('professor')
		];

		$this->Disciplinas_model->alteraDisciplina($disciplina, $id);

		if(!empty($disciplina)){
			redirect('administrador/disciplinas/alterar?aviso=1');
		}

		redirect('administrador/disciplinas/alterar?aviso=2');	
	}

	public function execCadastraDisciplina(){
		

		
		$disciplina = $this->input->post('disciplina');

		$this->form_validation->set_rules('disciplina',       'Disciplina',          'trim|required|max_length[1000]');
		$this->form_validation->set_rules('professor',   	  'professor',         	 'required');



		if($this->form_validation->run() == FALSE)
		{
			redirect('administrador/disciplinas/index');
		}


		$this->load->model('Disciplinas_model');


		$disciplina = $this->Disciplinas_model->cadastraDisciplina([
			"nome" =>	set_value('disciplina'),
			"professor" =>	set_value('professor')
		]);

		if(!empty($disciplina)){
			redirect('administrador/disciplinas/index?aviso=1');
		}

		redirect('administrador/disciplinas/index?aviso=2');	

	}


}
