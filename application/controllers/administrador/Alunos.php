<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends MY_Controller {

	public function index()
	{

		$this->load->model('Disciplinas_model');
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinasAdmin();
		$this->load->view('administrador/aluno_cadastro_tpl', $data);
		
	}

	public function lista()
	{
		$this->load->helper('text');
		
		$this->load->model('Alunos_model');
		$data["alunos"] = $this->Alunos_model->listaAlunos();
		$this->load->view('administrador/lista_alunos_tpl', $data);
		
	}

	public function listaProfessores()
	{
		$this->load->helper('text');
		
		$this->load->model('Alunos_model');
		$dados["professores"] =  $this->Alunos_model->listaTodosProfessor();
		
		
		foreach (reset($dados) as $professor) {

			$data =	[
				"professores" =>  $this->Alunos_model->listaProfessor(),
				"disciplinas_professor" =>  $this->Alunos_model->listaDisciplinasById($professor)
			];
		}
		
		$this->load->view('administrador/lista_professores_tpl', $data);
		
	}

	public function execCadastraAluno(){

		$this->form_validation->set_rules('professor',     'professor',		 'trim');
		$this->form_validation->set_rules('aluno',  	   'aluno',			 'trim');
		$this->form_validation->set_rules('nome',          'nome',           'trim|required|max_length[1000]');
		$this->form_validation->set_rules('codigo',        'codigo',         'trim|required');
		$this->form_validation->set_rules('disciplinas[]', 'Disciplinas',    'trim');
		$this->form_validation->set_rules('senha', 		   'senha',          'trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();

			return;
			
		}
		
		$this->load->model('Alunos_model');
		$this->load->model('Matriculas_model');
		
		$professor = set_value('professor');
		$aluno = set_value('aluno');
		
		if ($aluno == "aluno"){
			
			$data = [
				"id" =>	set_value('codigo'),
				"nome" =>	set_value('nome'),
				"codigo" =>	set_value('codigo'),
				"senha" =>	password_hash(set_value('senha'), PASSWORD_BCRYPT),
				"contexto" => 'aluno'
			];
			
			$alunoId = $this->Alunos_model->cadastraUsuario($data);
			
			foreach (set_value('disciplinas') as  $disciplina)
			{
				
				$data = [
					'aluno' => $alunoId,
					'disciplina' => $disciplina
				];
				
				$this->Matriculas_model->cadastraMatricula($data);
				
			}
			
		}
		if ($professor == "professor"){
			$data = [
				"id" =>	set_value('codigo'),
				"nome" =>	set_value('nome'),
				"codigo" =>	set_value('codigo'),
				"senha" =>	password_hash(set_value('senha'), PASSWORD_BCRYPT),
				"contexto" => 'professor'

			];
			
			$professorId = $this->Alunos_model->cadastraUsuario($data);
			
			
		}
		
		if(!empty($data)){
			redirect('administrador/alunos/index?aviso=1');
		}
		
		redirect('administrador/alunos/index?aviso=2');	
		
		
		
	}

	public function alterar($id){

		$aluno = $this->session->userdata('usuario');
		$this->load->model('Disciplinas_model');
		$this->load->model('Alunos_model');

		$data =[
			"disciplinas" => $this->Disciplinas_model->getTodasDisciplinasAdmin(),
			"disciplinas_aluno" => $this->Alunos_model->listaDisciplinasByIdAluno($id),
			"aluno" => $this->Alunos_model->getAlunoById($id),
		];

		$this->load->view('administrador/usuario_alterar_tpl',$data);
	}


	public function execAlteraAluno($id){

		$this->form_validation->set_rules('nome',          'nome',           'trim|required|max_length[1000]');
		$this->form_validation->set_rules('codigo',        'codigo',         'trim|required');
		$this->form_validation->set_rules('disciplinas[]', 'Disciplinas',    'trim');
		$this->form_validation->set_rules('senha', 		   'senha',          'trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->alterar();

			return;
		}
		
		$this->load->model('Alunos_model');
		$this->load->model('Matriculas_model');
		
		$professor = set_value('professor');
		$aluno = set_value('aluno');
		
		

		$data = [
			"id" =>	set_value('codigo'),
			"nome" =>	set_value('nome'),
			"codigo" =>	set_value('codigo'),
			"senha" =>	password_hash(set_value('senha'), PASSWORD_BCRYPT),
			"contexto" => 'aluno'
		];

		$alunoId = $this->Alunos_model->alteraUsuario($data,$id);

		foreach (set_value('disciplinas') as  $disciplina)
		{

			$data = [
				'aluno' => $id,
				'disciplina' => $disciplina
			];

			$this->Matriculas_model->alteraMatricula($data,$id);

		}

		if(!empty($data)){
			redirect('administrador/alunos/alterar/'.$id.'?aviso=1');
		}
		
		redirect('administrador/alunos/alterar/'.$id.'?aviso=2');	

	}


	public function alterarProfessor($id){

		$aluno = $this->session->userdata('usuario');
		$this->load->model('Disciplinas_model');
		$this->load->model('Alunos_model');

		$data = [
			"disciplinas" => $this->Disciplinas_model->getTodasDisciplinasAdmin(),
			"disciplinas_aluno" => $this->Alunos_model->listaDisciplinasById($id),
			"professor" => $this->Alunos_model->getProfessorById($id),
		];

		$this->load->view('administrador/usuario_alterar_professor_tpl',$data);
	}

	public function execAlteraProfessor($id){

		$this->form_validation->set_rules('nome',          'nome',           'trim|required|max_length[1000]');
		$this->form_validation->set_rules('codigo',        'codigo',         'trim|required');
		$this->form_validation->set_rules('senha', 		   'senha',          'trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->alterarProfessor();

			return;
			
		}
		
		$this->load->model('Alunos_model');
		$this->load->model('Matriculas_model');
		
		$professor = set_value('professor');
		$aluno = set_value('aluno');
		
		

		$data = [
			"id" =>	set_value('codigo'),
			"nome" =>	set_value('nome'),
			"codigo" =>	set_value('codigo'),
			"senha" =>	password_hash(set_value('senha'), PASSWORD_BCRYPT),
			"contexto" => 'professor'
		];

		$professor = $this->Alunos_model->alteraUsuario($data,$id);


		if(!empty($professor)){
			redirect('administrador/alunos/alterarProfessor/'.$id.'?aviso=1');
		}
		
		redirect('administrador/alunos/alterarProfessor/'.$id.'?aviso=2');	

	}

	public function inativarAluno($id){
		$id = (int)$id;
		
		$this->load->model('Alunos_model');


		$retorno = $this->Alunos_model->inativarUsuario($id);

		if(!empty($retorno)){
			redirect('administrador/alunos/lista?aviso=1');
		}

		redirect('administrador/alunos/lista?aviso=2');	
	}

	public function inativarProfessor($id){
		$id = (int)$id;
		
		$this->load->model('Alunos_model');


		$retorno = $this->Alunos_model->inativarUsuario($id);

		if(!empty($retorno)){
			redirect('administrador/alunos/listaProfessores?aviso=1');
		}

		redirect('administrador/alunos/listaProfessores?aviso=2');	
	}

	
}
