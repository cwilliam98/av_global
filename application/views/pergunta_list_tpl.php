<?php include 'template_header.php' ?>
<body>
	<div class="container">

	</br>

	<div class="row">
		<div class="col-md-9">
			<?php foreach ($questoes as $pergunta) { ?>
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-1 btn-info"> <?php echo $pergunta['id']. ') ' . $pergunta['descricao'];?>
					</div>
				</div>
			</div>
			<?php foreach ($pergunta['alternativas'] as $alternativa) { ?>
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-1 btn-default"> <?php echo $alternativa['descricao'];?>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php } ?>

		</div>
	</div>
</div>

<script src="<?=base_url('/assetsjs/bootstrap.min.js')?>"></script>
</body>
</html>
