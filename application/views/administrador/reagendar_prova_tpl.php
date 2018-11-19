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
		<div class="col-md-12 ">
			<h3 class="m-1 text-center">Alterar prova</h3>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12   classe">
			
			<form method="post" action="<?php echo base_url('administrador/provas/execAlteraProva/'.$prova['id']) ?>">
				<div class="form-group <?php echo form_error('nome') ? 'has-error' : '' ?>">
					<label >Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" autofocus value="<?php echo $prova['nome'] ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('nome'); ?></span>

				</div>

				<div class="form-group <?php echo form_error('aplicacao') ? 'has-error' : '' ?>">
					<label >Data</label>
					<input type="datetime" class="form-control" id="aplicacao" name="aplicacao" value="<?php echo $prova['aplicacao']; ?>"/>
					<span id="helpBlock2" class="help-block"><?php echo form_error('aplicacao'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('qtd_questoes') ? 'has-error' : '' ?>">
					<label >Quantidade de questoes</label>
					<input type="tel" class="form-control" id="qtd_questoes" name="qtd_questoes" placeholder="Quantidade de questões"  value="<?php echo $prova['qtd_questoes'] ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('qtd_questoes'); ?></span>
				</div>

				<div class="form-group <?php echo form_error('tipo_prova') ? 'has-error' : '' ?>">
					<label >Tipo de prova</label>
					<input type="text" class="form-control" id="tipo_prova" name="tipo_prova" placeholder="tipo da prova"  value="<?php echo $prova['tipo_prova'] ?>">
					<span id="helpBlock2" class="help-block"><?php echo form_error('tipo_prova'); ?></span>
				</div>
				<div class="form-group <?php echo form_error('periodo_letivo') ? 'has-error' : '' ?>">
					<label >Periodo Letivo</label>

					<select class="form-control" name="periodo_letivo" id="periodo_letivo">
						<option value="" >Selecione...</option>
						<?php  foreach ($periodos_letivo as $periodo_letivo): 
							$selected =  "";
							if ($prova['periodo_letivo'] == $periodo_letivo['id']) {
								$selected =  "selected";
							} ?>
							<option value="<?php echo $periodo_letivo["id"]; ?>" <?php echo $selected?>><?php echo $periodo_letivo["codigo_periodo"]; ?></option>
						<?php  endforeach ?>
					</select>
					<span id="helpBlock2" class="help-block"><?php echo form_error('periodo_letivo'); ?></span>
					
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-info">Alterar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include 'template_footer.php' ?>