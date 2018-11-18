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



<div class="container">
	<div class="row">
		<div class="col-md-6  col-md-offset-3 classe">
			<h3 class="text-center">Alterar aluno</h3>

			<form method="post" action="<?php echo base_url('administrador/alunos/execAlteraAluno/'.$aluno['id']) ?>">
				<div class="form-group <?php echo form_error('aluno') ? 'has-error' : '' ?>">
					<label >Nome</label>
					<input type="text" class="form-control" name="nome" placeholder="Nome" autofocus value="<?php echo $aluno['nome'] ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('nome'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('aluno') ? 'has-error' : '' ?>">
					<label >Codigo</label>
					<input type="number" class="form-control" name="codigo" placeholder="Codigo" autofocus value="<?php echo  $aluno['codigo'] ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('codigo'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('senha') ? 'has-error' : '' ?>">
					<label >Senha</label>
					<input type="password" class="form-control" name="senha" placeholder="Senha" autofocus value="<?php echo  $aluno['senha'] ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('senha'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('disciplinas[]') ? 'has-error' : '' ?>" id="disciplina">
					<h4>Selecione as disciplinas</h4>
					<div>

						<select multiple class="form-control" name="disciplinas[]">

							<?php  foreach ($disciplinas as $key => $value):?>
									<option  id="disciplinas_<?php echo $key ?>" name="disciplinas[]" value="<?php echo $value["id"]; ?>"<?php foreach ($disciplinas_aluno as $disciplina):
									if($value['id'] == $disciplina['disciplina']) { ?>
										selected="selected"
									<?php }?> 
									<?php  endforeach ?>><?php echo $value["nome"]; ?></option>
							<?php  endforeach ?>
						</div>
					</select>
				</div>
				<br>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Alterar</button>
				</div>
			</form>
		</div>
	</div>
</div>



<?php include 'template_footer.php' ?>