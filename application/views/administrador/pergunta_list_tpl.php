<?php
include 'index_admin_tpl.php';
?>
<style type="text/css">
<!--
table {
	width:1000px;
	_width:760px;
}
#celula1 {
	width: 700px;
	padding:1px;
	_width: 55px;
}
#celula2 {
	width: 100px;
	padding:1px;
	_width: 495px;
}
-->
</style>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-2">

			</br>
			<select class="form-control" name="disciplina" id="periodo_letivo">
					<option value="" >Selecione...</option>
				<?php  foreach ($periodos_letivo as $periodo_letivo): 
					$selected =  "";
					if ($this->input->get('periodo') == $periodo_letivo['id']) {
						$selected =  "selected";
					} ?>
					<option value="<?php echo $periodo_letivo["id"]; ?>" <?php echo $selected?>><?php echo $periodo_letivo["codigo_periodo"]; ?></option>
				<?php  endforeach ?>
			</select>
			<input type="text" class="input-search" alt="lista-clientes" placeholder="Buscar nesta lista"/>
			<table   align="center"  class="lista-clientes table table-striped" id="myTable">
				<thead>
					<tr>
						<th>Descricao</th>
						<th>Opções</th>
						<th>Situaçao</th>
						<th>Período letivo</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($questoes as $pergunta) { ?>
						<tr>
							<td class="btn-info" id="celula1"><button class="btn-info"><span id="descricao_<?php echo $pergunta['id'] ?>" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></button>
								<?php echo $pergunta['id']. ') ' . $pergunta['descricao'];?>
							</td>
							<td  class="btn-info" align="center"  id="celula2">
								<a href="<?=base_url('administrador/perguntas/inativar/' .$pergunta['id'])?>" class="btn-sm btn-danger"  onclick="return confirm ('Têm certeza que deseja excluir esse registro?') "><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
								<a href="<?=base_url('administrador/perguntas/alterar/' .$pergunta['id'])?>" class="btn-sm btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							</td>
							<td class="btn-info" align="center" >
								<?php echo $pergunta['situacao'];?>
							</td>
							<td class="btn-info" align="center" >
								<?php echo $pergunta['periodo_letivo'];?>
							</td>
							<?php foreach ($pergunta['alternativas'] as $alternativa) { ?>

							</tr>
							<div id="alternativa_<?php echo $alternativa['id'] ?>" style="visibility: hidden;">
								<td> <?php echo $alternativa['descricao'];?></td>
							</div>	
						<?php } ?>
					<?php } ?>
				</tbody>

			</table>

		</div>
	</div>
</div>

</body>
</html>
<script type="text/javascript">

	$('#periodo_letivo').change(function(){
		var id = $(this).val();
		if(id != ""){
			location.href = '<?php echo base_url('administrador/perguntas') ?>?periodo='+id;			
		} else {
			location.href = '<?php echo base_url('administrador/perguntas') ?>';			
		}
	});
</script>
