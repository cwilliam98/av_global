<?php
include 'index_admin_tpl.php'; 
?>
<style>	
.classe {
	background: #f8f8f8;
}
</style>
<title>Cadastro de Questões</title>
<div class="container">
	<div class="row">
		<div class="col-md-6   classe">
			<h3 class="m-1 text-center text-white">Alterar questão</h3>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12   classe">	
			<?php foreach ($questoes as $key => $questao) { ?>

				<form method="post"  action="<?php echo base_url('administrador/perguntas/execAlterarPergunta/'.$questao['id']) ?>">
					<div class="form-group <?php echo form_error('disciplina') ? 'has-error' : '' ?>">
						<?php $verifica = "";?>
						<h4>Selecione a disciplina</h4>
						<select class="form-control" name="disciplina">
							<?php  foreach ($disciplinas as $key => $value): ?>
								<?php if ($verifica != $value["curso"]){?>
									<optgroup label="<?php echo $value["curso"]; ?>">
									<?php  }?>
									<option value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
									<?php $verifica = $value["curso"]; ?>
								<?php  endforeach ?>
							</optgroup>
						</select>

					</div>
					<div class="form-group <?php echo form_error('periodo_letivo') ? 'has-error' : '' ?>">

						<h4>Selecione o periodo letivo</h4>
						<select class="form-control" name="periodo_letivo">
							<?php  foreach ($periodos_letivo as $key => $periodo_letivo): ?>
								<option value="<?php echo $periodo_letivo["id"]; ?>" <?php
								if($periodo_letivo['id'] == $questao['periodo_letivo']) { ?>
									selected="selected"
									<?php }?>><?php echo $periodo_letivo["codigo_periodo"]; ?></option>
								<?php  endforeach ?>
							</select>
						<?php } ?>
					</div>
					<div class="form-group <?php echo form_error('questao') ? 'has-error' : '' ?>">
						<label >Pergunta 1</label>
						<textarea style=" resize: vertical;" rows="4" type="text" class="form-control" id="questao" name="questao" placeholder="Questão" value="" autofocus ><?php echo $questao['descricao'] ?></textarea>
						<span id="helpBlock2" class="help-block"><?php echo form_error('questao'); ?></span>
					</div>
					<div class="form-group" id="form">

						<?php foreach ($alternativas as $key => $value) { ?>

							<label>Alternativa <?php echo $value['id']; ?></label>
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="correta[]" id="correta[]" value="<?php echo $value['id'] ?>" <?php echo set_checkbox('correta[]', '<?php echo $value["id"] ?>'); ?> <?php
									if($value['correta'] == '1') { ?>
										checked
										<?php }?>/>
									</span>
									<textarea type="text" class="form-control" id="descricao[]" name="alternativas[<?php echo $value['id']; ?>]" value="" placeholder="Descrição"><?php echo $value['descricao']; ?></textarea>
								</div><!-- /input-group -->


							<?php } ?>
						</div>

						<div class="form-group">
							<a class="btn btn-success" onclick="addNewBtn()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>

							<a class="btn btn-danger" onclick="removeNewBtn()"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
							</div>

							

							<br/>
							<div class="form-group">
								<button type="submit"  id="cadastrar" class="btn btn-info">Alterar</button>
							</div>
						</form>

					</div>
				</div>
			</div>

			<script>
				function addNewBtn(e){
					
					$("#form").append('<div id="add" class="form-group"><label>Alternativa </label><div  class="input-group"><span class="input-group-addon"><input type="checkbox" name="correta[A]" id="correta[A]" value="A" <?php echo set_checkbox('correta[]', 'A'); ?> /></span><textarea type="text" class="form-control" id="alternativaA" name="alternativas[A]" placeholder="alternativa"></textarea></div></div>');
				}
				function removeNewBtn(e){
					$("#add").remove();
				}
			</script>

			<?php include 'template_footer.php' ?>