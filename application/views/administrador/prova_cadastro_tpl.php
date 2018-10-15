<?php
	include 'index_admin_tpl.php'; 
?>
<title>Cadastro de Provas</title>

<style>
.classe {
	background: #f8f8f8;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10  col-md-offset-2 classe">
			<h3>Cadastrar nova prova</h3>

			<form method="post" action="<?php echo base_url('administrador/provas/execCadastraProva') ?>">
				<div class="form-group">
					<label >Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" autofocus value="<?php echo set_value('nome') ?>">
					<span id="helpBlock2" class="help-block"</span>
					</div>

					<div class="form-group <?php echo form_error('data') ? 'has-error' : '' ?>">
						<label >Data</label>
						<input type="datetime-local" class="form-control" id="aplicacao"
               name="aplicacao" value=""/>
						<span id="helpBlock2" class="help-block"><?php echo form_error('data'); ?></span>
					</div>

					<div class="form-group <?php echo form_error('data') ? 'has-error' : '' ?>">
						<label >Quantidade de questoes</label>
						<input type="number" class="form-control" id="qtd_questoes" name="qtd_questoes" placeholder="Data"  value="<?php echo set_value('qtd_questoes') ?>">
						<span id="helpBlock2" class="help-block"><?php echo form_error('qtd_questoes'); ?></span>
					</div>

					<h4>Reaproveitar prova</h4>
					<div  class="radio">
						<div style="padding-left: 20px">
							<input type="radio" id="reaproveitar_sim" name="reaproveitar" value="nao">
							<label for="reaproveitar_sim">Sim</label>
						</div>
						<div style="padding-left: 20px">
							<input type="radio" id="reaproveitar_nao" name="reaproveitar" value="sim">
							<label for="reaproveitar_nao">Não</label>
						</div>
					</div>

					<div class="form-group <?php echo form_error('data') ? 'has-error' : '' ?>">
						<label >Tipo de prova</label>
						<input type="text" class="form-control" id="tipo_prova" name="tipo_prova" placeholder="tipo da prova"  value="<?php echo set_value('tipo_prova') ?>">
						<span id="helpBlock2" class="help-block"><?php echo form_error('tipo_prova'); ?></span>
					</div>

					<h4>Selecione as disciplinas</h4>
					<div  class="checkbox" style="column-count:2">
						<?php  foreach ($disciplinas as $key => $value): ?>
							<div style="padding-left: 20px">
								<input type="checkbox" id="disciplinas_<?php echo $key ?>" name="disciplinas[]" value="<?php echo $value["id"]; ?>">
								<label for="disciplinas_<?php echo $key ?>"><?php echo $value["nome"]; ?></label>
							</div>
						<?php  endforeach ?>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-info">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<?php include 'template_footer.php' ?>































































































































































































































































































































































































