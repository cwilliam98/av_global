<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		if ($aluno['contexto'] != 'professor'){

			$this->load->view('aviso_permissao');
		}
	}
	
	public function index() {

		$this->load->view('professor/index_admin_professor_tpl');

	}



	
}
