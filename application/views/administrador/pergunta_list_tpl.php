<?php
include 'index_admin_tpl.php';
?>

<body>
	<div class="container">
		<div class="col-md-12 col-md-offset-2">

		</br>

		<table class="" id="myTable">
			<tr>
				<th>Descricao</th>
				<th>Opções</th>
			</tr>
			<?php foreach ($questoes as $pergunta) { ?>
				<tr>
					<td class="btn-info"><button class="btn-info"><span id="descricao_<?php echo $pergunta['id'] ?>" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></button>
						<?php echo $pergunta['id']. ') ' . $pergunta['descricao'];?>
					</td>
					<td  class="btn-info">
						<button class="btn btn-sm btn-danger left"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
						<button class="btn btn-sm btn-info left"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
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
