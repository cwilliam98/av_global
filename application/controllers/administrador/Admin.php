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
			'alunos'=> $this->Provas_model->getDadosAlunos(),
		];

		print json_encode($dados);

	}

	public function acertosPorQuestoes(){

		$this->load->view('administrador/index_tpl');

	}
	public function formBackup(){
		
		$this->load->view('administrador/backup_tpl');

	}
	public function backup(){

		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
		$this->load->dbutil();



		$db_format=array('format'=>'zip','filename'=>'my_db_backup.sql');
		$backup=& $this->dbutil->backup($db_format);
		$dbname='backup-'.date('Y-m-d').'.zip';
		$save='application/backups/'.$dbname;
		write_file($save,$backup);
		force_download($dbname,$backup);

	}





}
