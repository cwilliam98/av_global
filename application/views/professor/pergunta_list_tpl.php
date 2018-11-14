<?php
include 'index_admin_professor_tpl.php';
?>
<style type="text/css">
<!--
table {
	width:1000px;
	_width:760px;
}
.celula1 {
	width: 900px;
	padding:1px;
	_width: 55px;
}
.celula2 {
	width: 100px;
	padding:1px;
	_width: 495px;
}
-->
</style>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-2">

			</br>
			<select class="form-control" name="disciplina" id="periodo_letivo">
				<option value="" >Selecione...</option>
				<?php  foreach ($periodos_letivo as $periodo_letivo): 
					$selected =  "";
					if ($this->input->get('periodo') == $periodo_letivo['id']) {
						$selected =  "selected";
					} ?>
					<option value="<?php echo $periodo_letivo["id"]; ?>" <?php echo $selected?>><?php echo $periodo_letivo["codigo_periodo"]; ?></option>
				<?php  endforeach ?>
			</select>
			<div class="panel-heading" role="tab" id="">
				<table   align="center"  class="lista-clientes table table-striped" id="myTable">
					<thead>
						<tr>
							<th class="celula1">Descricao</th>
							<th>Opções</th>
						</tr>
					</thead>

				</div>
				<?php foreach ($questoes as $pergunta) { ?>

					<tr>
						<td class="celula1">
							<div class="panel-heading" role="tab" id="questao-painel-<?php echo $pergunta['id']; ?>">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#questao-<?php echo $pergunta['id']; ?>" aria-expanded="true" aria-controls="questao-<?php echo $pergunta['id']; ?>">
										Questão <?php echo $pergunta['id'];?> : <?php echo character_limiter(strip_tags(html_entity_decode($pergunta['descricao'])),50); ?>
									</a>
								</h4>

							</div>

							<div id="questao-<?php echo $pergunta['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questao-painel-<?php echo $pergunta['id']; ?>">
								<div class="panel-body">
									<?php echo html_entity_decode($pergunta['descricao']); ?>

									<?php foreach ($pergunta['alternativas'] as $alternativa) { ?>
										<?php  echo $alternativa['id']; echo ") "; echo $alternativa['descricao']; ?><br>
									<?php } ?>
								</div>
							</div>
						</td>
						<td class="celula2">
							<p class=" text-right">

								<a href="<?=base_url('administrador/perguntas/inativar/' .$pergunta['id'])?>" class="btn-sm btn-danger"  onclick="return confirm ('Têm certeza que deseja excluir esse registro?') "><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
								<a href="<?=base_url('administrador/perguntas/alterar/' .$pergunta['id'])?>" class="btn-sm btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							</p>
						</td>
					</tr>
				<?php } ?>

			</table>


		</body>
		</html>
		<script type="text/javascript">

			$('#periodo_letivo').change(function(){
				var id = $(this).val();
				if(id != ""){
					location.href = '<?php echo base_url('professor/perguntas') ?>?periodo='+id;			
				} else {
					location.href = '<?php echo base_url('professor/perguntas') ?>';			
				}
			});
		</script>
