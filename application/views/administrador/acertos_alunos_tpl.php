<?php
include 'index_admin_tpl.php'; 
?>

<!DOCTYPE html>
<html>

<body>

<div class="container">
		<div class="row">
			<div class="col-md-12 ">

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
			<div class="panel-heading" role="tab" id="">
				<table   align="center"  class="lista-clientes table table-striped" id="myTable">
					<thead>
						<tr>
							<th class="celula1">Descricao</th>
							<th>Acertos</th>
						</tr>
					</thead>

				</div>
				<?php foreach ($dados as $aluno) { ?>

					<tr>
						<td class="celula1">
							<div class="panel-heading" role="tab" id="questao-painel-<?php echo $aluno['aluno']; ?>">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#questao-<?php echo $aluno['aluno']; ?>" aria-expanded="true" aria-controls="questao-<?php echo $aluno['aluno']; ?>">
										<?php echo character_limiter(strip_tags(html_entity_decode($aluno['descricao'])),50); ?>
									</a>
								</h4>

							</div>

							<div id="questao-<?php echo $aluno['aluno']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questao-painel-<?php echo $aluno['aluno']; ?>">
								<div class="panel-body">
									<?php echo html_entity_decode($aluno['descricao_alternativa']); ?><br>
									<?php echo html_entity_decode($aluno['alternativa']); ?>

								</div>
							</div>
						</td>
						<td class="celula2">
							<?php   echo $aluno['correta']; ?><br>
							
						</td>
					</tr>
				<?php } ?>

			</table>

		</div>
	</div>
</div>
</body>
<script type="text/javascript">

	$('#aluno').change(function(){
		var id = $(this).val();
		if(id != ""){
			location.href = '<?php echo base_url('administrador/admin/acertosPorAluno') ?>?aluno='+id;			
		} else {
			location.href = '<?php echo base_url('administrador/admin/acertosPorAluno') ?>';			
		}
	});
</script>
</html>