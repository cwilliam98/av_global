<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		
	}
	
	public function index() {

		$aluno = $this->session->userdata('aluno');

		if ($aluno['contexto'] == 'administrador'){

			$this->load->view('index_admin_tpl');
		} else {
			$this->load->view('aviso_permissao');
		}

	}

	public function professor()	{
		
		$aluno = $this->session->userdata('aluno');

		if ($aluno['contexto'] == 'professor'){

			$this->load->view('index_admin_professor_tpl');
		}
		else {
			$this->load->view('aviso_permissao');
		}
	}



	
}
