<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

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
	
	public function index()
	{
		$this->load->model('Disciplinas_model');
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinas();
		$this->load->view('aluno_cadastro_tpl', $data);
		
	}

	public function execCadastraAluno(){
		
		$this->form_validation->set_rules('professor',     'professor',		 'trim|required');
		$this->form_validation->set_rules('aluno',  	   'aluno',			 'trim|required');
		$this->form_validation->set_rules('nome',          'nome',           'trim|required|max_length[1000]');
		$this->form_validation->set_rules('codigo',        'codigo',         'trim|required');
		$this->form_validation->set_rules('disciplinas[]', 'Disciplinas',    'trim|required');
		$this->form_validation->set_rules('jornada', 	   'jornada',        'trim');
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
				"nome" =>	set_value('nome'),
				"codigo" =>	set_value('codigo')
			];
			
			$alunoId = $this->Alunos_model->cadastraAluno($data);
			
			
			
			foreach (set_value('disciplinas') as  $disciplina)
			{
				
				$data = [
					'aluno' => $alunoId,
					'disciplina' => $disciplina
				];
				
				$this->Matriculas_model->cadastraMatricula($data);
				
			}
			
			$usuario = [
				"nome" =>	set_value('nome'),
				"login" =>	set_value('codigo'),
				"senha" => set_value('senha'),
				"aluno" => $alunoId
			];
			
			$alunoId = $this->Alunos_model->cadastraUsuario($usuario);
		}
		else if ($professor == "professor"){
			$data = [
				"nome" =>	set_value('nome'),
				"jornada" =>	set_value('jornada'),
				"codigo" =>	set_value('codigo')
			];
			
			$professorId = $this->Alunos_model->cadastraProfessor($data);
			
			$usuario = [
				"nome" =>	set_value('nome'),
				"login" =>	set_value('codigo'),
				"senha" => set_value('senha'),
				"professor" => $professorId
			];
			
			$alunoId = $this->Alunos_model->cadastraUsuario($usuario);
			
		}
		
		else{
			
			$data = [
				"nome" =>	set_value('nome'),
				"codigo" =>	set_value('codigo')
			];
			
			$alunoId = $this->Alunos_model->cadastraAluno($data);
			
			
			
			foreach (set_value('disciplinas') as  $disciplina)
			{
				
				$data = [
					'aluno' => $alunoId,
					'disciplina' => $disciplina
				];
				
				$this->Matriculas_model->cadastraMatricula($data);
				
			}
			
			$data = [
				"nome" =>	set_value('nome'),
				"jornada" =>	set_value('jornada'),
				"codigo" =>	set_value('codigo')
			];
			
			$professorId = $this->Alunos_model->cadastraProfessor($data);
			
			$usuario = [
				"nome" =>	set_value('nome'),
				"login" =>	set_value('codigo'),
				"senha" => set_value('senha'),
				"professor" => $professorId,
				"aluno" => $alunoId
			];
			
			$alunoId = $this->Alunos_model->cadastraUsuario($usuario);
			
			
			
		}
		
		
		
		if(!empty($data)){
			redirect('alunos/index?aviso=1');
		}
		
		redirect('alunos/index?aviso=2');	
		
		
		
	}		
	
}
