<?php include 'template_header.php' ?>

<style>
.classe {
	background: #f8f8f8;
}
</style>
<title>Cadastro de Questões</title>

<?php include 'index_admin_tpl.php' ?>
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
			
			<form method="post" action="<?php echo base_url('perguntas/execCadastraPergunta')?>" id="cadastra_perguntas" class="">
				<div class="form-group <?php echo form_error('questao') ? 'has-error' : '' ?>">
					<label >Pergunta 1</label>
					<textarea style=" resize: vertical;" rows="4" type="text" class="form-control" id="questao" name="questao" placeholder="Questão" autofocus ><?php echo set_value('questao'); ?></textarea>
					<span id="helpBlock2" class="help-block"><?php echo form_error('questao'); ?></span>
				</div>

				<div class="form-group">
					<label>Alternativa A</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[A]" id="correta[A]" value="A" <?php echo set_checkbox('correta[]', 'A'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaA" name="alternativa[A]" placeholder="alternativa A"><?php echo set_value('alternativa[]'); ?></textarea>
					</div><!-- /input-group -->
					<span id="helpBlock2" class="help-block"><?php echo form_error('nome'); ?></span>
				</div>

				<div class="form-group">
					<label>Alternativa B</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox"  name="correta[B]" value="B" <?php echo set_checkbox('correta[]', 'B'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaB" name="alternativa[B]" placeholder="alternativa B"><?php echo set_value('alternativa[]'); ?></textarea>
					</div><!-- /input-group -->
					<span id="alternativaB" name="alternativa[B]" class="help-block"></span>
				</div>

				<div class="form-group">
					<label>Alternativa C</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[C]" value="C" <?php echo set_checkbox('correta[]', 'C'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaC" name="alternativa[C]" placeholder="alternativa C"><?php echo set_value('alternativa[]'); ?></textarea>
					</div><!-- /input-group -->
					<span id="alternativaC" name="alternativa[C]" class="help-block"></span>
				</div>

				<div class="form-group">
					<label>Alternativa D</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[D]" value="D" <?php echo set_checkbox('correta[]', 'D'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaD" name="alternativa[D]" placeholder="alternativa D"><?php echo set_value('alternativa[]'); ?></textarea>
					</div><!-- /input-group -->
					<span id="alternativaD" name="alternativa[D]" class="help-block"></span>
				</div>

				<div class="form-group">
					<label>Alternativa E</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="correta[E]" value="E" <?php echo set_checkbox('correta[]', 'E'); ?> />
						</span>
						<textarea type="text" class="form-control" id="alternativaE" name="alternativa[E]" placeholder="alternativa E"><?php echo set_value('alternativa[]'); ?></textarea>
					</div><!-- /input-group -->
					<span id="alternativaE" name="alternativa[E]" class="help-block"></span>
				</div>

				<h4>Selecione a disciplina</h4>
				<select class="form-control" name="disciplina">
					<?php  foreach ($disciplinas as $key => $value): ?>
						<option value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
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