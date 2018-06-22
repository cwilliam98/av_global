<?php include 'template_header.php' ?>
	<title>Cadastro de Disciplinas</title>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="#">
									Cadastro de Disciplinas
								</a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-6  col-md-offset-3">
					<h3>Cadastrar nova Disciplina</h3>
					
					<form method="post" action="<?php echo site_url('disciplinas/execCadastraDisciplina') ?>">
						
						
						<div class="form-group <?php echo form_error('disciplina') ? 'has-error' : '' ?>">
							<label >Disciplina</label>
							<input type="text" class="form-control" name="disciplina" placeholder="Disciplina" autofocus value="<?php echo set_value('disciplina') ?>">
							<span id="helpBlock2" class="help-block"><?php echo form_error('disciplina'); ?></span>
						</div>
						
						<h4>Selecione o período</h4>
						<div class="form-group <?php echo form_error('periodo') ? 'has-error' : '' ?>">
						<select class="form-control" name="periodo">
							
								<option value="N1 - 1° SEMESTRE">N1 - 1° SEMESTRE</option>
								<option value="N1 - 2° SEMESTRE">N1 - 2° SEMESTRE</option>
								<option value="N2 - 3° SEMESTRE">N2 - 3° SEMESTRE</option>
								<option value="N2 - 4° SEMESTRE">N2 - 4° SEMESTRE</option>
								<option value="N3 - 5° SEMESTRE">N3 - 5° SEMESTRE</option>
								<option value="N3 - 6° SEMESTRE">N3 - 6° SEMESTRE</option>
								<option value="N4 - 7° SEMESTRE">N4 - 7° SEMESTRE</option>
								<option value="N4 - 8° SEMESTRE">N4 - 8° SEMESTRE</option>
								<option value="N5 - 9° SEMESTRE">N5 - 9° SEMESTRE</option>
								<option value="N5 - 10° SEMESTRE">N5 - 10° SEMESTRE</option>
								<option value="N6 - 11° SEMESTRE">N6 - 11° SEMESTRE</option>
								<option value="N6 - 12° SEMESTRE">N6 - 12° SEMESTRE</option>
								<option value="N7 - 13° SEMESTRE">N7 - 13° SEMESTRE</option>
								<option value="N7 - 14° SEMESTRE">N7 - 14° SEMESTRE</option>
								<option value="N8 - 15° SEMESTRE">N8 - 15° SEMESTRE</option>
								<option value="N8 - 16° SEMESTRE">N8 - 16° SEMESTRE</option>
								<option value="N9 - 17° SEMESTRE">N9 - 17° SEMESTRE</option>
								<option value="N9 - 18° SEMESTRE">N9 - 18° SEMESTRE</option>
								<option value="N10 - 19° SEMESTRE">N10 - 19° SEMESTRE</option>
								<option value="N10 - 20° SEMESTRE">N10 - 20° SEMESTRE</option>
							
						</select>
						</div>
						
						<h4>Selecione o professor</h4>
						<div class="form-group <?php echo form_error('professor') ? 'has-error' : '' ?>">
						<select class="form-control" name="professor">
							<?php  foreach ($professores as $key => $value): ?>
								<option value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
							<?php  endforeach ?>
						</select>
						</div>
						
							<button type="submit" class="btn btn-info">Cadastrar</button>
						
					</form>
					
					<?php if($this->input->get('aviso')==1) { ?>	
						<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Sucesso!</strong> Aluno cadastrado com sucesso.
						</div>
					<?php } ?>
					
					<?php if($this->input->get('aviso')==2) { ?>
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Errooo!</strong> Aluno não cadastrado.
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
<?php include 'template_footer.php' ?>