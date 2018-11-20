<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function index() {

		$this->load->model('Perguntas_model');
		$this->load->model('Provas_model');
		$this->load->helper('date');

		$data = [
			"questoes" => $this->Perguntas_model->getQuestoes()
		];

		foreach($data['questoes'] as $id => $questao)
		{
			$data['questoes'][$id]['alternativas'] = $this->Perguntas_model->getAlternativas($questao['id']);
		}

		$provas = ["provas" => $this->Provas_model->getTodasProvas()];

		$this->load->view('administrador/quantidade_dados_tpl',$provas);

	}

	public function carregaDados() {

		$aluno = $this->session->userdata('usuario');

		$this->load->model('Provas_model');

		$dados = $this->Provas_model->getRespostasAdmin();

		print json_encode($dados);

	} 
	public function acertosAlunos() {

		

	} 
	public function acertosProvas() {

		

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

	public function acertosPorAluno(){

		$this->load->helper('text');
		$aluno = $this->input->get('aluno');
		

		$this->load->model('Provas_model');
		$this->load->model('Alunos_model');

		$dados['dados'] = $this->Provas_model->getRespostasAluno($aluno);
		$dados['alunos'] = $this->Alunos_model->alunos();

		$this->load->view('administrador/acertos_alunos_tpl',$dados);
	}

	public function acertosPorProva(){

		$this->load->helper('text');
		$prova = $this->input->get('prova');
		$filtro = $prova;

		if ($prova){
			$filtro = explode('?', $prova);
		}
		$usuario = $this->session->userdata('usuario');
		$this->load->model('Alunos_model');

		$this->load->model('Provas_model');

		$dados['dados'] = $this->Provas_model->getRespostasProva($filtro);


		$qtd_peso = 0;
		$qtd_questoes = count($dados['dados']);
		if ($qtd_questoes) {
			$qtd_peso = (10 / $qtd_questoes);
		}
		

		$dados['provas'] = $this->Provas_model->Provas();

		$dados['alunos'] = $this->Alunos_model->alunos();

		$dados['qtd_peso'] = $qtd_peso;


		$this->load->view('administrador/acertos_provas_tpl',$dados);
	}
	public function formBackup(){
		
		$this->load->dbutil();
		$tabelas['tables']	 = $this->db->list_tables();
		
		$this->load->view('administrador/backup_tpl',$tabelas);
	}

	public function formBackupFull(){
		
		
		$this->load->view('administrador/backup_full_tpl');
	}
	public function backup(){

		$data = $this->input->post('table');


		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
		$this->load->dbutil();


		$db_format = array(
			'tables'        => $data,
		        'format'        => 'txt',                       // gzip, zip, txt
		        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
		        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
		    );
		$backup= $this->dbutil->backup($db_format);
		$dbname='backup-'.date('Y-m-d').'-'.$data.'.sql';
		$save='application/backups/'.$dbname;
		if(write_file($save,$backup)){
			redirect('administrador/admin/formBackup?aviso=1');
		}
		redirect('administrador/admin/formBackup?aviso=2');



	}

	public function backupFull(){

		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
		$this->load->dbutil();


		$db_format = array(
		        'format'        => 'txt',                       // gzip, zip, txt
		        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
		        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
		    );
		$backup = $this->dbutil->backup($db_format);
		$dbname ='backup-'.date('Y-m-d').'.sql';
		$save='application/backups/'.$dbname;
		// force_download($dbname,$backup);

		if(write_file($save,$backup)){
			redirect('administrador/admin/formBackupFull?aviso=1');
		}
		redirect('administrador/admin/formBackupFull?aviso=2');

	}

	function upload()
	{
		$this->load->view('administrador/upload_form_tpl', array('error' => ' ' ));
	}

	function do_upload(){

		$config['upload_path'] = 'C:\xampp\htdocs\av_global\application\uploads';
		$config['allowed_types'] = '*';
		$config['max_size']	= '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('administrador/upload_form_tpl', $error);
		}
		else
		{
			$this->load->helper('file');			
			$this->load->database();
			
			$dados = $this->upload->data();
			// print_r($dados['full_path']);
			// exit();
			// $path   = 'application/backups/backup-'.date('Y-m-d').'.sql';
			$handle = fopen($dados['full_path'], "r");
			if ($handle) {
				$this->db->query('SET FOREIGN_KEY_CHECKS = 0');

				$templine = '';
				while (($line = fgets($handle)) !== false) {
					$line = trim($line);

					if ( empty($line) )
						continue;

					if ( substr($line, 0, 2) == '--')
						continue;

					if ( substr($line, 0, 1) == '#')
						continue;

					$templine .= $line;

					if (substr($line, -1, 1) != ';')
					continue;

					$this->db->query($templine);

					$templine = '';
				}

				if(fclose($handle)){
					redirect('administrador/admin/do_upload?aviso=1');
				}
				redirect('administrador/admin/do_upload?aviso=2');
			} else {
				die('foreud');
			}
		}
	}





}
