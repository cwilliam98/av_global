<?php
	include 'index_admin_tpl.php'; 
?>
<style>	
.classe {
	background: #f8f8f8;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<h3 class="m-1 text-center">Cadastrar nova Questão</h3>
		</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-10  col-md-offset-2 classe">

			<form method="post" action="<?php echo base_url('administrador/perguntas/execCadastraPergunta') ?>">
				<div class="form-group <?php echo form_error('questao') ? 'has-error' : '' ?>">
					<label >Pergunta 1</label>
					<textarea style=" resize: vertical;" rows="4" type="text" class="form-control" id="questao" name="questao" value="<?php echo set_value('questao'); ?>" placeholder="Questão" autofocus ></textarea>
					<span id="helpBlock2" class="help-block"><?php echo form_error('questao'); ?></span>
				</div>

				<div class="form-group">
					<label>Alternativa A</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[A]" id="correta[A]" value="A" <?php echo set_checkbox('correta[]', 'A'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaA" name="alternativa[A]" placeholder="alternativa A"></textarea>
					</div><!-- /input-group -->
				</div>

				<div class="form-group">
					<label>Alternativa B</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox"  name="correta[B]" value="B" <?php echo set_checkbox('correta[]', 'B'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaB" name="alternativa[B]" placeholder="alternativa B"></textarea>
					</div><!-- /input-group -->
				</div>

				<div class="form-group">
					<label>Alternativa C</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[C]" value="C" <?php echo set_checkbox('correta[]', 'C'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaC" name="alternativa[C]" placeholder="alternativa C"></textarea>
					</div><!-- /input-group -->
				</div>

				<div class="form-group">
					<label>Alternativa D</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[D]" value="D" <?php echo set_checkbox('correta[]', 'D'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaD" name="alternativa[D]" placeholder="alternativa D"></textarea>
					</div><!-- /input-group -->
				</div>

				<div class="form-group">
					<label>Alternativa E</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[E]" value="E" <?php echo set_checkbox('correta[]', 'E'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaE" name="alternativa[E]" placeholder="alternativa E"></textarea>
					</div><!-- /input-group -->
				</div>

				<h4>Selecione a disciplina</h4>
				<select class="form-control" name="disciplina">
					<?php  foreach ($disciplinas as $key => $value): ?>
						<option value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
					<?php  endforeach ?>
				</select>

				<h4>Selecione o periodo letivo</h4>
				<select class="form-control" name="periodo_letivo">
					<?php  foreach ($periodos_letivo as $key => $value): ?>
						<option value="<?php echo $value["id"]; ?>"><?php echo $value["codigo_periodo"]; ?></option>
					<?php  endforeach ?>
				</select>

				<br/>

				<div class="form-group">
					<button type="submit"  id="cadastrar" class="btn btn-info">Cadastrar</button>
				</div>
			</form>

		</div>
	</div>
</div>





<?php include 'template_footer.php' ?>