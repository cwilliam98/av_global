<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		$this->load->view('index_admin_tpl');
		
	}

	
}
