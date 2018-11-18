<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perguntas extends MY_Controller {

	public function index(){

		$this->load->model('Perguntas_model');
		$this->load->helper('text');
		$usuario = $this->session->userdata('usuario');

		$periodo_letivo = $this->input->get('periodo');

		$data = [
			"questoes" => $this->Perguntas_model->getQuestoesPorPeriodo($periodo_letivo,$usuario['id']),
			"periodos_letivo" => $this->Perguntas_model->getPeriodoLetivo()
		];

		foreach($data['questoes'] as $id => $questao)
		{
			$data['questoes'][$id]['alternativas'] = $this->Perguntas_model->getAlternativas($questao['id']);
		}

		$this->load->view('professor/pergunta_list_tpl',$data);
	}

	

	public function geraGabarito(){
		
		$this->load->model('Perguntas_model');
		$usuario = $this->session->userdata('usuario');

		$data = [
			"questoes" => $this->Perguntas_model->getQuestoesByProfessor($usuario['id'])
		];

		foreach($data['questoes'] as $id => $questao)
		{
			$data['questoes'][$id]['alternativas'] = $this->Perguntas_model->getAlternativas($questao['id']);
		}

		$this->load->view('professor/pergunta_gabarito_tpl',$data);
	}

	public function cadastra()
	{
		$usuario = $this->session->userdata('usuario');

		$this->load->model('Disciplinas_model');

		$this->load->model('Disciplinas_model');
		$this->load->model('Perguntas_model');

		$data = [
			"disciplinas" => $this->Disciplinas_model->getTodasDisciplinas($usuario['id']),
			"periodos_letivo" => $this->Perguntas_model->getPeriodoLetivo()
		];

		$this->load->view('professor/pergunta_cadastro_tpl', $data);
	}

	public function execCadastraPergunta(){
		
		$aluno = $this->session->userdata('usuario');

		$this->form_validation->set_rules('questao',       'questao',          	 'trim|required|max_length[10000]');
		$this->form_validation->set_rules('alternativa[]', 'alternativa',        'trim|max_length[10000]');
		$this->form_validation->set_rules('correta[]',     'alternativa lorreta','trim|required');
		$this->form_validation->set_rules('disciplina',    'disciplina',         'trim|required');
		$this->form_validation->set_rules('periodo_letivo','periodo letivo',     'trim|required');

		if($this->form_validation->run() == FALSE)
		{			
			$this->cadastra();

			return;
		}
		
		$this->load->model('Perguntas_model');

		$dados = $this->input->post();

		$questaoId = $this->Perguntas_model->cadastraPergunta([
			"descricao" =>	set_value('questao'),
			"disciplina" => set_value('disciplina'),
			"professor"  => $aluno['id'],
			"periodo_letivo" => set_value('periodo_letivo')
		]);


		foreach (set_value('alternativa') as $alternativa => $descricao)
		{
			if (empty($descricao))
				continue;

			$data = [
				'descricao' => $descricao,
				'correta' => (bool)set_value("correta[$alternativa]"),
				'questao' => $questaoId,

			];


			$this->Perguntas_model->cadastraAlternativa($data);
		}
		if(!empty($data)){
			redirect('professor/perguntas/cadastra?aviso=1');
		}

		redirect('professor/perguntas/cadastra?aviso=2');


	}

	public function alterar($id= null){

		$usuario = $this->session->userdata('usuario');
		
		$this->load->model('Disciplinas_model');
		$this->load->model('Perguntas_model');

		$data["questoes"] = $this->Perguntas_model->getQuestoesPeloId($id);
		

		$data["alternativas"] = $this->Perguntas_model->getAlternativas($id);
		
		
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinas($usuario['id']);

		$data["periodos_letivo"] = $this->Perguntas_model->getPeriodoLetivo();

		//echo '<pre>'; print_r(reset($data['questoes'])); exit();		

		$this->load->view('professor/pergunta_alterar_tpl',$data);

	}

	public function execAlterarPergunta($id){
		

		$aluno = $this->session->userdata('usuario');
		$id = (int)$id;
		$this->form_validation->set_rules('questao',       'questao',          	 'required|max_length[10000]');
		$this->form_validation->set_rules('alternativa[]', 'alternativa',        'max_length[1000]');
		$this->form_validation->set_rules('correta[]',     'alternativa Correta','required');
		$this->form_validation->set_rules('disciplina',    'disciplina',         'required');
		$this->form_validation->set_rules('periodo_letivo','periodo letivo',     'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->alterar($id);

			return;
		}
		
		$this->load->model('Perguntas_model');



		$data = [
			"descricao"  =>	set_value('questao'),
			"disciplina" => set_value('disciplina'),
			"professor"  => $aluno['id'],
			"periodo_letivo" => set_value('periodo_letivo')
		];


		$alternativa = $this->Perguntas_model->getAlternativa($id);

		$this->Perguntas_model->alteraPergunta($data,$id,$this->input->post('disciplina'));
		$this->Perguntas_model->marcaComoErrada($id);

		$correta =  $this->input->post('correta'); 


		
		foreach ($correta as  $alternativa){

			$this->Perguntas_model->alteraAlternativaCorreta($alternativa);
		} 

		foreach (set_value('alternativas') as $alternativa => $descricao)
		{

			if (empty($descricao))
				continue;
			
			$data = [
				'descricao' => $descricao
			];
			if ($alternativa == 'A') {
				$data['questao'] = $id;
				$teste = $this->Perguntas_model->cadastraAlternativa($data);

			}
			$retorno = $this->Perguntas_model->alteraAlternativa($data,$id,$alternativa);
			
		}
		if(!empty($retorno)){
			redirect('professor/perguntas/alterar/'.$id."?aviso=1");
		}

		redirect('professor/perguntas/alterar?aviso=2');	
	}

	public function inativar($id){
		$id = (int)$id;
		
		$this->load->model('Perguntas_model');


		$retorno = $this->Perguntas_model->inativaPergnta($id);

		if(!empty($retorno)){
			redirect('professor/perguntas/index?aviso=1');
		}

		redirect('professor/perguntas/index?aviso=2');	
	}

	public function uploadImageCKeditor() {


		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 1024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('upload'))
		{

			$data = $this->upload->data();

			$url = site_url('uploads/'.$data['file_name']);

			$funcNum = $_GET['CKEditorFuncNum'] ;

   			// Optional: instance name (might be used to load a specific configuration file or anything else).
			$CKEditor = $_GET['CKEditor'];
  			 // Optional: might be used to provide localized messages.
			$langCode = $_GET['langCode'];
			
  			 // Usually you will only assign something here if the file could not be uploaded.
			$message = '';
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		}
		
	}


}
