<?php
include 'index_admin_tpl.php'; 
?>

<!DOCTYPE html>
<html>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

			</br>
			<select class="form-control" name="prova" id="prova">
				<option value="" >Selecione...</option>
				<?php  foreach ($provas as $prova): 
					$selected =  "";
					if ($this->input->post('prova') == $prova['id']) {
						$selected =  "selected";
					} ?>
					<option value="<?php echo $prova["id"]; ?>" <?php echo $selected?>><?php echo $prova["nome"]; echo " | "; echo $prova["aplicacao"]; ?></option>
				<?php  endforeach ?>
			</select>
		</br>
		<select class="form-control" name="aluno" id="aluno">
			<option value="" >Selecione...</option>
			<?php  foreach ($alunos as $aluno): 
				$selected =  "";
				if ($this->input->get('aluno') == $aluno['id']) {
					$selected =  "selected";
				} ?>
				<option value="<?php echo $aluno["id"]; ?>" <?php echo $selected?>><?php echo $aluno["nome"];?></option>
			<?php  endforeach ?>
		</select>

		<br>
		<button class="btn btn-info" id="filtrar">Filtrar</button>
	</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<div class="panel-heading" role="tab" id="">
				<table   align="center"  class="lista-clientes table table-striped" id="myTable">
					<thead>
						<tr>
							<th class="celula1">Descricao</th>
							<th>Acertos</th>
						</tr>
					</thead>

				</div>
				<?php foreach ($dados as $pergunta) { ?>

					<tr>
						<td class="celula1">
							<div class="panel-heading" role="tab" id="questao-painel-<?php echo $pergunta['questao']; ?>">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#questao-<?php echo $pergunta['questao']; ?>" aria-expanded="true" aria-controls="questao-<?php echo $pergunta['questao']; ?>">
										Questão <?php echo $pergunta['questao'];?> : <?php echo character_limiter(strip_tags(html_entity_decode($pergunta['descricacao_questao'])),50); ?>
									</a>
								</h4>

							</div>

							<div id="questao-<?php echo $pergunta['questao']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questao-painel-<?php echo $pergunta['questao']; ?>">
								<div class="panel-body">
									<?php echo html_entity_decode($pergunta['descricacao_questao']); ?><br>

									<?php  echo $pergunta['alternativa']; echo ") "; echo $pergunta['descricao']; ?><br>
								</div>
							</div>
						</td>
						<td class="celula2">
							<?php   echo $pergunta['correta']; ?><br>

						</td>
					</tr>
				<?php } ?>

			</table>

		</div>
	</div>
</div>
</body>
<script type="text/javascript">

	$('#filtrar').click(function(){
		var aluno = $('#aluno').val();
		var prova = $('#prova').val();
		if(aluno != "" && prova != ""){
			location.href = '<?php echo base_url('administrador/admin/acertosPorProva') ?>?prova='+aluno+'?'+prova;			
		} else {
			location.href = '<?php echo base_url('administrador/admin/acertosPorProva') ?>';			
		}
	});
</script>
</html>