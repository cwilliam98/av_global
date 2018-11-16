<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provas extends MY_Controller {

	
	public function aviso(){

		$this->load->view('aluno/prova_aviso');

	}

	public function gerarProva(){

		$aluno = $this->session->userdata('usuario');

		$this->load->model('Provas_model');
		$this->load->model('Itens_prova_model');
		$this->load->model('Formularios_model');



		$prova = $this->Provas_model->getProva($aluno['id']);

		
		if(!$prova)
		{
			redirect('aluno/provas/aviso');

		} else if($prova->situacao == 'finalizada' && $prova->aluno == $aluno['id']){

			redirect('aluno/provas/aviso');	

		}


		$formularios = $this->Provas_model->getProvaAluno($aluno['id'],$prova->id);



		foreach ($formularios as $formulario) {
			
			$questoes = $this->Provas_model->verificaQuestoesByDisciplina($formulario['disciplina']);

			if($questoes){

				$data_formulario = array(
					"aluno" => $aluno['id'],
					"disciplina" => $formulario['disciplina'],
					"prova" => $formulario['prova'],
					"situacao" => 'em andamento'
				);

				$id = $this->Formularios_model->cadastra($data_formulario);
				
				foreach ($questoes as $questao) {

					$questoes = $this->Provas_model->getQuestoesByDisciplina($formulario,$questao);

					if($questoes){

						foreach($questoes as $questao)
						{
							$data = array(
								"formulario" => $id,
								"questao" => $questao['id']
							);

							$this->Itens_prova_model->cadastra($data);
						}
					}
				}

			}
		}

		$data = ["usuario" => $aluno['id']];

		$this->Provas_model->insereSessao($data);

		redirect('aluno/provas/fazer');
	}

	public function fazer(){


		$aluno = $this->session->userdata('usuario');

		$this->load->model('alunos_model');
		$this->load->model('Disciplinas_model');
		$this->load->model('Provas_model');
		$this->load->model('Itens_prova_model');
		$this->load->view('aluno/template_alunos_header.php',['aluno' => $aluno]);


		$prova = $this->Provas_model->getProva($aluno['id']);

		if($prova->situacao == 'finalizada' && $prova->aluno == $aluno['id']){

			redirect('aluno/provas/aviso');	
		}

		$prova->disciplinas = $this->Provas_model->getDisciplinas( $prova->id, $aluno['id'] );



		if(!$prova->disciplinas)
		{

			redirect('aluno/provas/gerarProva');
		}

		foreach ($prova->disciplinas as $disciplina)
		{

			$disciplina->questoes = $this->Provas_model->getQuestoesByFormulario( $disciplina->formulario );

			if ($disciplina->questoes){
				foreach ($disciplina->questoes as $questao)
				{
					$questao->alternativas = $this->Provas_model->getAlternativasByQuestoes( $questao->questao );
				}
			}
		}



		$this->load->view('aluno/relatorio_provas_aluno_tpl',$prova);

		$this->load->view('aluno/template_alunos_footer');

	}



	public function corrigir() {

		$aluno = $this->session->userdata('usuario');
		$this->load->model('Provas_model');


		foreach ($this->input->post('questao') as $questao => $alternativa)
		{
			$resultado =  $this->Provas_model->getAlternativaById($alternativa,$questao,$aluno['id']);

			if($resultado){
				$id = $this->Provas_model->inserirRespostas($resultado);

			}
		}

	}


	public function fim(){

		$aluno = $this->session->userdata('usuario');


		$this->load->model('Provas_model');

		$this->Provas_model->atualizaSituacaoProva($aluno['id']);

		$dados = $this->Provas_model->getProva($aluno['id']);


		$respostas =  $this->Provas_model->getResposta($aluno['id'],$dados->id);


		$acertos['acertos'] = 0;

		foreach ($respostas as $resposta) {

			$alternativa =  $this->Provas_model->getAlternativaCorreta($resposta['alternativa']);

			if ($alternativa['correta'] == '1') {
				$acertos['acertos'] = $acertos['acertos'] + 1;
			}

		}

		$this->Provas_model->insereFimSessao($aluno['id']);

		$this->load->view('aluno/fim_tpl',$acertos);
		$this->session->sess_destroy();

	}

	public function sessao($id){

		$aluno = (int)$id;

		$this->load->model('Provas_model');

		$data = ["usuario" => $aluno];	

		$this->Provas_model->insereSessao($data);

	}

	public function getDataInicio(){

		$alunoId = $this->input->post('id');


		$this->load->model('Provas_model');

		$data = $this->Provas_model->getDataInicio($alunoId);

		print reset($data);

	}
}
