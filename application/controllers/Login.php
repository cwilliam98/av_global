<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{

		$this->load->view('/login_tpl');
	}


	public function logon(){

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		$this->form_validation->set_rules('codigo', 'Codigo','required|min_length[4]|max_length[8]');
		$this->form_validation->set_rules('senha', 'Senha','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
			return;
		}

		$codigo = $this->input->post('codigo');
		$senha = $this->input->post('senha');
		$this->load->model('Login_model');

		$usuario = $this->Login_model->login($codigo, $senha);

		if ( !$usuario ){
			redirect('login/index?aviso=2');
		}

		$this->session->set_userdata('logado', TRUE);
		$this->session->set_userdata('usuario', $usuario);

		if ($usuario['contexto'] === 'aluno'){
			redirect('aluno/provas/fazer');
		}

		redirect($usuario['contexto'].'/admin');
	}

	public function logout(){
		$this->session->sess_destroy(); //destroi a sessao
		redirect('/login'); // redireciona para a raiz do sistema(pagina de login)
	}
}
