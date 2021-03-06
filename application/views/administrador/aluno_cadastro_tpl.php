<?php

include 'index_admin_tpl.php'; 

?>
<title>Cadastro de Alunos</title>

<style>
.classe {
	background: #f8f8f8;
}
select[multiple], select[size] {
    height: -webkit-fill-available;
}
</style>


<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>

<script language="javascript">
	<!--
		$(document).ready(function() {
			var $j = jQuery.noConflict();
			$j("#usuario").on('change', function(){
				var itemProfessor = $('#professor:checked').val();
				var itemAluno = $('#aluno:checked').val();


				if(itemProfessor  === "professor" && itemAluno === "aluno" ){
					$j("#jornada").show();
					$j("#disciplina").show();
				}
				else if (itemAluno === "aluno")
				{
					$j("#jornada").hide();
					$j("#disciplina").show();
				}

				else if (itemProfessor === "professor")
				{
					$j("#jornada").show();
					$j("#disciplina").hide();
				}

				else {}

			});
		});
//-->
</script>


<div class="container">
	<div class="row">
		<div class="col-md-12 classe">
			<h3>Cadastrar novo usuário</h3>

			<form method="post" action="<?php echo base_url('administrador/alunos/execCadastraAluno') ?>">
				<div class="form-group <?php echo form_error('aluno') ? 'has-error' : '' ?>" id="usuario">
					<div  class="checkbox">
						<div class="container">
							<input type="checkbox" id="aluno" name="aluno" value="aluno">
							<label for="aluno">Aluno</label>

						</div>
						<div class="container">

							<input type="checkbox" id="professor" name="professor" value="professor">
							<label for="professor">Professor</label>
						</div>


					</div>
				</div>
				<div class="form-group <?php echo form_error('nome') ? 'has-error' : '' ?>">
					<label >Nome</label>
					<input type="text" class="form-control" name="nome" placeholder="Nome" autofocus value="<?php echo set_value('nome') ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('nome'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('codigo') ? 'has-error' : '' ?>">
					<label >Codigo</label>
					<input type="number" class="form-control" name="codigo" placeholder="Codigo" autofocus value="<?php echo set_value('codigo') ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('codigo'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('senha') ? 'has-error' : '' ?>">
					<label >Senha</label>
					<input type="password" class="form-control" name="senha" placeholder="Senha" autofocus value="<?php echo set_value('senha') ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('senha'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('disciplinas[]') ? 'has-error' : '' ?>" id="disciplina">
					<div class="form-group <?php echo form_error('disciplinas[]') ? 'has-error' : '' ?>" id="disciplina">
						<h4>Selecione as disciplinas</h4>
						<div>

							<select multiple class="form-control" name="disciplinas[]">

								<?php  foreach ($disciplinas as $key => $value):?>
									<option  id="disciplinas_<?php echo $key ?>" name="disciplinas[]" value="<?php echo $value["id"]; ?>"><?php echo $value["nome"]; ?></option>
								<?php  endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Cadastrar</button>
				</div>
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