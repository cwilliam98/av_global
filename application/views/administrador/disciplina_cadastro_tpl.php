<?php

include 'index_admin_tpl.php'; 
?>
<title>Cadastro de Disciplinas</title>
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<h3 class="m-1 text-center text-white">Cadastrar no disciplina</h3>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12  ">
			<h3>Cadastrar nova Disciplina</h3>

			<form method="post" action="<?php echo site_url('administrador/disciplinas/execCadastraDisciplina') ?>">


				<div class="form-group <?php echo form_error('disciplina') ? 'has-error' : '' ?>">
					<label >Disciplina</label>
					<input type="text" class="form-control" name="disciplina" placeholder="Disciplina" autofocus value="<?php echo set_value('disciplina') ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('disciplina'); ?></span>
				</div>


				<h4>Selecione o professor</h4>
				<div class="form-group <?php echo form_error('professor') ? 'has-error' : '' ?>">
					<select class="form-control" name="professor">
						<?php  foreach ($professores as $key => $value): ?>
							<option value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
						<?php  endforeach ?>
					</select>
				</div>

				<h4>Selecione o curso</h4>
				<div class="form-group <?php echo form_error('professor') ? 'has-error' : '' ?>">
					<select class="form-control" name="curso">
						<?php  foreach ($cursos as $key => $value): ?>
							<option value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
						<?php  endforeach ?>
					</select>
				</div>

				<button type="submit" class="btn btn-info">Cadastrar</button>

			</form>

			
		</div>
	</div>
</div>

<?php include 'template_footer.php' ?>