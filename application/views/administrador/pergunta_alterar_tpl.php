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
		<div class="col-md-6  col-md-offset-2 classe">
			<h3 class="m-1 text-center text-white">Cadastro de Perguntas</h3>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-10  col-md-offset-2 classe">	
			<?php foreach ($questoes as $key => $questao) { ?>

				<form method="post" action="<?php echo base_url('administrador/perguntas/execAlterarPergunta/'.$questao['id']) ?>">
					<div class="form-group <?php echo form_error('questao') ? 'has-error' : '' ?>">
						<label >Pergunta 1</label>
						<textarea style=" resize: vertical;" rows="4" type="text" class="form-control" id="questao" name="questao" placeholder="Questão" value="" autofocus ><?php echo $questao['descricao'] ?></textarea>
						<span id="helpBlock2" class="help-block"><?php echo form_error('questao'); ?></span>
					</div>

					<?php foreach ($alternativas as $key => $value) { ?>

						<div class="form-group">
							<label>Alternativa A</label>
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="correta[]" id="correta[]" value="<?php echo $value['id'] ?>" <?php echo set_checkbox('correta[]', '<?php echo $value["id"] ?>'); ?> <?php
									if($value['correta'] == '1') { ?>
										checked
										<?php }?>/>
									</span>
									<textarea type="text" class="form-control" id="descricao[]" name="alternativas[<?php echo $value['id']; ?>]" value="" placeholder="Descrição"><?php echo $value['descricao']; ?></textarea>
								</div><!-- /input-group -->
							</div>


						<?php } ?>
					
					<h4>Selecione a disciplina</h4>
					<select class="form-control" name="disciplina">
						<?php  foreach ($disciplinas as $key => $disciplina): ?>
							<option value="<?php echo $disciplina["id"]; ?>" <?php
							if($disciplina['id'] == $disciplina['id']) { ?>
								selected="selected"
								<?php }?>><?php echo $disciplina["nome"]; ?></option>
							<?php  endforeach ?>
						</select>
<?php } ?>
						<br/>

						<div class="form-group">
							<button type="submit"  id="cadastrar" class="btn btn-info">Alterar</button>
						</div>
					</form>

				</div>
			</div>
		</div>


		<?php include 'template_footer.php' ?>