<head>
	<link href="<?=base_url('/assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('/assets/css/funkyradio.css')?>" rel="stylesheet">
</head>
<style>
.classe {
	background: #FFFAFA;
}

.colunas {
	-webkit-column-count: 2; /* Chrome, Safari, Opera */
	-moz-column-count: 2; /* Firefox */
	column-count: 2;

	-webkit-column-gap: 40px; /* Chrome, Safari, Opera */
	-moz-column-gap: 40px; /* Firefox */
	column-gap: 40px;

	-webkit-column-rule: 4px double #ff00ff; /* Chrome, Safari, Opera */
	-moz-column-rule: 4px double #ff00ff; /* Firefox */
	column-rule: 4px double #ff00ff;
}
.colunas .questao{
	break-inside: avoid-column;
}
</style>
<body>
	

	<div class="container classe">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 colunas">
				<?php foreach ($disciplinas as $count => $questoes) : ?>
						<div class="row">
							<hr style="border: 1px solid;">
							Disciplina de <?php echo  $questoes->nome;   ?>
							<hr style="border: 1px solid;">
						</div>

					<form role="form" class="questao" name="enviar_prova" method="post" action="<?php echo site_url('provas/resultado') ?>">
						<?php foreach ($questoes->questoes as $questao) : ?>
							<div><?php echo ($count+1). ' ) '. $questao->descricao;   ?></div>
							<?php foreach ($questao->alternativas as $alternativa) :?>
								<div class="radio radio-info">
									<input type="radio"  name="questao[<?php echo $questao->questao ?>]"  value="<?php echo $alternativa->id ?>"  id="<?php echo $alternativa->id ?>"/>
									<label for="<?php echo $alternativa->id ?>"> <?php echo $alternativa->descricao?></label>
								</div>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</form>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("input").click(function(e){
			console.log($(this).serializeArray());
			$.ajax({
				type: "POST",
				url: '<?php echo base_url('provas/corrigir') ?>',
				data: $(this).serializeArray(),
				//success: ,
				//dataType: dataType
			});
		});
	</script>