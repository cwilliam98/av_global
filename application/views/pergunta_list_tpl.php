<?php include 'template_header.php' ?>

<body>
	<div class="container">

	</br>

	<table class="table" id="myTable">
		<tr>
			<th>Descricao</th>
		</tr>
		<?php foreach ($questoes as $pergunta) { ?>
		<tr>

			<td class="btn-info"><button class="btn-info"><span id="descricao_<?php echo $pergunta['id'] ?>" class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></button>
				<?php echo $pergunta['id']. ') ' . $pergunta['descricao'];?></td>
			<?php foreach ($pergunta['alternativas'] as $alternativa) { ?>
		</tr>
			<div id="alternativa_<?php echo $alternativa['id'] ?>" style="visibility: hidden;">
				<td> <?php echo $alternativa['descricao'];?></td>
			</div>	
			<?php } ?>
		<?php } ?>


		</table>
	</div>

	<script src="<?=base_url('/assets/js/bootstrap.min.js')?>"></script>
</body>
</html>
<script type="text/javascript">
	$('#descricao_<?php echo $pergunta['id']?>').click( function () {
		$('#alternativa_').toggle();
	} );
</script>
