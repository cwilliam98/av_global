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

		$dados = $this->Provas_model->getRespostas();

		print json_encode($dados);

	} 
	public function acertosAlunos() {

		$aluno = $this->session->userdata('usuario');

		$this->load->model('Provas_model');

		$dados = $this->Provas_model->getRespostasAluno($aluno['id']);

		print json_encode($dados);

	} 
	public function acertosProvas() {

		$aluno = $this->session->userdata('usuario');

		$this->load->model('Provas_model');

		$dados = $this->Provas_model->getRespostasProva();

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

	public function acertosPorAluno(){
		$this->load->view('administrador/acertos_alunos_tpl');
	}
	public function acertosPorProva(){
		$this->load->view('administrador/acertos_provas_tpl');
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
		$backup=& $this->dbutil->backup($db_format);
		$dbname='backup-'.date('Y-m-d').'-'.$data.'.sql';
		$save='application/backups/'.$dbname;
		write_file($save,$backup);
		force_download($dbname,$backup);


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
		redirect('administrador/admin/formBackupFull?aviso=1');

	}

	function upload()
	{
		$this->load->view('administrador/upload_form_tpl', array('error' => ' ' ));
	}

	function do_upload(){

		$config['upload_path'] = 'C:\xampp\htdocs\av_global\application\uploads';
		$config['allowed_types'] = '*';
		$config['max_size']	= '100';
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

			$arquivo = fopen($dados['full_path'], "r");

			$linha = 1;
			
			while (($data = fgetcsv($arquivo, 1000, "\n")) !== FALSE) {

				if ($linha++ == 1)
					continue;
				
			  //  $sql = "INSERT INTO TABELA(NOME, EMAIL) VALUES('". $data[0] ."', '". $data[1] ."')";
				$this->load->model('Disciplinas_model');
				$this->Disciplinas_model->cadastraBackupDisciplina($data);
			}
			
			fclose ($arquivo);
			
			$variaveis['status'] = "Importação concluída com sucesso.";
			
			$variaveis['upload_data'] = $this->upload->data();

			$this->load->view('aviso_permissao', $variaveis);
		}
	}





}
