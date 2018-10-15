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
  width: 800px;
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
		<div class="col-md-12 col-md-offset-1">

		</br>

		<table   align="center"  class="" id="myTable">
			<tr>
				<th>Descricao</th>
				<th>Opções</th>
				<th>Situaçao</th>
			</tr>
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
					<?php foreach ($pergunta['alternativas'] as $alternativa) { ?>

					</tr>
					<div id="alternativa_<?php echo $alternativa['id'] ?>" style="visibility: hidden;">
						<td> <?php echo $alternativa['descricao'];?></td>
					</div>	
				<?php } ?>
			<?php } ?>


		</table>
	</div>
</div>

<script src="<?=base_url('/assets/js/bootstrap.min.js')?>"></script>
</body>
</html>
<script type="text/javascript">
	$('#descricao_<?php echo $pergunta['id']?>').click( function () {
		$('#alternativa_').toggle();
	} );
</script>
