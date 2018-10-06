<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perguntas extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}
		$aluno = $this->session->userdata('usuario');

		if ($aluno['contexto'] == 'aluno') {
			$this->load->view('aviso_permissao');
		}
	}

	public function index(){
		
		$this->load->model('Perguntas_model');

		$data = [
			"questoes" => $this->Perguntas_model->getQuestoes()
		];

		foreach($data['questoes'] as $id => $questao)
		{
			$data['questoes'][$id]['alternativas'] = $this->Perguntas_model->getAlternativas($questao['id']);
		}

		$this->load->view('professor/pergunta_list_tpl',$data);
	}

	public function cadastra($id=-1)
	{
			//if ($id != -1) {
			//	$data["dados"] = $this->model->getDados($id);
			//}
		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');
		
		$this->load->model('Disciplinas_model');
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinas();
		$this->load->view('professor/pergunta_cadastro_tpl', $data);
	}

	public function execCadastraPergunta(){

		$aluno = $this->session->userdata('aluno');

		$this->form_validation->set_rules('questao',       'questao',          	 'required|max_length[1000]');
		$this->form_validation->set_rules('alternativa[]', 'alternativa',        'max_length[1000]');
		$this->form_validation->set_rules('correta[]',     'alternativa Correta','required');
		$this->form_validation->set_rules('disciplina',    'disciplina',         'required');

		if($this->form_validation->run() == FALSE)
		{
			redirect('professor/perguntas/cadastra');
		}
		
		$this->load->model('Perguntas_model');

		$dados = $this->input->post();

		$questaoId = $this->Perguntas_model->cadastraPergunta([
			"descricao" =>	set_value('questao'),
			"disciplina" => set_value('disciplina'),
			"professor"  => $aluno['id']
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
			redirect('professor/admin/index?aviso=1');
		}

		redirect('professor/admin/index?aviso=2');


	}

	public function uploadImageCKeditor() {
		if(isset($_FILES['upload'])){
  // ------ Process your file upload code -------
			$filen = $_FILES['upload']['tmp_name'];
			$con_images = "uploads/".$_FILES['upload']['name'];
			move_uploaded_file($filen, $con_images );
			$url = $con_images;

			$funcNum = $_GET['CKEditorFuncNum'] ;
   // Optional: instance name (might be used to load a specific configuration file or anything else).
			$CKEditor = $_GET['CKEditor'] ;
   // Optional: might be used to provide localized messages.
			$langCode = $_GET['langCode'] ;

   // Usually you will only assign something here if the file could not be uploaded.
			$message = '';
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		}
	}


}
