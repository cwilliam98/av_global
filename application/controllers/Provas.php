<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provas extends CI_Controller {


	public function index(){

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		$this->load->model('Disciplinas_model');
		$data["disciplinas"] = $this->Disciplinas_model->getTodasDisciplinas();
		$this->load->view('prova_cadastro_tpl', $data);
	}

	public function execCadastraProva(){

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$usuario = $this->session->userdata('aluno');

		$this->form_validation->set_rules('nome',          'nome',           			'trim|required|max_length[1000]');
		$this->form_validation->set_rules('aplicacao',     'data',           			'trim|required');
		$this->form_validation->set_rules('qtd_questoes',  'quantidade de questoes',    'trim|required');
		$this->form_validation->set_rules('reaproveitar',  'reaproveitar',    			'trim|required');
		$this->form_validation->set_rules('tipo_prova',    'tipo de prova',    			'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			$retorno = [];
			$retorno['error']  = true;
			$retorno['errors'] = $this->form_validation->error_array();
			echo json_encode($retorno);
			exit();
		}

		set_time_limit(0);


		$this->load->model('Provas_model');



		$data = array(
			"nome" =>	set_value('nome'),
			"aplicacao" =>	set_value('aplicacao'),
			"qtd_questoes" => set_value('qtd_questoes'),
			"reaproveitar" => set_value('reaproveitar'),
			"tipo_prova" => set_value('tipo_prova'),
			"professor"  => $usuario['id']
		);


		if(!$this->Provas_model->cadastraProva($data)){
			$retorno['errors'] = [
				'mensagem' => 'Deu pau no banco de dados'
			];
			$retorno['error'] = true;
		}

		else
		{
			$retorno['error'] = false;

			echo json_encode($retorno);

		}
	}


	public function aviso(){

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		$this->load->view('prova_aviso.php');

	}

	public function gerarProva(){

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		$this->load->model('Provas_model');
		$this->load->model('Itens_prova_model');
		$this->load->model('Formularios_model');



		$prova = $this->Provas_model->getProva($aluno['id']);


		if(!$prova)
		{
			redirect('provas/aviso');

		} else if($prova->situacao == 'finalizada' && $prova->aluno == $aluno['id']){

			redirect('provas/aviso');	

		}
		

		$formularios = $this->Provas_model->getProvaAluno($aluno['id'],$prova->id);


		foreach ($formularios as $formulario) {

			$data_formulario = array(
				"aluno" => $aluno['id'],
				"disciplina" => $formulario['disciplina'],
				"prova" => $formulario['prova'],
				"situacao" => 'em andamento'	
			);

			$id = $this->Formularios_model->cadastra($data_formulario);

			$questoes = $this->Provas_model->getQuestoesById($formulario['disciplina'], $formulario['qtd_questoes']);
			


			foreach($questoes as $questao)
			{
				$data = array(
					"formulario" => $id,
					"questao" => $questao['id']
				);
				

				$this->Itens_prova_model->cadastra($data);
			}

		}
		
		redirect('provas/fazer');
	}

	public function fazer(){

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		$this->load->model('alunos_model');
		$this->load->model('Disciplinas_model');
		$this->load->model('Provas_model');
		$this->load->model('Itens_prova_model');
		$this->load->view('template_alunos_header.php',['aluno' => $aluno]);


		$prova = $this->Provas_model->getProva($aluno['id']);
// echo "<pre>";
//  print_r($prova); 
//  echo $aluno['id'];
//  exit();
		if($prova->situacao == 'finalizada' && $prova->aluno == $aluno['id']){
			
			redirect('provas/aviso');	
		}
		
		$prova->disciplinas = $this->Provas_model->getDisciplinas( $prova->id, $aluno['id'] );

		

		if(!$prova->disciplinas)
		{

			redirect('provas/gerarProva');
		}


		foreach ($prova->disciplinas as $disciplina)
		{
			$disciplina->questoes = $this->Provas_model->getQuestoesByFormulario( $disciplina->formulario );
			foreach ($disciplina->questoes as $questao)
			{
				$questao->alternativas = $this->Provas_model->getAlternativasByQuestoes( $questao->questao );
			}
		}

		$this->load->view('relatorio_provas_aluno_tpl',$prova);

		$this->load->view('template_alunos_footer');
	}



	public function corrigir()
	{
		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}


		$this->load->model('Provas_model');
		
		foreach ($this->input->post('questao') as $questao => $alternativa)
		{
			$resultado =  $this->Provas_model->getAlternativaById($alternativa,$questao,$aluno['id']);

			if($resultado){
				$id = $this->Provas_model->inserirRespostas($resultado);
				
			}
		}

	}

	public function resultado(){
		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}


		$this->load->model('Provas_model');



		$id = $this->input->post('id');

		
		$this->Provas_model->insereFimSessao($id);

		if(!$this->Provas_model->atualizaSituacaoProva($id)){
			echo json_encode('erro');
		}
		else {
			echo json_encode('funcionou');
		}


	}

	public function acompanhaProvas(){

		if(!$this->session->userdata('logado'))
		{
			redirect('login');
		}

		$aluno = $this->session->userdata('aluno');

		$this->load->model('Provas_model');

		$provas['prova'] = $this->Provas_model->getProvas();

		$prova['prova'] = $provas['prova'];

		$this->load->view('acompanhamento_provas_tpl', $prova);
		

	}

	public function fim(){
		
		$this->session->sess_destroy();

		$this->load->view('fim_tpl');

	}

	public function sessao(){
		if(!$this->session->userdata('logado'))
		{
			redirect('login'); 
		}


		$this->load->model('Provas_model');

		$data = ["usuario" => $this->input->post('id')];	

		$this->Provas_model->insereSessao($data);

	}
}
