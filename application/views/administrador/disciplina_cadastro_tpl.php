<?php

 include 'index_admin_tpl.php'; 
?>
	<title>Cadastro de Disciplinas</title>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
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
				<div class="col-md-10  col-md-offset-2">
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