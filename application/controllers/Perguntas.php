<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perguntas extends CI_Controller {

	public function index(){
		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}


		$this->load->model('Perguntas_model');

		$data = [
			"questoes" => $this->Perguntas_model->getQuestoes()
		];

		foreach($data['questoes'] as $id => $questao)
		{
			$data['questoes'][$id]['alternativas'] = $this->Perguntas_model->getAlternativas($questao['id']);
		}

		$this->load->view('pergunta_list_tpl',$data);
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
		$this->load->view('pergunta_cadastro_tpl', $data);
	}

	public function execCadastraPergunta(){

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');


		$this->form_validation->set_rules('questao',       'questao',          	 'required|max_length[1000]');
		$this->form_validation->set_rules('alternativa[]', 'alternativa',        'max_length[1000]');
		$this->form_validation->set_rules('correta[A]',     'alternativa Correta','required');
		$this->form_validation->set_rules('disciplina',    'disciplina',         'required');

	if($this->form_validation->run() == FALSE)
		{
			$retorno = [];
			$retorno['error']  = true;
			$retorno['errors'] = $this->form_validation->error_array();
			echo json_encode($retorno);
			
		}
		else
		{


		$this->load->model('Perguntas_model');


		$questaoId = $this->Perguntas_model->cadastraPergunta([
			"descricao" =>	set_value('questao'),
			"disciplina" => set_value('disciplina')
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

			if(!$this->Perguntas_model->cadastraAlternativa($data)){
					$retorno['errors'] = [
						'mensagem' => 'Deu pau no banco de dados'
					];
					$retorno['error'] = true;
				}

				else
				{
					$retorno['error'] = false;
				}
		}
		echo json_encode($retorno);

	}
}


}
